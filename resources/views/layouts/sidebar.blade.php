<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="/home">
        <div class="sidebar-brand-icon rotate-n-15">
            <i class="fas fa-laugh-wink"></i>
        </div>
        <div class="sidebar-brand-text mx-3">HRIS</div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    @if (Auth::user()->role_id == 2)
        <li class="nav-item {{Request::is('home*') ? 'active' : ''}}">
            <a class="nav-link" href="/home">
                <i class="fas fa-home"></i>
                <span>Dashboard</span></a>
        </li>
        <li class="nav-item {{Request::is('jurnal*') ? 'active' : ''}}">
            <a class="nav-link" href="/jurnal">
                <i class="fas fa-clipboard"></i>
                <span>Jurnal Harian</span></a>
        </li>
        <li class="nav-item {{Request::is('karyawan*') ? 'active' : ''}}">
            <a class="nav-link" href="/karyawan">
                <i class="fas fa-user-tie"></i>
                <span>Jumlah Karyawan</span></a>
        </li>
        <li class="nav-item {{Request::is('cuti*') ? 'active' : ''}}">
            <a class="nav-link" href="/cuti">
                <i class="fas fa-calendar"></i>
                <span>Pengajuan Cuti</span></a>
        </li>
        <li class="nav-item {{Request::is('tugas*') ? 'active' : ''}}">
            <a class="nav-link" href="/tugas">
                <i class="fas fa-clipboard-check"></i>
                <span>Pembagian Tugas</span></a>
        </li>
        <li class="nav-item {{Request::is('divisi*') ? 'active' : ''}}">
            <a class="nav-link" href="/divisi">
                <i class="fas fa-users"></i>
                <span>Kelola Divisi</span></a>
        </li>
        <li class="nav-item {{Request::is('gaji*') ? 'active' : ''}}">
            <a class="nav-link" href="/gaji">
                <i class="fas fa-money-bill-wave"></i>
                <span>Kelola Gaji Karyawan</span></a>
        </li>
    @elseif (Auth::user()->role_id == 1)
        <li class="nav-item {{Request::is('home*') ? 'active' : ''}}">
            <a class="nav-link" href="/homes">
                <i class="fas fa-home"></i>
                <span>Dashboard</span></a>
        </li>
        <li class="nav-item {{Request::is('users*') ? 'active' : ''}}">
            <a class="nav-link" href="/users">
                <i class="fas fa-users-cog"></i>
                <span>Kelola Users</span>
            </a>
        </li>
        <li class="nav-item {{Request::is('kelola/gaji*') ? 'active' : ''}}">
            <a class="nav-link" href="/kelola/gaji">
                <i class="fas fa-money-bill-wave"></i>  
                <span>Kelola Gaji Karyawan</span>
            </a>
        </li>
        <li class="nav-item {{Request::is('pantau*') ? 'active' : ''}}">
            <a class="nav-link" href="/pantau/jurnal">
                <i class="fas fa-book"></i>
                <span>Pantau Jurnal Karyawan</span>
            </a>
        </li>
        <li class="nav-item {{Request::is('kelola/tugas/karyawan*') ? 'active' : ''}}">
            <a class="nav-link" href="/kelola/tugas/karyawan">
                <i class="fas fa-clipboard-list"></i>
                <span>Pembagian Tugas Karyawan</span>
            </a>
        </li>
        <li class="nav-item {{Request::is('kelola/tugas/divisi*') ? 'active' : ''}}">
            <a class="nav-link" href="/kelola/tugas/divisi">
                <i class="fas fa-clipboard-list"></i>
                <span>Pembagian Tugas Divisi</span>
            </a>
        </li>
        <li class="nav-item {{Request::is('kelola/divisi*') ? 'active' : ''}}">
            <a class="nav-link" href="/kelola/divisi">
                <i class="fas fa-users"></i>
                <span>Kelola Divisi</span></a>
        </li>
        <li class="nav-item {{Request::is('kelola/cuti*') ? 'active' : ''}}">
            <a class="nav-link" href="/kelola/cuti">
                <i class="fas fa-calendar"></i>
                <span>Pengajuan Cuti</span>
            </a>
        </li>
        <li class="nav-item {{Request::is('kelola/karyawan*') ? 'active' : ''}}">
            <a class="nav-link" href="/kelola/karyawan">
                <i class="fas fa-user-tie"></i>
                <span>Jumlah Karyawan</span>
            </a>
        </li>
    @elseif (Auth::user()->role_id == 4)
        <li class="nav-item {{Request::is('home*') ? 'active' : ''}}">
            <a class="nav-link" href="/home">
                <i class="fas fa-home"></i>
                <span>Dashboard</span></a>
        </li>
        <li class="nav-item {{Request::is('jurnal*') ? 'active' : ''}}">
            <a class="nav-link" href="/jurnal">
                <i class="fas fa-clipboard"></i>
                <span>Jurnal Harian</span></a>
        </li>
        <li class="nav-item {{Request::is('pengcuti*') ? 'active' : ''}}">
            <a class="nav-link" href="/pengcuti">
                <i class="fas fa-calendar"></i>
                <span>Pengajuan Cuti</span></a>
        </li>
        <li class="nav-item {{Request::is('tugas*') ? 'active' : ''}}">
            <a class="nav-link" href="/tugass">
                <i class="fas fa-clipboard-check"></i>
                <span>Tugas Individu</span></a>
        </li>
        <li class="nav-item {{Request::is('divition/tugas*') ? 'active' : ''}}">
            <a class="nav-link" href="divition/tugas">
                <i class="fas fa-users"></i>
                <span>Tugas Divisi</span>
            </a>
        </li>
        <li class="nav-item {{Request::is('anggota/divisi*') ? 'active' : ''}}">
            <a class="nav-link" href="/anggota/divisi/tugas">
                <i class="fas fa-users"></i>
                <span>Bagi Tugas Anggota Divisi</span></a>
        </li>
    @endif


    <!-- Divider -->
    {{-- <hr class="sidebar-divider"> --}}
    <hr class="sidebar-divider d-none d-md-block">

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

</ul>
