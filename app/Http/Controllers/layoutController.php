<?php

namespace App\Http\Controllers;

use App\Http\Requests\HoiDap_Request;
use App\HoiDap_Model;
use App\sanPham_model;
use Illuminate\Http\Request;
use App\loaisanpham;
use App\Anh_Bia_Model;

class layoutController extends Controller
{
    public function admin()
    {
        $soluotxem = sanPham_model::all();
        return view('admin.trang-chu', ['soluotxem' => $soluotxem]);
    }
    public function trangchu()
    {
        $dbanh = Anh_Bia_Model::where('id', 1)->get();
        $db = sanPham_model::inRandomOrder()->limit(12)->get();;
        $dbloai = loaisanpham::inRandomOrder()->limit(6)->get();;
        return view('layouts.trang-chu', ['sanpham' => $db, 'loai' => $dbloai, 'anhne' => $dbanh]);
    }
    public function chitietsanpham($id)
    {
        $db = sanPham_model::where('id', $id)->get();
        foreach ($db as $sp) {
            $tensp = $sp->TenSP;
            $anhsp = $sp->AnhSP;
            $giasp = $sp->GiaSP;
            $mota = $sp->MoTa;
            $soluong = $sp->SoLuong;
            $soluotxem = $sp->SoLuotXem;
            $anh1 = $sp->Anh1;
            $anh2 = $sp->Anh2;
            $anh3 = $sp->Anh3;
            $idloai = $sp->id_loai_san_pham;
        }
        sanPham_model::where('id', $id)->update([
            'TenSP' => $tensp,
            'AnhSP' => $anhsp,
            'GiaSP' => $giasp,
            'MoTa' => $mota,
            'SoLuong' => $soluong,
            'SoLuotXem' => $soluotxem + 1,
            'Anh1' => $anh1,
            'Anh2' => $anh2,
            'Anh3' => $anh3,
            'id_loai_san_pham' => $idloai
        ]);
        $dbloai = loaisanpham::get();
        $spcungloai = sanPham_model::where('id_loai_san_pham', $idloai)->get();

        $showcomment = HoiDap_Model::where([
            'id_san_pham' => $id,
            'id_tinh_trang_hoi_dap' => 2
        ])->paginate(10);

        $sobl = HoiDap_Model::where([
            'id_san_pham' => $id,
            'id_tinh_trang_hoi_dap' => 2
        ])->count();

        return view('layouts.san-pham.chi-tiet-san-pham', ['sanphamby_id' => $db, 'loai' => $dbloai, 'spcungloai' => $spcungloai, 'hoidap' => $showcomment, 'sobl' => $sobl]);
    }

    public function gioithieu()
    {
        $dbloai = loaisanpham::inRandomOrder()->limit(6)->get();;
        return view('layouts.gioi-thieu', ['loai' => $dbloai]);
    }

    public function sanpham()
    {
        $so1 = sanPham_model::where('GiaSP','<',2000000)->count();
        $so2 = sanPham_model::where('GiaSP','<=',7000000)->where('GiaSP','>=',2000000)->count();
        $so3 = sanPham_model::where('GiaSP','<=',13000000)->where('GiaSP','>=',7000000)->count();
        $so4 = sanPham_model::where('GiaSP','<=',30000000)->where('GiaSP','>=',13000000)->count();
        $so5 = sanPham_model::where('GiaSP','<=',50000000)->where('GiaSP','>=',30000000)->count();
        $so6 = sanPham_model::where('GiaSP','>=',50000000)->count();
        
        $db = sanPham_model::inRandomOrder()->paginate(20);
        $dbloai = loaisanpham::all();
        return view('layouts.san-pham.san-pham', ['sanpham' => $db, 'loai' => $dbloai,'so1'=>$so1,'so2'=>$so2,'so3'=>$so3,'so4'=>$so4,'so5'=>$so5,'so6'=>$so6]);
    }
    public function sanphambyid($id)
    {
        $so1 = sanPham_model::where('GiaSP','<',2000000)->count();
        $so2 = sanPham_model::where('GiaSP','<=',7000000)->where('GiaSP','>=',2000000)->count();
        $so3 = sanPham_model::where('GiaSP','<=',13000000)->where('GiaSP','>=',7000000)->count();
        $so4 = sanPham_model::where('GiaSP','<=',30000000)->where('GiaSP','>=',13000000)->count();
        $so5 = sanPham_model::where('GiaSP','<=',50000000)->where('GiaSP','>=',30000000)->count();
        $so6 = sanPham_model::where('GiaSP','>=',50000000)->count();
        $dbloai = loaisanpham::all();
        $db =  sanPham_model::inRandomOrder()->where('id_loai_san_pham', $id)->paginate(20);
        return view('layouts.san-pham.san-pham-theo-loai', ['sanpham' => $db, 'loai' => $dbloai,'so1'=>$so1,'so2'=>$so2,'so3'=>$so3,'so4'=>$so4,'so5'=>$so5,'so6'=>$so6]);
    }

