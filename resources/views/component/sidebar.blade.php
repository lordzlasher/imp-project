<!-- Sidebar -->
<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{ route('dashboard') }}">
        <div class="sidebar-brand-icon rotate-n-15">
            <i class="fas fa-laugh-wink"></i>
        </div>
        <div class="sidebar-brand-text mx-3">IMP</div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item {{ request()->is('dashboard') ? 'active' : '' }}">
        <a class="nav-link" href="{{ route('dashboard') }}">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">
        Menu
    </div>

    <!-- Nav Item - Event -->
    <li class="nav-item {{ request()->is('event') ? 'active' : '' }}">
        <a class="nav-link" href="{{ route('event.index') }}">
            <i class="fas fa-fw fa-briefcase"></i>
            <span>Event</span></a>
    </li>

    <!-- Nav Item - Inventory -->
    <li class="nav-item {{ request()->is('inventory') ? 'active' : '' }}">
        <a class="nav-link" href="{{ route('inventory.index') }}">
            <i class="fas fa-fw fa-archive"></i>
            <span>Inventory</span></a>
    </li>

    <!-- Nav Item - Karyawan -->
    <li class="nav-item {{ request()->is('karyawan') ? 'active' : '' }}">
        <a class="nav-link" href="{{ route('karyawan.index') }}">
            <i class="fas fa-fw fa-users"></i>
            <span>Karyawan</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

</ul>
<!-- End of Sidebar -->
