<?php

namespace App\Http\Controllers;
use App\Anh_Bia_Model;
use Illuminate\Http\Request;

class Anh_Bia_Controller extends Controller
{
    public function GetAnhBia(){
        $db = Anh_Bia_Model::where('id',1)->get();
        return view('admin.anh-bia.sua',['anh'=>$db]);
    }
    public function PostAnhBia(Request $request){
         $request->validate([
            'anhbiax' => 'image'
        ],[
            'anhbiax.image'=>'Vui lòng nhập đúng định dạng hình ảnh !'
        ]);

        $anhbia = $request->anhbia;
        if(($request->file('anhbiax'))!=''){
            $anhbia = $request->file('anhbiax')->getClientOriginalName();
            $request->file('anhbiax')->move('public/images/anhbia/',$anhbia);
        }
        Anh_Bia_Model::where('id',$request->id)->update([
            'AnhBia'=>$anhbia
        ]);
        return redirect()->back()->with('thongbao','Cập nhập ảnh bìa thành công !');

    }
}
