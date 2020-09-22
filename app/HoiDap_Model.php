<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class HoiDap_Model extends Model
{
    protected $table = 'hoi_dap';
    public $timestamps = false;

    public function nguoidung()
    {
        return $this->belongsTo('App\NguoiDungModel', 'id_nguoi_dung', 'id');
    }

public function sanpham()
{
    return $this->belongsTo('App\sanPham_model', 'id_san_pham', 'id');
}
}
