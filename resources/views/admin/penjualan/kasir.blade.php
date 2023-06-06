@extends('layouts.kasir')
@section('title')
    <title>Kasir</title>
@endsection
@section('row')
    <div class="row">
        <div class="col-12 pt-5">
            <a class="btn btn-primary" href="{{ url('penjualan') }}"><i class="mdi mdi-arrow-left-bold mr-2"></i>Kembali</a>
        </div>
    </div>
    <div class="row">
        <div class="col-12 pt-5 text-center">

            <h1 class="text-primary display-2">
                <i class="mdi mdi-cart"></i> KASIR
            </h1>
            @if (session()->has('alert'))
                <div class="alert alert-success" role="alert">
                    {{ session('alert') }}
                </div>
            @endif
            @if (session()->has('alert-warning'))
                <div class="alert alert-warning" role="alert">
                    {{ session('alert-warning') }}
                </div>
            @endif
        </div>
    </div>
    <div class="row">

        <div class="col-4 pt-5">
            <div class="card">
                <div class="card-header">
                    <h6 class="card-title">List Barang & Jumlah</h6>
                </div>
                <div class="card-body">
                    <form action="{{ url('penjualan/add_cart') }}" method="POST">
                        @csrf
                        <input type="hidden" readonly name="id_users" id="id_users" value="{{ Auth::user()->id }}"
                            required>
                        <input type="hidden" readonly id="kode_tr_penjualan"
                            name="kode_tr_penjualan"value="TRX-INV-{{ $kode_tr_penjualan }}" required>
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

                        <div class="form-group @error('qty_jual') has-danger @enderror">
                            <label for="qty_jual">Qty</label>
                            <input type="text" class="form-control" id="qty_jual" name="qty_jual"
                                placeholder="Qty Pembelian" required>
                            @error('qty_jual')
                                <label class="error mt-2 text-danger" for="qty_jual">{{ $message }}</label>
                            @enderror
                        </div>

                        <button type="submit" class="btn btn-primary mr-2"><i class="mdi mdi-cart-plus"></i>
                            Tambah</button>
                    </form>
                </div>
            </div>
        </div>

        <div class="col-8 pt-5">
            <div class="card">
                <div class="card-header">
                    <h6 class="card-title">Keranjang</h6>
                </div>
                <div class="card-body">
                    <form action="{{ url('penjualan/store') }}" method="POST">
                        @csrf
                        <div class="row">
                            <div class="col-4">
                                <input type="hidden" readonly name="id_users" id="id_users"
                                    value="{{ Auth::user()->id }}">
                                <input type="hidden" readonly id="kode_tr_penjualan"
                                    name="kode_tr_penjualan"value="TRX-INV-{{ $kode_tr_penjualan }}" required>
                                <div class="form-group @error('tanggal_transaksi') has-danger @enderror">
                                    <label for="tanggal_transaksi">Tanggal Transaksi</label>
                                    <input type="date" class="form-control" id="tanggal_transaksi"
                                        name="tanggal_transaksi" placeholder="Qty Pembelian" required>
                                    @error('tanggal_transaksi')
                                        <label class="error mt-2 text-danger"
                                            for="tanggal_transaksi">{{ $message }}</label>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-8 pt-2 text-right">
                                <button type="submit" class="btn btn-primary mr-2"><i class="mdi mdi-content-save"></i>
                                    Simpan</button>
                            </div>
                        </div>
                    </form>
                    <div class="table-responsive">
                        <table id="order-listing" class="table">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama Barang</th>
                                    <th>Harga Satuan</th>
                                    <th>Qty</th>
                                    <th>Sub Total</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                {{-- @dump($lists) --}}
                                @php
                                    $grand_total = 0;
                                @endphp
                                @foreach ($lists as $list)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $list->barangs->nama_barang }}</td>
                                        <td>{{ $list->barangs->harga_barang }}</td>
                                        <td>{{ $list->qty_jual }}</td>
                                        <td>{{ $list->total_harga }}</td>
                                        <td>
                                            <form action="{{ url('penjualan/delete_cart/' . $list->id) }}" method="post"
                                                class="d-inline">
                                                @method('delete')
                                                @csrf
                                                <input type="hidden" name="id_barangs" value="{{ $list->barangs->id }}">
                                                <input type="hidden" name="qty_jual" value="{{ $list->qty_jual }}">
                                                <button class="btn btn-outline-danger"
                                                    onclick="return confirm('Yakin Ingin Menghapus ?');"><i
                                                        class="mdi mdi-delete"></i></button>
                                            </form>

                                        </td>
                                    </tr>
                                    @php
                                        $grand_total += $list->total_harga;
                                    @endphp
                                @endforeach
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th></th>
                                    <th></th>
                                    <th></th>
                                    <th></th>
                                    <th>Grand Total</th>
                                    <th><?= 'Rp ' . number_format($grand_total, 0, ',', '.') ?>
                                    </th>
                                    <th></th>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
