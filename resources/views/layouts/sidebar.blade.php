<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
        <div class="sidebar-brand-icon rotate-n-15">
            <i class="fas fa-laugh-wink"></i>
        </div>
        <div class="sidebar-brand-text mx-3">SB Admin <sup>2</sup></div>
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
    @endif

    @if (Auth::user()->role_id == 4)
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
    @endif


    <!-- Divider -->
    {{-- <hr class="sidebar-divider"> --}}
    <hr class="sidebar-divider d-none d-md-block">

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

</ul>