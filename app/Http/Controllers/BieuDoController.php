<?php

namespace App\Http\Controllers;
use App\sanPham_model;
use Illuminate\Http\Request;

class BieuDoController extends Controller
{
    public function pie(){
        $soluotxem = sanPham_model::all();
        return view('admin.bieu-do.pie',['soluotxem'=>$soluotxem]);
    }

    public function bar(){
        $soluotxem = sanPham_model::all();
        return view('admin.bieu-do.bar',['soluotxem'=>$soluotxem]);
    }

    public function line(){
        $soluotxem = sanPham_model::all();
        return view('admin.bieu-do.line',['soluotxem'=>$soluotxem]);
    }
}
