  <!-- Side Nav -->
  <div id="layoutSidenav_nav">
      <nav class="sidenav shadow-right sidenav-light">
          <div class="sidenav-menu">
              <div class="nav accordion" id="accordionSidenav">

                  <!-- Sidenav Menu Heading (Dashboard)-->
                  <div class="sidenav-menu-heading">Dashboard</div>

                  <!-- Sidenav Link (Dashboard)-->
                  <a class="nav-link {{ request()->is('dashboard') ? 'active' : '' }}" href="{{ url('/dashboard') }}">
                      <div class="nav-link-icon"><i data-feather="activity"></i></div>
                      Dashboard
                  </a>

                  <!-- Sidenav Heading (Event)-->
                  <div class="sidenav-menu-heading">Event</div>

                  <!-- Sidenav Link (Event)-->
                  <a class="nav-link {{ request()->is('event*') ? 'active' : '' }}" href="{{ route('event.index') }}">
                      <div class="nav-link-icon"><i data-feather="briefcase"></i></div>
                      Event
                  </a>

                  <!-- Sidenav Heading (Inventory)-->
                  <div class="sidenav-menu-heading">Inventory</div>

                  <!-- Sidenav Link (Inventory Log)-->
                  <a class="nav-link {{ request()->is('inventory-log*') ? 'active' : '' }}"
                      href="{{ route('inventory-log.index') }}">
                      <div class="nav-link-icon"><i data-feather="archive"></i></div>
                      Inventory Log
                  </a>

                  <!-- Sidenav Heading (Master Data)-->
                  <div class="sidenav-menu-heading">Master Data</div>



                  <!-- Sidenav Link (Inventory)-->
                  <a class="nav-link {{ request()->is('inventory*') && !request()->is('inventory-log*') ? 'active' : '' }}"
                      href="{{ route('inventory.index') }}">
                      <div class="nav-link-icon"><i data-feather="box"></i></div>
                      Inventory
                  </a>

                  <!-- Sidenav Link (Karyawan)-->
                  <a class="nav-link {{ request()->is('karyawan*') ? 'active' : '' }}" href="{{ url('/karyawan') }}">
                      <div class="nav-link-icon"><i data-feather="user"></i></div>
                      Karyawan
                  </a>

                  <!-- Sidenav Heading (CRUD)-->
                  <div class="sidenav-menu-heading">CRUD</div>

                  <!-- Sidenav Link (Status Crew)-->
                  <a class="nav-link {{ request()->is('status-crew*') ? 'active' : '' }}"
                      href="{{ url('/status-crew') }}">
                      <div class="nav-link-icon"><i data-feather="plus-square"></i></div>
                      Status Crew
                  </a>

                  <!-- Sidenav Link (Keterangan Crew)-->
                  <a class="nav-link {{ request()->is('keterangan-crew*') ? 'active' : '' }}"
                      href="{{ url('/keterangan-crew') }}">
                      <div class="nav-link-icon"><i data-feather="plus-square"></i></div>
                      Keterangan Crew
                  </a>

                  <!-- Sidenav Link (Kategori Event)-->
                  <a class="nav-link {{ request()->is('kategori-event*') ? 'active' : '' }}"
                      href="{{ url('/kategori-event') }}">
                      <div class="nav-link-icon"><i data-feather="plus-square"></i></div>
                      Kategori Event
                  </a>

                  @if (auth()->check() && auth()->user()->name === 'Admin')
                      <!-- Sidenav Heading (Admin)-->
                      <div class="sidenav-menu-heading">Admin</div>

                      <!-- Sidenav Link (Status Crew)-->
                      <a class="nav-link {{ request()->is('user-management*') ? 'active' : '' }}"
                          href="{{ url('/user-management') }}">
                          <div class="nav-link-icon"><i data-feather="users"></i></div>
                          User Management
                      </a>
                  @endif

              </div>
          </div>
          <!-- Sidenav Footer-->
          <div class="sidenav-footer">
              <div class="sidenav-footer-content">
                  <div class="sidenav-footer-subtitle">Logged in as:</div>
                  <div class="sidenav-footer-title">@auth{{ Auth::user()->name }}@endauth
                  </div>
              </div>
          </div>
      </nav>
  </div>
