@extends('layouts.adminlist')
@section('title')
    <title>Transaksi Pembelian</title>
@endsection
@section('row')
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">Transaksi Pembelian</h4>
            <div class="row">
                <div class="col-12">
                    @if (session()->has('alert'))
                        <div class="alert alert-success" role="alert">
                            {{ session('alert') }}
                        </div>
                    @endif
                    <div class="table-responsive">
                        <div class="text-right mb-2">
                            <a href="{{ url('pembelian/add') }}"><button type="button"
                                    class="btn btn-primary btn-rounded btn-fw"><i class="mdi mdi-plus btn-icon-prepend"></i>
                                    Tambah Transaksi Pembelian</button></a>
                        </div>
                        <table id="order-listing" class="table">
                            <thead>
                                <tr>
                                    <th>Kode Transaksi</th>
                                    <th>Nama Barang</th>
                                    <th>Nama Supplier</th>
                                    <th>Qty</th>
                                    <th>Tanggal Transaksi</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                {{-- @dump($lists) --}}
                                @foreach ($lists as $list)
                                    <tr>
                                        <td>{{ $list->kode_tr_pembelian }}</td>
                                        <td>{{ $list->barangs->nama_barang }}</td>
                                        <td>{{ $list->suppliers->nama_supplier }}</td>
                                        <td>{{ $list->qty_pembelian }}</td>
                                        <td>{{ $list->created_at }}</td>
                                        <td>
                                            <form action="{{ url('pembelian/delete/' . $list->id) }}" method="post"
                                                class="d-inline">
                                                @method('delete')
                                                @csrf
                                                <input type="hidden" name="id_barangs" value="{{ $list->barangs->id }}">
                                                <input type="hidden" name="qty_pembelian"
                                                    value="{{ $list->qty_pembelian }}">
                                                <button class="btn btn-outline-danger"
                                                    onclick="return confirm('Yakin Ingin Menghapus ?');"><i
                                                        class="mdi mdi-delete"></i></button>
                                            </form>

                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection
