@extends('layouts.admin')
@section('title')
    <title>Tambah Transaksi Pembelian</title>
@endsection
@section('row')
    <div class="row">
        <div class="col-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Tambah Transaksi Pembelian</h4>
                    @if (session()->has('alert'))
                        <div class="alert alert-success" role="alert">
                            {{ session('alert') }}
                        </div>
                    @endif
                    <form class="forms-sample" action="{{ url('pembelian/store') }}" method="POST">
                        @csrf
                        <input type="hidden" readonly name="id_users" id="id_users" value="{{ Auth::user()->id }}">
                        <div class="form-group @error('kode_tr_pembelian') has-danger @enderror">
                            <label for="kode_tr_pembelian">Kode Transaksi Pembelian</label>
                            <input type="text" class="form-control" id="kode_tr_pembelian" name="kode_tr_pembelian"
                                placeholder="Kode Transaksi Pembelian" value="TRX-PMBL-{{ $kode_tr_pembelian }}" required>
                            @error('kode_tr_pembelian')
                                <label class="error mt-2 text-danger" for="kode_tr_pembelian">{{ $message }}</label>
                            @enderror
                        </div>


                        <div class="form-group @error('id_barangs') has-danger @enderror">
                            <label>Pilih Barang</label>
                            <select class="js-example-basic-single" style="width:100%" name="id_barangs" id="id_barangs">
                                <option value="" selected disabled>Pilih Barang</option>
                                @foreach ($barangs as $barang)
                                    <option value="{{ $barang->id }}">{{ $barang->nama_barang }}</option>
                                @endforeach
                            </select>
                            @error('id_barangs')
                                <label class="error mt-2 text-danger" for="id_barangs">{{ $message }}</label>
                            @enderror
                        </div>

                        <div class="form-group @error('id_suppliers') has-danger @enderror">
                            <label>Pilih Supplier</label>
                            <select class="js-example-basic-single" style="width:100%" name="id_suppliers"
                                id="id_suppliers">
                                <option value="" selected disabled>Pilih Supplier</option>
                                @foreach ($suppliers as $supplier)
                                    <option value="{{ $supplier->id }}">{{ $supplier->nama_supplier }}</option>
                                @endforeach
                            </select>
                            @error('id_suppliers')
                                <label class="error mt-2 text-danger" for="id_suppliers">{{ $message }}</label>
                            @enderror
                        </div>

                        <div class="form-group @error('qty_pembelian') has-danger @enderror">
                            <label for="qty_pembelian">Qty Pembelian</label>
                            <input type="text" class="form-control" id="qty_pembelian" name="qty_pembelian"
                                placeholder="Qty Pembelian" required>
                            @error('qty_pembelian')
                                <label class="error mt-2 text-danger" for="qty_pembelian">{{ $message }}</label>
                            @enderror
                        </div>

                        <button type="submit" class="btn btn-primary mr-2">Simpan</button>
                        <button class="btn btn-light" onclick="history.back()">Kembali</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