    public function PostHoiDap(HoiDap_Request $request)
    {
        $ins = new HoiDap_Model;
        $ins->id_san_pham = $request->id_san_pham;
        $ins->id_nguoi_dung = $request->id_nguoi_dung;
        $ins->NoiDung  = $request->noidung;
        $ins->id_tinh_trang_hoi_dap = 1;
        $ins->save();
        return redirect()->back()->with('thongbaobl', 'Bình luận đã được gửi và chờ được kiểm duyệt!');
    }


    //Kiểm kiếm ==========================================================>
    public function timkiem(Request $request)
    {
        $so1 = sanPham_model::where('GiaSP','<',2000000)->count();
        $so2 = sanPham_model::where('GiaSP','<=',7000000)->where('GiaSP','>=',2000000)->count();
        $so3 = sanPham_model::where('GiaSP','<=',13000000)->where('GiaSP','>=',7000000)->count();
        $so4 = sanPham_model::where('GiaSP','<=',30000000)->where('GiaSP','>=',13000000)->count();
        $so5 = sanPham_model::where('GiaSP','<=',50000000)->where('GiaSP','>=',30000000)->count();
        $so6 = sanPham_model::where('GiaSP','>=',50000000)->count();
        $tukhoa = $request->tukhoa;
        $dbloai = loaisanpham::get();
        $sanpham = sanPham_model::where('TenSP','like',"%$tukhoa%")->orWhere('MoTa','like',"%$tukhoa%")->orderBy('GiaSP', 'asc')->paginate(12);
        return view('layouts.san-pham.tim-kiem',['sanpham'=>$sanpham,'tukhoa'=>$tukhoa, 'loai' => $dbloai,'so1'=>$so1,'so2'=>$so2,'so3'=>$so3,'so4'=>$so4,'so5'=>$so5,'so6'=>$so6]);
    }
    // Các loại giá ===================================================================> 

    public function duoi2trieu(){
        $so1 = sanPham_model::where('GiaSP','<',2000000)->count();
        $so2 = sanPham_model::where('GiaSP','<=',7000000)->where('GiaSP','>=',2000000)->count();
        $so3 = sanPham_model::where('GiaSP','<=',13000000)->where('GiaSP','>=',7000000)->count();
        $so4 = sanPham_model::where('GiaSP','<=',30000000)->where('GiaSP','>=',13000000)->count();
        $so5 = sanPham_model::where('GiaSP','<=',50000000)->where('GiaSP','>=',30000000)->count();
        $so6 = sanPham_model::where('GiaSP','>=',50000000)->count();
        $dbloai = loaisanpham::get();
        $mucgia = 'Dưới 2 triệu';
        $sanpham = sanPham_model::where('GiaSP','<',2000000)->orderBy('GiaSP', 'asc')->paginate(12);
        return view('layouts.san-pham.san-pham-theo-gia',['sanpham'=>$sanpham,'gia'=>$mucgia, 'loai' => $dbloai,'so1'=>$so1,'so2'=>$so2,'so3'=>$so3,'so4'=>$so4,'so5'=>$so5,'so6'=>$so6]);
    }

    public function tu2den7trieu(){
        $so1 = sanPham_model::where('GiaSP','<',2000000)->count();
        $so2 = sanPham_model::where('GiaSP','<=',7000000)->where('GiaSP','>=',2000000)->count();
        $so3 = sanPham_model::where('GiaSP','<=',13000000)->where('GiaSP','>=',7000000)->count();
        $so4 = sanPham_model::where('GiaSP','<=',30000000)->where('GiaSP','>=',13000000)->count();
        $so5 = sanPham_model::where('GiaSP','<=',50000000)->where('GiaSP','>=',30000000)->count();
        $so6 = sanPham_model::where('GiaSP','>=',50000000)->count();
        $dbloai = loaisanpham::get();
        $mucgia = 'Từ 2- 7 triệu';
        $sanpham = sanPham_model::where('GiaSP','<=',7000000)->where('GiaSP','>=',2000000)->orderBy('GiaSP', 'asc')->paginate(12);
        return view('layouts.san-pham.san-pham-theo-gia',['sanpham'=>$sanpham,'gia'=>$mucgia, 'loai' => $dbloai,'so1'=>$so1,'so2'=>$so2,'so3'=>$so3,'so4'=>$so4,'so5'=>$so5,'so6'=>$so6,]);
    }

