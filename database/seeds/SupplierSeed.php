<?php

use App\Supplier;
use Illuminate\Database\Seeder;

class SupplierSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Supplier::create([
            'kode_supplier' => 'SP001',
            'nama_supplier' => 'PT Paku Merbabu',
            'nohp_supplier' => '083124644464'
        ]);
    }
}
