<?php

namespace App\Http\Controllers;
use App\Http\Requests\EditLoaiSanPham_request;
use App\Http\Requests\loai_sanpham;
use Illuminate\Http\Request;
use App\loaisanpham;
use Illuminate\Support\Facades\App;

class loai_san_pham extends Controller
{
    public function them()
    {
        return view('admin.loai_san_pham.them');
    }
    public function clickthem(loai_sanpham $request)
    {
        $AnhDanhMuc = $request->file('anhdanhmuc')->getClientOriginalName();
        $request->file('anhdanhmuc')->move('public/images/anhdanhmuc/',$AnhDanhMuc);
        $them = new loaisanpham;
        $them->TenLoai = $request->tenloai;
        $them->AnhDanhMuc = $AnhDanhMuc;
        $them->save();

        return redirect('admin/loai-san-pham/them')->with('thongbao', 'Thêm sản phẩm thành công');
    }

    public function danhsach()
    {
        $dib = loaisanpham::Paginate(10);
        return view('admin.loai_san_pham.danh-sach', ['dbx' => $dib]);
    }

    public function timkiem(Request $request)
    {
        $tukhoa = $request->tukhoa;
        $dib = loaisanpham::where('TenLoai','like',"%$tukhoa%")->Paginate(10);
        return view('admin.loai_san_pham.danh-sach', ['dbx' => $dib]);
    }

    public function xoa($id)
    {
        $xoa = loaisanpham::find($id)->delete();
        return redirect('admin/loai-san-pham/danh-sach')->with('thongbao', 'Xóa danh mục sản phẩm thành công');
    }

    public function sua($id){
        $sua = loaisanpham::where('id',$id)->get();
        return view('admin.loai_san_pham.sua',['db'=>$sua]);
    }

    public function clicksua(EditLoaiSanPham_request $request){
        $AnhDanhMuc = $request->anhdanhmuc;
        if(($request->file('anhdanhmucx'))!=''){
            $AnhDanhMuc = $request->file('anhdanhmucx')->getClientOriginalName();
            $request->file('anhdanhmucx')->move('public/images/anhdanhmuc/', $AnhDanhMuc);
        }
        loaisanpham::where('id',$request->id)->update([
            'TenLoai'=>$request->tenloai,
            'AnhDanhMuc'=>$AnhDanhMuc
        ]);

        return redirect('admin/loai-san-pham/sua/'.$request->id)->with('thongbao','Sửa sản phẩm thành công');
    }
}
