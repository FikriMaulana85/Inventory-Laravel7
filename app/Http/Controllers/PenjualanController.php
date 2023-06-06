<?php

namespace App\Http\Controllers;

use App\User;
use App\Barang;
use App\Penjualan;
use App\Tmppenjualan;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;

class PenjualanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = [
            'lists' => Penjualan::orderBy('created_at', 'DESC')->get(),
            'user' => User::get()
        ];
        return view("admin.penjualan.list", $data);
    }

    public function add()
    {
        $data = [
            'lists' => Tmppenjualan::with(['barangs'])->where('kode_tr_penjualan', "TRX-INV-" . sprintf("%03s", Penjualan::count() + 1))->orderBy('created_at', 'DESC')->get(),
            'barangs' => Barang::orderBy('created_at', 'DESC')->get(),
            'kode_tr_penjualan' => sprintf("%03s", Penjualan::count() + 1),
            'user' => User::get()
        ];
        return view("admin.penjualan.kasir", $data);
    }

    public function print($id)
    {
        $data = [
            'details' => Penjualan::where('kode_tr_penjualan', $id)->get(),
            'lists' => Tmppenjualan::with(['barangs'])->where('kode_tr_penjualan', $id)->orderBy('created_at', 'DESC')->get(),
            'user' => User::get()
        ];
        // dd($data);
        return view("admin.penjualan.print", $data);
        // $pdf = Pdf::loadView('admin.penjualan.print', $data)->setPaper('a4', 'landscape');
        // return $pdf->download('invoice.pdf');
        // return $pdf->stream('invoice.pdf');
    }

    public function add_cart(Request $request)
    {
        $barang = Barang::where('id', $request->id_barangs)->get();
        $Datas = [
            'id_barangs' => $request->id_barangs,
            'kode_tr_penjualan' => $request->kode_tr_penjualan,
            'qty_jual' => $request->qty_jual,
            'total_harga' => $request->qty_jual * $barang[0]->harga_barang
        ];
        $Updates = [
            'stok_barang' => $barang[0]->stok_barang - $request->qty_jual,
        ];
        if ($barang[0]->stok_barang == 0 || $barang[0]->stok_barang < $request->qty_jual)
            return redirect('penjualan/kasir')->with('alert-warning', 'Stok barang tidak mencukupi!');
        Tmppenjualan::create($Datas);
        Barang::where('id', $request->id_barangs)->update($Updates);
        return redirect('penjualan/kasir')->with('alert', 'Data berhasil disimpan.');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $Datas = [
            'id_users' => $request->id_users,
            'kode_tr_penjualan' => $request->kode_tr_penjualan,
            'grand_total' => Tmppenjualan::where('kode_tr_penjualan', $request->kode_tr_penjualan)->sum('total_harga')
        ];
        Penjualan::create($Datas);
        return redirect('penjualan')->with('alert', 'Transaksi berhasil disimpan.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function delete_cart(Request $request)
    {
        $barang = Barang::where('id', $request->id_barangs)->get();
        $Updates = [
            'stok_barang' => $barang[0]->stok_barang + $request->qty_jual,
        ];
        Tmppenjualan::destroy($request->id);
        Barang::where('id', $request->id_barangs)->update($Updates);
        return redirect('penjualan/kasir')->with('alert', 'Data berhasil dihapus dari keranjang');
    }
}
