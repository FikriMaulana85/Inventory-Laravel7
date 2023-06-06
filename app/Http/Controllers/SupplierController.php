<?php

namespace App\Http\Controllers;

use App\Supplier;
use App\User;
use Illuminate\Http\Request;

class SupplierController extends Controller
{
    public function index()
    {
        $data = [
            'lists' => Supplier::orderBy('id', 'DESC')->get(),
            'user' => User::get()
        ];
        return view('admin.supplier.list', $data);
    }

    public function add()
    {
        return view('admin.supplier.add');
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
            'kode_supplier' => 'required|unique:suppliers',
            'nama_supplier' => 'required',
            'nohp_supplier' => 'required',
        ]);
        Supplier::create($Datas);
        return redirect('supplier/add')->with('alert', 'Data berhasil disimpan.');
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
        $supplier = Supplier::findOrFail($id);
        return view('admin.supplier.edit', ['edit' => $supplier]);
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
            'kode_supplier' => 'required',
            'nama_supplier' => 'required',
            'nohp_supplier' => 'required',
        ]);
        Supplier::where('id', $id)->update($Datas);
        return redirect('supplier/edit/' . $id . '')->with('alert', 'Data berhasil diubah.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        Supplier::destroy($request->id);
        return redirect('supplier')->with('alert', 'Data berhasil dihapus.');
    }
}
