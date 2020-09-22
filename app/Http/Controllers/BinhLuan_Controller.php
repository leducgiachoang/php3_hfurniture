<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Mail;
use App\HoiDap_Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BinhLuan_Controller extends Controller
{
    public function danhsach()
    {
        $db = HoiDap_Model::latest('id')->paginate(5);;
        return view('admin.binh-luan.danh-sach', ['db' => $db]);
    }

    public function PostCapNhap(Request $request)
    {
        HoiDap_Model::where('id', $request->id)->update([
            'id_san_pham' => $request->id_san_pham,
            'id_nguoi_dung' => $request->id_nguoi_dung,
            'NoiDung' => $request->NoiDung,
            'id_tinh_trang_hoi_dap' => $request->id_tinh_trang_hoi_dap
        ]);

        return redirect()->back();
    }

    public function xoa($id)
    {
        HoiDap_Model::where('id', $id)->delete();
        return redirect()->back()->with('thongbao', 'Xoa Bình luận thành công !');
    }

    public function traloi(Request $request)
    {
        $email = $request->email;
        $noidung = $request->noidung;
        $data = [
            'noidung' => $noidung
        ];
        Mail::send('mail.tra-loi-binh-luan', $data, function ($message) use ($email) {
            $message->to($email, 'Trả lời bình luận')->subject('trả lời bình luận');
        });

        return redirect()->back()->with('thongbao','Email đã được gửi thành công !');
    }

    public function nhanxetcuatoi(){
        $id_nguoi_dung = Auth::user()->id;
        $nhanxet = HoiDap_Model::where('id_nguoi_dung',$id_nguoi_dung)->orderBy('id', 'desc')->get();
        return view('admin.binh-luan.binh-luan-cua-toi',['nhanxet'=> $nhanxet]);
    }
    public function timkiem(Request $request){
        $tukhoa = $request->tukhoa;
        $db = HoiDap_Model::where('id','like',"%$tukhoa%")->orWhere('NoiDung','like',"%$tukhoa%")->paginate(5);
        return view('admin.binh-luan.danh-sach', ['db' => $db]);
    }
}
