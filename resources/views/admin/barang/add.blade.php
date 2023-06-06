@extends('layouts.admin')
@section('title')
    <title>Tambah Barang</title>
@endsection
@section('row')
    <div class="row">
        <div class="col-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Tambah Barang</h4>
                    @if (session()->has('alert'))
                        <div class="alert alert-success" role="alert">
                            {{ session('alert') }}
                        </div>
                    @endif
                    <form class="forms-sample" action="{{ url('barang/store') }}" method="POST">
                        @csrf

                        <div class="form-group @error('kode_barang') has-danger @enderror">
                            <label for="kode_barang">Kode Barang</label>
                            <input type="text" class="form-control" id="kode_barang" name="kode_barang"
                                placeholder="Kode Barang" required>
                            @error('kode_barang')
                                <label class="error mt-2 text-danger" for="kode_barang">{{ $message }}</label>
                            @enderror
                        </div>

                        <div class="form-group @error('nama_barang') has-danger @enderror">
                            <label for="nama_barang">Nama Barang</label>
                            <input type="text" class="form-control" id="nama_barang" name="nama_barang"
                                placeholder="Nama Barang" required>
                            @error('nama_barang')
                                <label class="error mt-2 text-danger" for="nama_barang">{{ $message }}</label>
                            @enderror
                        </div>

                        <div class="form-group @error('harga_barang') has-danger @enderror">
                            <label for="harga_barang">Harga Barang</label>
                            <input type="text" class="form-control" id="harga_barang" name="harga_barang"
                                placeholder="Harga Barang" required>
                            @error('harga_barang')
                                <label class="error mt-2 text-danger" for="harga_barang">{{ $message }}</label>
                            @enderror
                        </div>

                        <div class="form-group @error('stok_barang') has-danger @enderror">
                            <label for="stok_barang">Stok Barang</label>
                            <input type="text" class="form-control" id="stok_barang" name="stok_barang"
                                placeholder="Stok Barang" required>
                            @error('stok_barang')
                                <label class="error mt-2 text-danger" for="stok_barang">{{ $message }}</label>
                            @enderror
                        </div>

                        <div class="form-group @error('satuan_barang') has-danger @enderror">
                            <label for="satuan_barang">Satuan Barang</label>
                            <input type="text" class="form-control" id="satuan_barang" name="satuan_barang"
                                placeholder="pcs/pack/dll" required>
                            @error('satuan_barang')
                                <label class="error mt-2 text-danger" for="satuan_barang">{{ $message }}</label>
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
