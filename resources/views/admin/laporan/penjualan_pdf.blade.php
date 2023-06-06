<html>

<head>
    <title></title>
    <style>
        * {
            margin-right: 15px;
            margin-left: 7px;
            padding: 0;
        }

        body {
            font-family: arial narrow;
            font-size: 14px;
        }

        .tdrh {
            border: 1px solid #000000;
            font-weight: bold;
            text-align: center;
        }

        .tdrh0 {
            border: 1px solid #5A5A5A;
            text-align: center;
            font-size: 10px;
            padding-left: 2px;
            padding-right: 2px;
        }

        .tdrc1 {
            border: 1px solid #5A5A5A;
            padding-left: 5px;
            padding-right: 5px;
            text-align: center;
        }

        .tdrc2 {
            border: 1px solid #ddd;
            width: 100%;
            padding-left: 5px;
            padding-right: 5px;
        }

        img {
            padding: 0 0 0 15%;
            width: 6%;
            position: fixed;
        }
    </style>
</head>

<body>
    <center>
        <font size="4"><b>LAPORAN TRANSAKSI PENJUALAN FOTOKOPI 28 JAYA</b>
    </center>
    </font>
    <table>
        <tr>
            <td>
                <b>Periode : {{ $tanggal_awal }} -
                    {{ $tanggal_akhir }}</b> <br>
            </td>
        </tr>
    </table>
    <br>
    <table width="100%" cellspacing="0" cellpadding="0" align="center">
        <thead>
            <tr>
                <td class="tdrh">Tanggal Transaksi</td>
                <td class="tdrh">Kode Transaksi</td>
                <td class="tdrh">Kode Barang</td>
                <td class="tdrh">Nama Barang</td>
                <td class="tdrh">Harga Barang</td>
                <td class="tdrh">Qty</td>
                <td class="tdrh">Subtotal</td>
            </tr>
        </thead>
        <tbody>
            @php
                $grand_total = 0;
            @endphp
            @foreach ($tr_penjualan as $tr_penjualan)
                <tr>
                    <td class="tdrc1">{{ $tr_penjualan->created_at }}</td>
                    <td class="tdrc1">{{ $tr_penjualan->kode_tr_penjualan }}</td>
                    <td class="tdrc1">{{ $tr_penjualan->barangs->kode_barang }}</td>
                    <td class="tdrc1">{{ $tr_penjualan->barangs->nama_barang }}</td>
                    <td class="tdrc1">{{ 'Rp ' . number_format($tr_penjualan->barangs->harga_barang, 0, ',', '.') }}
                    </td>
                    <td class="tdrc1">{{ $tr_penjualan->qty_jual }}</td>
                    <td class="tdrc1">{{ 'Rp ' . number_format($tr_penjualan->total_harga, 0, ',', '.') }}
                    </td>
                </tr>
                @php
                    $grand_total += $tr_penjualan->total_harga;
                @endphp
            @endforeach
        </tbody>
        <tfoot>
            <th></th>
            <th></th>
            <th></th>
            <th></th>
            <th></th>
            <th>Grand Total</th>
            <th><?= 'Rp ' . number_format($grand_total, 0, ',', '.') ?></th>
        </tfoot>
    </table>
    </table>
</body>

</html>
