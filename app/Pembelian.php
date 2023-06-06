<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pembelian extends Model
{
    protected $primaryKey = 'id';
    protected $guarded = ['id'];

    public function barangs()
    {
        return $this->belongsTo(Barang::class, 'id_barangs');
    }

    public function suppliers()
    {
        return $this->belongsTo(Supplier::class, 'id_suppliers');
    }
}
// return $this->belongsTo(Bimwin::class, 'bimwin_id');