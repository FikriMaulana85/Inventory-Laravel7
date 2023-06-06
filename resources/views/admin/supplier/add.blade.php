@extends('layouts.admin')
@section('title')
    <title>Tambah Supplier</title>
@endsection
@section('row')
    <div class="row">
        <div class="col-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Tambah Supplier</h4>
                    @if (session()->has('alert'))
                        <div class="alert alert-success" role="alert">
                            {{ session('alert') }}
                        </div>
                    @endif
                    <form class="forms-sample" action="{{ url('supplier/store') }}" method="POST">
                        @csrf

                        <div class="form-group @error('kode_supplier') has-danger @enderror">
                            <label for="kode_supplier">Kode Supplier</label>
                            <input type="text" class="form-control" id="kode_supplier" name="kode_supplier"
                                placeholder="Kode Supplier" required>
                            @error('kode_supplier')
                                <label class="error mt-2 text-danger" for="kode_supplier">{{ $message }}</label>
                            @enderror
                        </div>

                        <div class="form-group @error('nama_supplier') has-danger @enderror">
                            <label for="nama_supplier">Nama Suppier</label>
                            <input type="text" class="form-control" id="nama_supplier" name="nama_supplier"
                                placeholder="Nama Suppier" required>
                            @error('nama_supplier')
                                <label class="error mt-2 text-danger" for="nama_supplier">{{ $message }}</label>
                            @enderror
                        </div>

                        <div class="form-group @error('nohp_supplier') has-danger @enderror">
                            <label for="nohp_supplier">No Hp Supplier</label>
                            <input type="text" class="form-control" id="nohp_supplier" name="nohp_supplier"
                                placeholder="Nama Suppier" required>
                            @error('nohp_supplier')
                                <label class="error mt-2 text-danger" for="nohp_supplier">{{ $message }}</label>
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
