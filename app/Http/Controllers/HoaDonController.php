<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\HoaDon_Model;
use Illuminate\Http\Request;
use App\sanPham_model;

class HoaDonController extends Controller
{
    public function danhsach()
    {
        $db = HoaDon_Model::paginate(15);

        return view('admin.hoa-don.danh-sach', ['db' => $db]);
    }

    public function timkiem(Request $request)
    {
        $tukhoa = $request->tukhoa;
        $db = HoaDon_Model::where('id', 'like', "%$tukhoa%")->orWhere('id_tinh_trang', 'like', "%$tukhoa%")->orWhere('NoiNhan', 'like', "%$tukhoa%")->paginate(15);
        return view('admin.hoa-don.danh-sach', ['db' => $db]);
    }

    public function choxuly()
    {
        $db = HoaDon_Model::where('id_tinh_trang', 1)->paginate(15);
        return view('admin.hoa-don.danh-sach', ['db' => $db]);
    }
    public function danggiaohang()
    {
        $db = HoaDon_Model::where('id_tinh_trang', 2)->paginate(15);
        return view('admin.hoa-don.danh-sach', ['db' => $db]);
    }
    public function dagiao()
    {
        $db = HoaDon_Model::where('id_tinh_trang', 3)->paginate(15);
        return view('admin.hoa-don.danh-sach', ['db' => $db]);
    }
    public function dahuy()
    {
        $db = HoaDon_Model::where('id_tinh_trang', 4)->paginate(15);
        return view('admin.hoa-don.danh-sach', ['db' => $db]);
    }


    public function xoa($id)
    {
        HoaDon_Model::find($id)->delete();
        return redirect()->back();
    }

    public function chitiet($id)
    {
        $db_chi_tiet = HoaDon_Model::where('id', $id)->get();

        return view('admin.hoa-don.chi-tiet', ['db' => $db_chi_tiet]);
    }

    public function donhangcuatoi()
    {
        $id = Auth::user()->id;

        $hoadon = HoaDon_Model::where([
            ['id_tinh_trang','<=', 3],
            ['id_nguoi_dung', $id],
            ])->latest('NgayLap')->get();

        $sohoadon = HoaDon_Model::where([
            ['id_tinh_trang','<=', 3],
            ['id_nguoi_dung', $id],
            ])->latest('NgayLap')->count();
        return view('gio-hang.don-hang', ['db' => $hoadon, 'sodon' => $sohoadon]);
    }

    public function donhangdahuy()
    {
        $id = Auth::user()->id;

        $hoadon = HoaDon_Model::where([
            'id_nguoi_dung' => $id,
            'id_tinh_trang' => 4
        ])->latest('NgayLap')->get();
        return view('gio-hang.don-hang-da-huy', ['db' => $hoadon]);
    }

    public function huydon($id)
    {

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
            'id_tinh_trang' => 4,
            'NgayLap' => $NgayLap,
            'TongGia' => $TongGia,
            'NoiNhan' => $NoiNhan,
            'GhiChu' => $GhiChu
        ]);

        $db = HoaDon_Model::where('id', $id)->get();
        foreach ($db as $dbx) {
            $id_hoa_don = $dbx->id;

            foreach ($dbx->sanpham as $i) {
                $soluong = $i->pivot->SoLuongMua;
                $id_sp = $i->id;
                $db_sp = sanPham_model::where('id', $id_sp)->get();
                foreach ($db_sp as $sp) {
                    $TenSP = $sp->TenSP;
                    $AnhSP = $sp->AnhSP;
                    $GiaSP = $sp->GiaSP;
                    $MoTa = $sp->MoTa;
                    $SoLuong = $sp->SoLuong;
                    $SoLuotXem = $sp->SoLuotXem;
                    $Anh1 = $sp->Anh1;
                    $Anh2 = $sp->Anh2;
                    $Anh3 = $sp->Anh3;
                    $id_loai_san_pham = $sp->id_loai_san_pham;
                }

                sanPham_model::where('id', $id_sp)->update([
                    'TenSP' => $TenSP,
                    'AnhSP' => $AnhSP,
                    'GiaSP' => $GiaSP,
                    'MoTa' => $MoTa,
                    'SoLuong' => $SoLuong + $soluong,
                    'SoLuotXem' => $SoLuotXem,
                    'Anh1' => $Anh1,
                    'Anh2' => $Anh2,
                    'Anh3' => $Anh3,
                    'id_loai_san_pham' => $id_loai_san_pham
                ]);
            }
        }

        return redirect()->back()->with('thongbao', 'Bạn đã hũy đơn hàng !');
    }

   
}
