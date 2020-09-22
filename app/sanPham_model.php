<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class sanPham_model extends Model
{
    protected $table = 'san_pham';
    public $timestamps = false; 

    public function loai()
    {
        return $this->belongsTo('App\loaisanpham', 'id_loai_san_pham', 'id');
    }
}
