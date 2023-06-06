<?php

use App\Barang;
use Illuminate\Database\Seeder;

class BarangSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Barang::create([
            'kode_barang' => '001',
            'nama_barang' => 'Paku Beton 10cm',
            'harga_barang' => 45000,
            'stok_barang' => 250,
            'satuan_barang' => 'Pcs'
        ]);
    }
}
