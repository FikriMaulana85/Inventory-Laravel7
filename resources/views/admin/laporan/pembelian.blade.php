@extends('layouts.adminlist')
@section('title')
    <title>Laporan Pembelian</title>
@endsection
@section('row')
    <div class="card">
        <div class="card-header">
            <div class="row">
                <div class="col">
                    <h6 class="card-title">Cetak Laporan Pembelian</h6>
                </div>
            </div>
            <div class="card-body">
                <form id="formlaporan" action="{{ url('laporan/cetak_transaksi_pembelian') }}" method="post">
                    <div class="row">
                        @csrf
                        <div class="col-2 mt-1 ">
                            <span>Periode</span>
                        </div>
                        <div class="col-3">
                            <input type="date" name="tanggal_awal" id="tanggal_awal" class="form-control" required>
                        </div>
                        <div class="col-1 text-center" style="margin:5px -4% 0 -4%;"> <b>-</b> </div>
                        <div class="col-3">
                            <input type="date" name="tanggal_akhir" id="tanggal_akhir" class="form-control" required>
                        </div>
                        <div class="col-3 text-right">
                            <button type="submit" class="btn btn-md btn-primary"><i class="bi bi-printer-fill"></i>
                                Cetak
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    @endsection
