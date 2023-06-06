@extends('layouts.adminlist')
@section('title')
    <title>Transaksi Penjualan</title>
@endsection
@section('row')
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">Transaksi Penjualan</h4>
            <div class="row">
                <div class="col-12">
                    @if (session()->has('alert'))
                        <div class="alert alert-success" role="alert">
                            {{ session('alert') }}
                        </div>
                    @endif
                    <div class="table-responsive">
                        <div class="text-right mb-2">
                            <a href="{{ url('penjualan/kasir') }}"><button type="button"
                                    class="btn btn-primary btn-rounded btn-fw"><i class="mdi mdi-cart"></i>
                                    Kasir</button></a>
                        </div>
                        <table id="order-listing" class="table">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Tanggal Transaksi</th>
                                    <th>Kode Transaksi</th>
                                    <th>Grand Total</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                {{-- @dump($lists) --}}
                                @foreach ($lists as $list)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $list->created_at }}</td>
                                        <td>{{ $list->kode_tr_penjualan }}</td>
                                        <td>{{ $list->grand_total }}</td>
                                        <td>
                                            <a target="_blank"
                                                href="{{ url('penjualan/print/' . $list->kode_tr_penjualan . '') }}"
                                                class="btn btn-outline-info"><i class="mdi mdi-printer"></i></a>
                                            {{-- <form action="{{ url('penjualan/delete/' . $list->id) }}" method="post"
                                                class="d-inline">
                                                @method('delete')
                                                @csrf
                                                <button class="btn btn-outline-danger"
                                                    onclick="return confirm('Yakin Ingin Menghapus ?');"><i
                                                        class="mdi mdi-delete"></i></button>
                                            </form> --}}

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