    public function tu7den13trieu(){
        $so1 = sanPham_model::where('GiaSP','<',2000000)->count();
        $so2 = sanPham_model::where('GiaSP','<=',7000000)->where('GiaSP','>=',2000000)->count();
        $so3 = sanPham_model::where('GiaSP','<=',13000000)->where('GiaSP','>=',7000000)->count();
        $so4 = sanPham_model::where('GiaSP','<=',30000000)->where('GiaSP','>=',13000000)->count();
        $so5 = sanPham_model::where('GiaSP','<=',50000000)->where('GiaSP','>=',30000000)->count();
        $so6 = sanPham_model::where('GiaSP','>=',50000000)->count();
        $dbloai = loaisanpham::get();
        $mucgia = 'Từ 7- 13 triệu';
        $sanpham = sanPham_model::where('GiaSP','<=',13000000)->where('GiaSP','>=',7000000)->orderBy('GiaSP', 'asc')->paginate(12);
        return view('layouts.san-pham.san-pham-theo-gia',['sanpham'=>$sanpham,'gia'=>$mucgia, 'loai' => $dbloai,'so1'=>$so1,'so2'=>$so2,'so3'=>$so3,'so4'=>$so4,'so5'=>$so5,'so6'=>$so6,]);
    }

    public function tu13den30trieu(){
        $so1 = sanPham_model::where('GiaSP','<',2000000)->count();
        $so2 = sanPham_model::where('GiaSP','<=',7000000)->where('GiaSP','>=',2000000)->count();
        $so3 = sanPham_model::where('GiaSP','<=',13000000)->where('GiaSP','>=',7000000)->count();
        $so4 = sanPham_model::where('GiaSP','<=',30000000)->where('GiaSP','>=',13000000)->count();
        $so5 = sanPham_model::where('GiaSP','<=',50000000)->where('GiaSP','>=',30000000)->count();
        $so6 = sanPham_model::where('GiaSP','>=',50000000)->count();
        $dbloai = loaisanpham::get();
        $mucgia = 'Từ 13- 30 triệu';
        $sanpham = sanPham_model::where('GiaSP','<=',30000000)->where('GiaSP','>=',13000000)->orderBy('GiaSP', 'asc')->paginate(12);
        return view('layouts.san-pham.san-pham-theo-gia',['sanpham'=>$sanpham,'gia'=>$mucgia, 'loai' => $dbloai,'so1'=>$so1,'so2'=>$so2,'so3'=>$so3,'so4'=>$so4,'so5'=>$so5,'so6'=>$so6,]);
    }

    public function tu30den50trieu(){
        $so1 = sanPham_model::where('GiaSP','<',2000000)->count();
        $so2 = sanPham_model::where('GiaSP','<=',7000000)->where('GiaSP','>=',2000000)->count();
        $so3 = sanPham_model::where('GiaSP','<=',13000000)->where('GiaSP','>=',7000000)->count();
        $so4 = sanPham_model::where('GiaSP','<=',30000000)->where('GiaSP','>=',13000000)->count();
        $so5 = sanPham_model::where('GiaSP','<=',50000000)->where('GiaSP','>=',30000000)->count();
        $so6 = sanPham_model::where('GiaSP','>=',50000000)->count();
        $dbloai = loaisanpham::get();
        $mucgia = 'Từ 30- 50 triệu';
        $sanpham = sanPham_model::where('GiaSP','<=',50000000)->where('GiaSP','>=',30000000)->orderBy('GiaSP', 'asc')->paginate(12);
        return view('layouts.san-pham.san-pham-theo-gia',['sanpham'=>$sanpham,'gia'=>$mucgia, 'loai' => $dbloai,'so1'=>$so1,'so2'=>$so2,'so3'=>$so3,'so4'=>$so4,'so5'=>$so5,'so6'=>$so6,]);
    }

    public function tren50trieu(){
        $so1 = sanPham_model::where('GiaSP','<',2000000)->count();
        $so2 = sanPham_model::where('GiaSP','<=',7000000)->where('GiaSP','>=',2000000)->count();
        $so3 = sanPham_model::where('GiaSP','<=',13000000)->where('GiaSP','>=',7000000)->count();
        $so4 = sanPham_model::where('GiaSP','<=',30000000)->where('GiaSP','>=',13000000)->count();
        $so5 = sanPham_model::where('GiaSP','<=',50000000)->where('GiaSP','>=',30000000)->count();
        $so6 = sanPham_model::where('GiaSP','>=',50000000)->count();
        $dbloai = loaisanpham::get();
        $mucgia = 'Trên 50 triệu';
        $sanpham = sanPham_model::where('GiaSP','>=',50000000)->orderBy('GiaSP', 'asc')->paginate(12);
        return view('layouts.san-pham.san-pham-theo-gia',['sanpham'=>$sanpham,'gia'=>$mucgia, 'loai' => $dbloai,'so1'=>$so1,'so2'=>$so2,'so3'=>$so3,'so4'=>$so4,'so5'=>$so5,'so6'=>$so6,]);
    }

    public function lienhe(){
        return view('layouts.lien-he');
    }
}
