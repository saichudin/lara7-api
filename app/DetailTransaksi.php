<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DetailTransaksi extends Model
{
    protected $table = 'detail_transaksi';
    protected $guarded = [];

    public function transaksi()
    {
        return $this->belongsTo('App\Transaksi');
    }
}
