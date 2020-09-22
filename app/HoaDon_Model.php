<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class HoaDon_Model extends Model
{
    protected $table = 'hoa_don';
    public $timestamps = false;

    public function nguoidung()
    {
        return $this->belongsTo('App\NguoiDungModel', 'id_nguoi_dung', 'id');
    }

    public function tinhtrang()
    {
        return $this->belongsTo('App\TinhTrangDonHang_Model', 'id_tinh_trang', 'id');
    }


    public function chitiethoadon()
    {
        return $this->hasMany('App\ChiTietHoaDon_model', 'id_hoa_don', 'id');
    }

    public function sanpham()
    {
        return $this->belongsToMany('App\sanPham_model', 'chi_tiet_hoa_don', 'id_hoa_don', 'id_san_pham')->withPivot([
            'SoLuongMua',
            'DonGia',
        ]);
    }

   
}
