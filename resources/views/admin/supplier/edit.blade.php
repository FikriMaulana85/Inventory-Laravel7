@extends('layouts.admin')
@section('title')
    <title>Edit Supplier</title>
@endsection
@section('row')
    <div class="row">
        <div class="col-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Edit Supplier</h4>
                    @if (session()->has('alert'))
                        <div class="alert alert-success" role="alert">
                            {{ session('alert') }}
                        </div>
                    @endif
                    <form class="forms-sample" action="{{ url('supplier/edit/' . $edit->id . '') }}" method="POST">
                        @method('put')
                        @csrf

                        <div class="form-group @error('kode_supplier') has-danger @enderror">
                            <label for="kode_supplier">Kode Supplier</label>
                            <input type="text" class="form-control" id="kode_supplier" name="kode_supplier"
                                placeholder="Kode Supplier" value="{{ old('kode_supplier', $edit->kode_supplier) }}"
                                required>
                            @error('kode_supplier')
                                <label class="error mt-2 text-danger" for="kode_supplier">{{ $message }}</label>
                            @enderror
                        </div>

                        <div class="form-group @error('nama_supplier') has-danger @enderror">
                            <label for="nama_supplier">Nama Suppier</label>
                            <input type="text" class="form-control" id="nama_supplier" name="nama_supplier"
                                placeholder="Nama Suppier" value="{{ old('nama_supplier', $edit->nama_supplier) }}"
                                required>
                            @error('nama_supplier')
                                <label class="error mt-2 text-danger" for="nama_supplier">{{ $message }}</label>
                            @enderror
                        </div>

                        <div class="form-group @error('nohp_supplier') has-danger @enderror">
                            <label for="nohp_supplier">No Hp Supplier</label>
                            <input type="text" class="form-control" id="nohp_supplier" name="nohp_supplier"
                                placeholder="Nama Suppier" value="{{ old('nohp_supplier', $edit->nohp_supplier) }}"
                                required>
                            @error('nohp_supplier')
                                <label class="error mt-2 text-danger" for="nohp_supplier">{{ $message }}</label>
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
