<nav class="sidebar sidebar-offcanvas" id="sidebar">
    <ul class="nav">
        <li class="nav-item">
            <a class="nav-link" href="{{ url('dashboard') }}">
                <i class="mdi mdi-view-dashboard-outline menu-icon"></i>
                <span class="menu-title">Dashboard</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#master_data" aria-expanded="true"
                aria-controls="master_data">
                <i class="mdi mdi-database menu-icon"></i>
                <span class="menu-title">Master Data</span>
                <i class="menu-arrow"></i>
            </a>
            <div class="collapse hide" id="master_data" style="">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item"> <a class="nav-link" href="{{ url('barang') }}"> Data Barang </a></li>
                    <li class="nav-item"> <a class="nav-link" href="{{ url('supplier') }}"> Data Supplier</a></li>
                    {{-- <li class="nav-item"> <a class="nav-link" href="{{ url('users') }}"> Data Users </a></li> --}}
                </ul>
            </div>
        </li>

        <li class="nav-item">
            <a class="nav-link" href="{{ url('pembelian') }}">
                <i class="mdi mdi-database-plus menu-icon"></i>
                <span class="menu-title">Transaksi Pembelian</span>
            </a>
        </li>

        <li class="nav-item">
            <a class="nav-link" href="{{ url('penjualan') }}">
                <i class="mdi mdi-database-minus menu-icon"></i>
                <span class="menu-title">Transaksi Penjualan</span>
            </a>
        </li>

        <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#laporan" aria-expanded="true" aria-controls="laporan">
                <i class="mdi mdi-file-pdf menu-icon"></i>
                <span class="menu-title">Laporan</span>
                <i class="menu-arrow"></i>
            </a>
            <div class="collapse hide" id="laporan" style="">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item"> <a class="nav-link" href="{{ url('laporan/pembelian') }}">Laporan Pembelian
                        </a></li>
                    <li class="nav-item"> <a class="nav-link" href="{{ url('laporan/penjualan') }}">Laporan
                            Penjualan</a></li>
                </ul>
            </div>
        </li>
    </ul>
</nav>
