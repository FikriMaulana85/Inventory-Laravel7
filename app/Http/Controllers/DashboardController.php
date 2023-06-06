<?php

namespace App\Http\Controllers;

use App\Barang;
use App\Pembelian;
use App\Penjualan;
use App\Supplier;
use App\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $data = [
            'totalbarang' => Barang::count(),
            'totalsupplier' => Supplier::count(),
            'totalpembelian' => Pembelian::count(),
            'totalpenjualan' => Penjualan::count(),
            'user' => User::get()
        ];
        return view('admin.dashboard.dashboard', compact('data'), $data);
    }
}
