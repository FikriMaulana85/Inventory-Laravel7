<?php

namespace App\Http\Controllers;

use App\User;
use App\Pembelian;
use App\Tmppenjualan;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\DB;

class LaporanController extends Controller
{
    public function pembelian()
    {
        return view("admin.laporan.pembelian");
    }

    public function penjualan()
    {
        return view("admin.laporan.penjualan");
    }

    public function cetak_pembelian(Request $request)
    {
        $data = [
            'tanggal_awal' => $request->tanggal_awal,
            'tanggal_akhir' => $request->tanggal_akhir,
            'tr_pembelian' => Pembelian::with(['barangs', 'suppliers'])->whereBetween(DB::raw('DATE(created_at)'), [$request->tanggal_awal, $request->tanggal_akhir])->get(),
            'user' => User::get()
        ];
        // dd($data);
        $pdf = Pdf::loadView('admin.laporan.pembelian_pdf', $data)->setPaper('a4', 'landscape');
        // return $pdf->download('invoice.pdf');
        return $pdf->stream('');
    }

    public function cetak_penjualan(Request $request)
    {
        $data = [
            'tanggal_awal' => $request->tanggal_awal,
            'tanggal_akhir' => $request->tanggal_akhir,
            //  'details' => Penjualan::where('kode_tr_penjualan', $id)->get(),
            'tr_penjualan' => Tmppenjualan::with(['barangs'])->whereBetween(DB::raw('DATE(created_at)'), [$request->tanggal_awal, $request->tanggal_akhir])->get(),
            'user' => User::get()
        ];
        // dd($data);
        $pdf = Pdf::loadView('admin.laporan.penjualan_pdf', $data)->setPaper('a4', 'landscape');
        // return $pdf->download('invoice.pdf');
        return $pdf->stream('');
    }
}
