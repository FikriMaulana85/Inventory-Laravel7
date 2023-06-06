<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Barang extends Model
{
    protected $primaryKey = 'id';
    // protected $table = "barangs";
    protected $fillable = ['kode_barang', 'nama_barang', 'harga_barang', 'stok_barang', 'satuan_barang'];
}