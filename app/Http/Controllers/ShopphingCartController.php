<?php

namespace App\Http\Controllers;

use App\Http\Requests\ThanhToan_Request;
use Carbon\Carbon;
use App\NguoiDungModel;
use App\sanPham_model;
use Illuminate\Http\Request;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Support\Facades\Auth;
use App\HoaDon_Model;
use App\ChiTietHoaDon_model;
use Illuminate\Support\Facades\Mail;

class ShopphingCartController extends Controller
{
    public function AddProduct(Request $request, $id)
    {
        $product = sanPham_model::select()->find($id);
        if (!$product) {
            return redirect('/');
        } else {
            Cart::add([
                'id' => $id,
                'name' => $product->TenSP,
                'qty' => 1,
                'price' => $product->GiaSP,
                'weight' => $product->SoLuong,
                'options' => ['avatar' => $product->AnhSP]
            ]);

            return redirect()->back();
        }
    }

    public function ListCart()
    {
        $product = Cart::content();
        return view('gio-hang.gio-hang', ['hang' => $product]);
    }

    public function XoaCart($rowId)
    {
        Cart::remove($rowId);
        return redirect()->back();
    }

    public function Tru_qty($rowId)
    {
        $qty = Cart::get($rowId)->qty;
        Cart::update($rowId, ['qty' => $qty - 1]);
        return redirect()->back();
    }

    public function Cong_qty($rowId)
    {
        $qty = Cart::get($rowId)->qty;
        Cart::update($rowId, ['qty' => $qty + 1]);
        return redirect()->back();
    }
    public function ThanhToan()
    {

        $product = Cart::content();
        $CheckAuth = Auth::check();
        if (!$CheckAuth) {
            return redirect('taikhoan/dang-nhap')->with('thongbao', 'Vui lòng đăng nhập để thực hiện thanh toán !');
        } else {
            $nguoi = Auth::user()::where('id', Auth::user()->id)->get();
            return view('gio-hang.thanh-toan', ['hang' => $product, 'nguoidung' => $nguoi]);
        }
    }

    public function PostThanhToan(ThanhToan_Request $request)
    {
        $tongtien = str_replace(',', '', Cart::subtotal(0, 3));
        $HoaDonId = HoaDon_Model::insertGetId([
            'id_nguoi_dung' => $request->id_nguoi_dung,
            'id_tinh_trang' => 1,
            'NgayLap' => Carbon::now(),
            'TongGia' => (int) $tongtien,
            'NoiNhan' => $request->noinhan,
            'GhiChu' => $request->ghichu
        ]);

        if ($HoaDonId) {
            $product = Cart::content();
            foreach ($product as $sp) {
                ChiTietHoaDon_model::insert([
                    'id_hoa_don' => $HoaDonId,
                    'id_san_pham' => $sp->id,
                    'SoLuongMua' => $sp->qty,
                    'DonGia' => $sp->price
                ]);

                //..
                $dbSP = sanPham_model::where('id', $sp->id)->get();
                foreach ($dbSP as $sxp) {
                    $tensp = $sxp->TenSP;
                    $anhsp = $sxp->AnhSP;
                    $giasp = $sxp->GiaSP;
                    $mota = $sxp->MoTa;
                    $soluong = $sxp->SoLuong;
                    $soluotxem = $sxp->SoLuotXem;
                    $anh1 = $sxp->Anh1;
                    $anh2 = $sxp->Anh2;
                    $anh3 = $sxp->Anh3;
                    $idloai = $sxp->id_loai_san_pham;
                }
                sanPham_model::where('id', $sp->id)->update([
                    'TenSP' => $tensp,
                    'AnhSP' => $anhsp,
                    'GiaSP' => $giasp,
                    'MoTa' => $mota,
                    'SoLuong' => $soluong - $sp->qty,
                    'SoLuotXem' => $soluotxem,
                    'Anh1' => $anh1,
                    'Anh2' => $anh2,
                    'Anh3' => $anh3,
                    'id_loai_san_pham' => $idloai
                ]);
            }
        }

        $email = $request->email;
        $data = [
            'hoten' => $request->hoten,
            'noinhan' => $request->noinhan,
            'sodienthoai' => $request->sodienthoai,
            'email' => $request->email,
            'product' => Cart::content(),
            'tonggia' =>  Cart::subtotal()
        ];
        Mail::send('mail.dat-hang-thanh-cong', $data, function ($message) use ($email, $HoaDonId) {
            $message->to($email, 'Hfurniture')->subject('H FURNITUTE đã nhận đơn hàng #' . $HoaDonId);
        });

        Cart::destroy();
        return view('gio-hang.thong-bao-mua-hang-thanh-cong', ['id_hoa_don' => $HoaDonId]);
    }

    public function xacnhantinhtrang(Request $request)
    {
        $id = $request->id_hoa_don;
        $id_tinh_trangyes = $request->id_tinh_trang;

        $dbHD = HoaDon_Model::where('id', $id)->get();
        foreach ($dbHD as $hd) {
            $id_nguoi_dung = $hd->id_nguoi_dung;
            $id_tinh_trang = $hd->id_tinh_trang;
            $NgayLap = $hd->NgayLap;
            $TongGia = $hd->TongGia;
            $NoiNhan = $hd->NoiNhan;
            $GhiChu = $hd->GhiChu;
        }
        HoaDon_Model::where('id', $id)->update([
            'id_nguoi_dung' => $id_nguoi_dung,
            'id_tinh_trang' => $id_tinh_trangyes,
            'NgayLap' => $NgayLap,
            'TongGia' => $TongGia,
            'NoiNhan' => $NoiNhan,
            'GhiChu' => $GhiChu
        ]);

        return redirect()->back();
    }


    public function capnhapsoluong(Request $request){
        $rowId = $request->rowId;
        $soluong = $request->soluong;

        Cart::update($rowId, ['qty' => $soluong]);
        return redirect()->back();

    }

    
}
