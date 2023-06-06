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
        <font size="4"><b>LAPORAN TRANSAKSI PEMBELIAN FOTOKOPI 28 JAYA</b>
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
                <td class="tdrh">Kode Transaksi</td>
                <td class="tdrh">Nama Barang</td>
                <td class="tdrh">Nama Supplier</td>
                <td class="tdrh">Qty</td>
                <td class="tdrh">Tanggal Transaksi</td>
            </tr>
        </thead>
        <tbody>
            @foreach ($tr_pembelian as $tr_pembelian)
                <tr>
                    <td class="tdrc1">{{ $tr_pembelian->kode_tr_pembelian }}</td>
                    <td class="tdrc1">{{ $tr_pembelian->barangs->nama_barang }}</td>
                    <td class="tdrc1">{{ $tr_pembelian->suppliers->nama_supplier }}</td>
                    <td class="tdrc1">{{ $tr_pembelian->qty_pembelian }}</td>
                    <td class="tdrc1">{{ $tr_pembelian->created_at }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>

</html>
