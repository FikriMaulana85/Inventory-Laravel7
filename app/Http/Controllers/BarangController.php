<?php

namespace App\Http\Controllers;

use App\Barang;
use App\User;
use Illuminate\Http\Request;

class BarangController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = [
            'lists' => Barang::orderBy('id', 'DESC')->get(),
            'user' => User::get()
        ];
        return view('admin.barang.list', $data);
    }

    public function add()
    {
        return view('admin.barang.add');
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

        $Datas = $request->validate([
            'kode_barang' => 'required|unique:barangs',
            'nama_barang' => 'required',
            'harga_barang' => 'required',
            'stok_barang' => 'required',
            'satuan_barang' => 'required',
        ]);
        Barang::create($Datas);
        return redirect('barang/add')->with('alert', 'Data berhasil disimpan.');
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
        $barang_edit = Barang::findOrFail($id);
        return view('admin.barang.edit', ['edit' => $barang_edit]);
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
        $Datas = $request->validate([
            'kode_barang' => 'required',
            'nama_barang' => 'required',
            'harga_barang' => 'required',
            'stok_barang' => 'required',
            'satuan_barang' => 'required',
        ]);
        Barang::where('id', $id)->update($Datas);
        return redirect('barang/edit/' . $id . '')->with('alert', 'Data berhasil diubah.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        Barang::destroy($request->id);
        return redirect('barang')->with('alert', 'Data berhasil dihapus.');
    }
}
