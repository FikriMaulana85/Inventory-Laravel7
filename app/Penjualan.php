<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Penjualan extends Model
{
    protected $primaryKey = 'id';
    protected $guarded = ['id'];
    protected $foreignKey = ['kode_tr_penjualan'];

    public function barangs()
    {
        return $this->belongsTo(Barang::class, 'id_barangs');
    }

    public function tmppenjualan()
    {
        return $this->belongsTo(Barang::class, 'kode_tr_penjualan');
    }
}
