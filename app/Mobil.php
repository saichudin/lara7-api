<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Mobil extends Model
{
    protected $table = 'mobil';
    protected $fillable = ['nopol','merk','tipe','warna','tahun','jenis',
                            'transmisi','harga_per_hari','status'];
}
