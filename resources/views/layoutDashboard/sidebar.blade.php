<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">
    <!-- Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="#">
        <div class="sidebar-brand-icon rotate-n-15">
            <i class="fas fa-birthday-cake"></i>
        </div>
        <div class="sidebar-brand-text mx-3">
            {{ ucfirst(auth()->user()->role) }}
        </div>
    </a>

    <hr class="sidebar-divider my-0">

    <!-- Dashboard -->
    <li class="nav-item">
        <a class="nav-link"
            href="
            @if (auth()->user()->role === 'admin') {{ route('adminlihatproduk') }}
            @elseif(auth()->user()->role === 'penjual')
                {{ route('lihatprodukku') }}
            @elseif(auth()->user()->role === 'pembeli')
                {{ route('dashboardpembeli') }}
            @else # @endif">
            <i class="fas fa-fw fa-home"></i>
            <span>Beranda</span>

        </a>
    </li>

    <hr class="sidebar-divider">

    {{-- ================= ADMIN ================= --}}
    @if (auth()->user()->role === 'admin')
        <div class="sidebar-heading">Kelola Data</div>

        <li class="nav-item">
            <a class="nav-link" href="{{ route('adminlihatproduk') }}">
                <i class="fas fa-birthday-cake text-pink-200"></i>
                <span>Daftar Kue</span>
            </a>
        </li>

        <li class="nav-item">
            <a class="nav-link" href="{{ route('adminlihatuser') }}">
                <i class="fas fa-user-friends text-pink-200"></i>
                <span>Pelanggan</span>
            </a>
        </li>

        <li class="nav-item">
            <a class="nav-link" href="{{ route('lihatpesanan') }}">
                <i class="fas fa-shopping-basket text-pink-200"></i>
                <span>Pesanan Masuk</span>
            </a>
        </li>


        {{-- ================= PENJUAL ================= --}}
    @elseif(auth()->user()->role === 'penjual')
        <div class="sidebar-heading">Dapur Kue</div>

        <li class="nav-item">
            <a class="nav-link" href="{{ route('tambahproduk') }}">
                <i class="fas fa-plus-circle"></i>
                <span>Tambah Kue</span>
            </a>
        </li>

        <li class="nav-item">
            <a class="nav-link" href="{{ route('lihatprodukku') }}">
                <i class="fas fa-birthday-cake"></i>
                <span>Kue Saya</span>
            </a>
        </li>

        <div class="sidebar-heading">Pesanan & Kirim</div>

        <li class="nav-item">
            <a class="nav-link" href="{{ route('penjual.pesanan') }}">
                <i class="fas fa-clipboard-list"></i>
                <span>Pesanan Masuk</span>
            </a>
        </li>

        <li class="nav-item">
            <a class="nav-link" href="{{ route('penjual.kurir.index') }}">
                <i class="fas fa-truck"></i>
                <span>Data Kurir</span>
            </a>
        </li>

        {{-- ================= PEMBELI ================= --}}
    @elseif(auth()->user()->role === 'pembeli')
        <div class="sidebar-heading">Pembeli</div>

        <li class="nav-item">
            <a class="nav-link" href="{{ route('pembeli.produk') }}">
                <i class="fas fa-store"></i>
                <span>Lihat Kue</span>
            </a>
        </li>

        <li class="nav-item">
            <a class="nav-link" href="{{ route('keranjang.index') }}">
                <i class="fas fa-shopping-cart"></i>
                <span>Keranjang</span>
            </a>
        </li>

        <li class="nav-item">
            <a class="nav-link" href="{{ route('pembeli.biodata') }}">
                <i class="fas fa-user"></i>
                <span>Biodata</span>
            </a>
        </li>
    @endif

    <hr class="sidebar-divider d-none d-md-block">

    <!-- Sidebar Toggler -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>
</ul>
