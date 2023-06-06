<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    {{-- <title>{{ $details->kode_tr_penjualan }}</title> --}}

    <style>
        html,
        body {
            font-family: "Calibri";
            margin: 0;
            padding: 0;
            font-weight: bold;
            margin-left: 10px;
            font-size: 14px;
        }

        .main-content {
            justify-content: center;
            margin: 0;
            padding: 0;
            width: 755px;
            height: 529px;
            /*margin-top: -1.5%;*/
            /* background-color: salmon; */
        }

        .title-head {
            margin-bottom: -20px;
        }

        p {
            margin-top: 10px;
            margin-bottom: -1%;
        }

        .hr-1 {
            border-top: 3px double #000;
        }

        .hr-2 {
            border-top: 2px solid #000;
        }

        .profile-content {
            margin-top: -5px;
        }

        .content {
            margin-top: -2%;
        }

        .title-content {
            text-align: center;
        }

        .table-header {
            margin-top: 1%;
        }

        .table-header thead tr th {
            border: 1px solid;
            border-left: 0px solid;
            border-right: 0px solid;
        }

        .table-header tfoot tr th {
            border-top: 1px solid;
            border-left: 0px solid;
            border-right: 0px solid;
        }

        .table-header,
        .table-content,
        .footer {
            text-align: center;
        }

        .ttd {
            margin-top: 3px;
            display: flex;
            justify-content: right;
        }
    </style>
</head>

<body>
    <div class="main-content">
        <div class="header">
            <div class="title-head">
                <h3>FOTOKOPI 28 JAYA</h3>
            </div>
            <div class="desc">
                <p class="alamat" style="margin-top:3%;">Jln. Ir. H. Juanda No. 17, Sarimulya, Kec. Kota baru, Karawang,
                    Jawa Barat 41374</p>
            </div>
        </div>

        <hr class="hr-1">

        <div class="content">
            <div class="title-content">
                <h4><u>KWITANSI PEMBAYARAN</u></h4>
            </div>
            <div class="profile-content">
                <table cellpadding="0" cellspacing="0">
                    <tr>
                        <td style="width:25%;">Kode Transaksi Penjualan</td>
                        <td> : {{ $details[0]->kode_tr_penjualan }}</td>
                    </tr>
                    <tr>
                        <td style="width:25%;">Tanggal Transaksi</td>
                        <td> : {{ $details[0]->created_at }}</td>
                    </tr>
                </table>
            </div>

            <div class="table-header">
                <table cellpadding="0" cellspacing="0" style="width: 100%;">

                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Kode Barang</th>
                            <th>Nama Barang</th>
                            <th>Harga Satuan</th>
                            <th>Qty</th>
                            <th>Sub Total</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                            $grand_total = 0;
                        @endphp
                        @foreach ($lists as $list_cart)
                            <tr>
                                <td>
                                    {{ $loop->iteration }}
                                </td>
                                <td>
                                    {{ $list_cart->barangs->kode_barang }}
                                </td>
                                <td>
                                    {{ $list_cart->barangs->nama_barang }}
                                </td>
                                <td>
                                    {{ 'Rp ' . number_format($list_cart->barangs->harga_barang, 0, ',', '.') }}
                                </td>
                                <td>
                                    {{ $list_cart->qty_jual }}
                                </td>
                                <td>
                                    {{ 'Rp ' . number_format($list_cart->total_harga, 0, ',', '.') }}
                                </td>
                            </tr>
                            @php
                                $grand_total += $list_cart->total_harga;
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
                            <th>{{ 'Rp ' . number_format($grand_total, 0, ',', '.') }}</th>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>

        <div class="ttd">
            <div class="tanggal">
                <p><b>Cikampek, <?= date('d F Y') ?> </b></p>
                <p style="text-align: center; margin-top:-1%;">Accounting</p>

                <br>

                <h5>________________________________</h5>
            </div>
        </div>
    </div>
</body>
<script></script>

</html>
