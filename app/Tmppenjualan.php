<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tmppenjualan extends Model
{
    protected $primaryKey = 'id';
    protected $guarded = ['id'];

    public function penjualans()
    {
        return $this->belongsTo(Penjualan::class, 'kode_tr_penjualan');
    }
    public function barangs()
    {
        return $this->belongsTo(Barang::class, 'id_barangs');
    }
}
