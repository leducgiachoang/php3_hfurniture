<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class NguoiDungModel extends Model
{
    protected $table = 'nguoi_dung';
    public $timestamps = false;



    public function vaitro()
    {
        return $this->belongsTo('App\VaiTro_Model', 'id_vai_tro', 'id');
    }

    public function trangthai()
    {
        return $this->belongsTo('App\TinhTrang_Model', 'id_trang_thai', 'id');
    }
}
