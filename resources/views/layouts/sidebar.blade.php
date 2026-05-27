<!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="">
                
                <div class="sidebar-brand-text mx-3">Digital PECS</div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item {{ request()->is('home') ? 'active' : '' }}">
                <a class="nav-link" href="{{ 'home' }}">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Dashboard</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading">
                Master
            </div>
            <li class="nav-item  {{ request()->is('master-users') ? 'active' : '' }}">
                <a class="nav-link" href="{{'master-users'}}">
                    <i class="fas fa-fw fa-user"></i>
                    <span>Users</span></a>
            </li>
            <li class="nav-item  {{ request()->is('master-anak') ? 'active' : '' }}">
                <a class="nav-link" href="{{'master-anak'}}">
                    <i class="fas fa-fw fa-user"></i>
                    <span>Anak</span></a>
            </li>
            <li class="nav-item  {{ request()->is('master-guru') ? 'active' : '' }}">
                <a class="nav-link" href="{{'master-guru'}}">
                    <i class="fas fa-fw fa-user"></i>
                    <span>Guru</span></a>
            </li>
            <!-- Divider -->
            <hr class="sidebar-divider ">
            <!-- Heading -->
            <div class="sidebar-heading">
                Pengaturan
            </div>
            
            <li class="nav-item">

                <a class="nav-link"
                href="#"
                data-bs-toggle="modal"
                data-bs-target="#logoutModal">

                    <i class="fas fa-fw fa-sign-out-alt"></i>
                    <span>Logout</span>

                </a>

            </li>
            

        </ul>
        <!-- End of Sidebar -->