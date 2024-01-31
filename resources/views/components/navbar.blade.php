 <!-- Navbar -->
 <nav class="topnav navbar navbar-expand shadow justify-content-between justify-content-sm-start navbar-light bg-white"
     id="sidenavAccordion">
     <!-- Sidenav Toggle Button-->
     <button class="btn btn-icon btn-transparent-dark order-1 order-lg-0 me-2 ms-lg-2 me-lg-0" id="sidebarToggle"><i
             data-feather="menu"></i></button>

     <!-- Navbar Brand-->
     <a class="navbar-brand pe-3 ps-4 ps-lg-1" href="{{ url('dashboard') }}">Indonesia Multimedia Project</a>
     <!-- Navbar Search Input-->
     <form class="form-inline me-auto d-none d-lg-block ps-lg-10">
         <div class="input-group input-group-joined input-group-solid">
             <input class="form-control pe-0" type="search" placeholder="Search" aria-label="Search" />
             <div class="input-group-text"><i data-feather="search"></i></div>
         </div>
     </form>
     <!-- Navbar Items-->
     <ul class="navbar-nav align-items-center ms-auto">
         <!-- Navbar Search Dropdown-->
         <li class="nav-item dropdown no-caret me-3 d-lg-none">
             <a class="btn btn-icon btn-transparent-dark dropdown-toggle" id="searchDropdown" href="#"
                 role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i
                     data-feather="search"></i></a>
             <!-- Dropdown - Search-->
             <div class="dropdown-menu dropdown-menu-end p-3 shadow animated--fade-in-up"
                 aria-labelledby="searchDropdown">
                 <form class="form-inline me-auto w-100">
                     <div class="input-group input-group-joined input-group-solid">
                         <input class="form-control pe-0" type="text" placeholder="Search for..." aria-label="Search"
                             aria-describedby="basic-addon2" />
                         <div class="input-group-text"><i data-feather="search"></i></div>
                     </div>
                 </form>
             </div>
         </li>
         <!-- Alerts Dropdown-->
         <li class="nav-item dropdown no-caret d-none d-sm-block me-3 dropdown-notifications">
             <a class="btn btn-icon btn-transparent-dark dropdown-toggle" id="navbarDropdownAlerts"
                 href="javascript:void(0);" role="button" data-bs-toggle="dropdown" aria-haspopup="true"
                 aria-expanded="false"><i data-feather="bell"></i></a>
             <div class="dropdown-menu dropdown-menu-end border-0 shadow animated--fade-in-up"
                 aria-labelledby="navbarDropdownAlerts">
                 <h6 class="dropdown-header dropdown-notifications-header">
                     <i class="me-2" data-feather="bell"></i>
                     Alerts Center
                 </h6>
                 <!-- Example Alert 1-->
                 <a class="dropdown-item dropdown-notifications-item" href="#!">
                     <div class="dropdown-notifications-item-icon bg-warning"><i data-feather="activity"></i></div>
                     <div class="dropdown-notifications-item-content">
                         <div class="dropdown-notifications-item-content-details">December 29, 2021</div>
                         <div class="dropdown-notifications-item-content-text">This is an alert message. It's nothing
                             serious, but it requires your attention.</div>
                     </div>
                 </a>
                 <a class="dropdown-item dropdown-notifications-footer" href="#!">View All Alerts</a>
             </div>
         </li>

         <!-- User Dropdown-->
         <li class="nav-item dropdown no-caret dropdown-user me-3 me-lg-4">
             <a class="btn btn-icon btn-transparent-dark dropdown-toggle" id="navbarDropdownUserImage"
                 href="javascript:void(0);" role="button" data-bs-toggle="dropdown" aria-haspopup="true"
                 aria-expanded="false"><img class="img-fluid"
                     src="{{ asset('tamplate/assets/img/illustrations/profiles/profile-2.png') }}" /></a>
             <div class="dropdown-menu dropdown-menu-end border-0 shadow animated--fade-in-up"
                 aria-labelledby="navbarDropdownUserImage">
                 <h6 class="dropdown-header d-flex align-items-center">
                     <img class="dropdown-user-img"
                         src="{{ asset('tamplate/assets/img/illustrations/profiles/profile-2.png') }}" />
                     <div class="dropdown-user-details">
                         <div class="dropdown-user-details-name">@auth
                                 {{ Auth::user()->name }}
                             </div>
                             <div class="dropdown-user-details-email">{{ Auth::user()->email }}</div>
                         @endauth
                     </div>
                 </h6>
                 <div class="dropdown-divider"></div>
                 <a class="dropdown-item" href="#!">
                     <div class="dropdown-item-icon"><i data-feather="settings"></i></div>
                     Account
                 </a>
                 <a class="dropdown-item" data-bs-toggle="modal" data-bs-target="#logoutModal">
                     <div class="dropdown-item-icon"><i data-feather="log-out"></i></div>
                     Logout
                 </a>
             </div>
         </li>
     </ul>
 </nav>
