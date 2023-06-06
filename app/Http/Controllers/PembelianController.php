<?php

namespace App\Http\Controllers;

use App\Barang;
use App\User;
use App\Pembelian;
use App\Supplier;
use Illuminate\Http\Request;

class PembelianController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = [
            'lists' => Pembelian::with(['barangs', 'suppliers'])->orderBy('created_at', 'DESC')->get(),
            'user' => User::get()
        ];
        return view("admin.pembelian.list", $data);
    }

    public function add()
    {
        $data = [
            'barangs' => Barang::orderBy('created_at', 'DESC')->get(),
            'suppliers' => Supplier::orderBy('created_at', 'DESC')->get(),
            'kode_tr_pembelian' => sprintf("%03s", Pembelian::count() + 1),
            'user' => User::get()
        ];
        return view("admin.pembelian.add", $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $barang = Barang::where('id', $request->id_barangs)->get();
        $Datas = $request->validate([
            'id_users' => 'required',
            'id_barangs' => 'required',
            'id_suppliers' => 'required',
            'kode_tr_pembelian' => 'required|unique:pembelians',
            'qty_pembelian' => 'required'
        ]);
        $Updates = [
            'stok_barang' => $barang[0]->stok_barang + $request->qty_pembelian,
        ];
        Pembelian::create($Datas);
        Barang::where('id', $request->id_barangs)->update($Updates);
        return redirect('pembelian')->with('alert', 'Data berhasil disimpan.');
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
    public function destroy(Request $request)
    {
        $barang = Barang::where('id', $request->id_barangs)->get();
        $Updates = [
            'stok_barang' => $barang[0]->stok_barang - $request->qty_pembelian,
        ];
        Pembelian::destroy($request->id);
        Barang::where('id', $request->id_barangs)->update($Updates);
        return redirect('pembelian')->with('alert', 'Data berhasil dihapus.');
    }
}
