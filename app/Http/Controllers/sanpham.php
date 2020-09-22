<?php

namespace App\Http\Controllers;

use App\Http\Requests\san_pham;
use App\Http\Requests\sua_san_pham;
use Illuminate\Http\Request;
use App\loaisanpham;
use App\sanPham_model;

class sanpham extends Controller
{
    public function them()
    {
        $db = loaisanpham::all();
        return view('admin.san-pham.them', ['db' => $db]);
    }

    public function clickthem(san_pham $request)
    {
        $anhsp = $request->file('anhsp')->getClientOriginalName();
        $request->file('anhsp')->move('public/images/sp/',$anhsp);

        $anh1 = $request->file('anh1')->getClientOriginalName();
        $request->file('anh1')->move('public/images/sp/',$anh1);

        $anh2 = $request->file('anh2')->getClientOriginalName();
        $request->file('anh2')->move('public/images/sp/',$anh2);

        $anh3 = $request->file('anh3')->getClientOriginalName();
        $request->file('anh3')->move('public/images/sp/',$anh3);

        $db = new sanPham_model;
        $db->TenSP =  $request->tensp;
        $db->AnhSP = $anhsp;
        $db->GiaSP= $request->giasp;
        $db->MoTa= $request->mota;
        $db->SoLuong= $request->soluong;
        $db->SoLuotXem= 0;
        $db->Anh1= $anh1;
        $db->Anh2= $anh2;
        $db->Anh3= $anh3;
        $db->id_loai_san_pham = $request->id_loai_san_pham;
        $db->save();

        if($db = true){
            return redirect('admin/san-pham/them')->with('thongbao','Thêm sản phẩm thành công');
        }else{
            return redirect()->back()->with('thongbao','Thêm sản phẩm thất bại');
        }

        
    }

    public function danhsach(){
        $db = sanPham_model::Paginate(10);
        return view('admin.san-pham.danh-sach',['db'=>$db]);
    }

    public function timkiem(Request $request){
        $tukhoa = $request->tukhoa;
        $db = sanPham_model::where('TenSP','like',"%$tukhoa%")->orWhere('MoTa','like',"%$tukhoa%")->Paginate(10);
        return view('admin.san-pham.danh-sach',['db'=>$db]);
    }

    public function xoa($id){
        $db = sanPham_model::find($id)->delete();

        return redirect('admin/san-pham/danh-sach')->with('thongbao', 'Xóa sản phẩm thành công');
    }

    public function sua($id){
        $db = sanPham_model::where('id',$id)->get();
        $dbloai = loaisanpham::all();

        return view('admin.san-pham.sua',['db'=>$db,'dbloai'=>$dbloai]);
    }
    public function clicksua(sua_san_pham $request){
        $anhsp = $request->anhsp;
        if(($request->file('anhspx'))!=''){
            $anhsp = $request->file('anhspx')->getClientOriginalName();
            $request->file('anhspx')->move('public/images/sp/',$anhsp);
        }

        $anh1 = $request->anh1;
        if(($request->file('anh1x'))!=''){
            $anh1 = $request->file('anh1x')->getClientOriginalName();
            $request->file('anh1x')->move('public/images/sp/',$anh1);
        }

        $anh2 = $request->anh2;
        if(($request->file('anh2x'))!=''){
            $anh2 = $request->file('anh2x')->getClientOriginalName();
            $request->file('anh2x')->move('public/images/sp/',$anh2);
        }

        $anh3 = $request->anh3;
        if(($request->file('anh3x'))!=''){
            $anh3 = $request->file('anh3x')->getClientOriginalName();
            $request->file('anh3x')->move('public/images/sp/',$anh3);
        }
        
            sanPham_model::where('id',$request->id)->update([
            'TenSP' =>  $request->tensp,
            'AnhSP' => $anhsp,
            'GiaSP'=> $request->giasp,
            'MoTa'=> $request->mota,
            'SoLuong'=> $request->soluong,
            'SoLuotXem'=> $request->soluotxem,
            'Anh1'=> $anh1,
            'Anh2'=> $anh2,
            'Anh3'=> $anh3,
            'id_loai_san_pham' => $request->id_loai_san_pham,
            
        ]);

        return redirect('admin/san-pham/sua/'.$request->id);
    }
}
