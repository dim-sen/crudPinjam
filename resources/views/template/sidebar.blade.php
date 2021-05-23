<div class="main-sidebar">
    <aside id="sidebar-wrapper">
        <div class="sidebar-brand">
            <a href="index.html">Stisla</a>
        </div>
        <div class="sidebar-brand sidebar-brand-sm">
            <a href="index.html">St</a>
        </div>
        <ul class="sidebar-menu">
            <li class="menu-header">Menu</li>
            <li class="nav-item dropdown">
                <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-columns"></i> <span>Anggota</span></a>
                <ul class="dropdown-menu">
                    <li><a class="nav-link" href="{{ route('anggota.index') }}">Data Anggota</a></li>
                </ul>
            </li>
            <li class="nav-item dropdown">
                <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-columns"></i> <span>Buku</span></a>
                <ul class="dropdown-menu">
                    <li><a class="nav-link" href="{{ route('buku.index') }}">Data Buku</a></li>
                </ul>
            </li>
            <li class="nav-item dropdown">
                <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="far fa-square"></i> <span>Peminjaman</span></a>
                <ul class="dropdown-menu">
                    <li><a class="nav-link" href="{{ route('pinjam.index') }}">Data peminjaman</a></li>
                </ul>
            </li>
        </ul>
    </aside>
</div>
