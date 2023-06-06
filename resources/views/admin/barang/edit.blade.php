@extends('layouts.admin')
@section('title')
    <title>Edit Barang</title>
@endsection
@section('row')
    <div class="row">
        <div class="col-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Edit Barang</h4>
                    @if (session()->has('alert'))
                        <div class="alert alert-success" role="alert">
                            {{ session('alert') }}
                        </div>
                    @endif
                    <form class="forms-sample" action="{{ url('barang/edit/' . $edit->id . '') }}" method="POST">
                        @method('put')
                        @csrf


                        <div class="form-group @error('kode_barang') has-danger @enderror">
                            <label for="kode_barang">Kode Barang</label>
                            <input type="text" class="form-control" id="kode_barang" name="kode_barang"
                                placeholder="Kode Barang" value="{{ old('kode_barang', $edit->kode_barang) }}" required>
                            @error('kode_barang')
                                <label class="error mt-2 text-danger" for="kode_barang">{{ $message }}</label>
                            @enderror
                        </div>

                        <div class="form-group @error('nama_barang') has-danger @enderror">
                            <label for="nama_barang">Nama Barang</label>
                            <input type="text" class="form-control" id="nama_barang" name="nama_barang"
                                placeholder="Nama Barang" value="{{ old('nama_barang', $edit->nama_barang) }}" required>
                            @error('nama_barang')
                                <label class="error mt-2 text-danger" for="nama_barang">{{ $message }}</label>
                            @enderror
                        </div>

                        <div class="form-group @error('harga_barang') has-danger @enderror">
                            <label for="harga_barang">Harga Barang</label>
                            <input type="text" class="form-control" id="harga_barang" name="harga_barang"
                                placeholder="Harga Barang" value="{{ old('harga_barang', $edit->harga_barang) }}" required>
                            @error('harga_barang')
                                <label class="error mt-2 text-danger" for="harga_barang">{{ $message }}</label>
                            @enderror
                        </div>

                        <div class="form-group @error('stok_barang') has-danger @enderror">
                            <label for="stok_barang">Stok Barang</label>
                            <input type="text" class="form-control" id="stok_barang" name="stok_barang"
                                placeholder="Stok Barang" value="{{ old('stok_barang', $edit->stok_barang) }}" required>
                            @error('stok_barang')
                                <label class="error mt-2 text-danger" for="stok_barang">{{ $message }}</label>
                            @enderror
                        </div>

                        <div class="form-group @error('satuan_barang') has-danger @enderror">
                            <label for="satuan_barang">Satuan Barang</label>
                            <input type="text" class="form-control" id="satuan_barang" name="satuan_barang"
                                placeholder="pcs/pack/dll" value="{{ old('satuan_barang', $edit->satuan_barang) }}"
                                required>
                            @error('satuan_barang')
                                <label class="error mt-2 text-danger" for="satuan_barang">{{ $message }}</label>
                            @enderror
                        </div>
                        <button type="submit" class="btn btn-primary mr-2">Ubah</button>
                        <button class="btn btn-light" onclick="history.back()">Kembali</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
