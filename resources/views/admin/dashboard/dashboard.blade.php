@extends('layouts.admin')
@section('title')
    <title>Dashboard</title>
@endsection
@section('row')
    <div class="row">
        <div class="col-md-6 col-lg-3 grid-margin stretch-card">
            <div class="card bg-gradient-primary text-white text-center card-shadow-primary">
                <div class="card-body">
                    <h6 class="font-weight-normal">Total Barang</h6>
                    <h2 class="mb-0">{{ $data['totalbarang'] }}</h2>
                </div>
            </div>
        </div>

        <div class="col-md-6 col-lg-3 grid-margin stretch-card">
            <div class="card bg-gradient-danger text-white text-center card-shadow-danger">
                <div class="card-body">
                    <h6 class="font-weight-normal">Total Supplier</h6>
                    <h2 class="mb-0">{{ $data['totalsupplier'] }}</h2>
                </div>
            </div>
        </div>

        <div class="col-md-6 col-lg-3 grid-margin stretch-card">
            <div class="card bg-gradient-success text-white text-center card-shadow-success">
                <div class="card-body">
                    <h6 class="font-weight-normal">Total Pembelian</h6>
                    <h2 class="mb-0">{{ $data['totalpembelian'] }}</h2>
                </div>
            </div>
        </div>

        <div class="col-md-6 col-lg-3 grid-margin stretch-card">
            <div class="card bg-gradient-warning text-white text-center card-shadow-warning">
                <div class="card-body">
                    <h6 class="font-weight-normal">Total Penjualan</h6>
                    <h2 class="mb-0">{{ $data['totalpenjualan'] }}</h2>
                </div>
            </div>
        </div>

    </div>
@endsection
