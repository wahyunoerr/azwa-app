<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
        <img src="{{ asset('assets-admin/dist/img/AdminLTELogo.png') }}" alt="AdminLTE Logo"
            class="brand-image img-circle elevation-3" style="opacity: 0.8" />
        <span class="brand-text font-weight-light">AdminLTE 3</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="{{ asset('assets-admin/dist/img/user2-160x160.jpg') }}" class="img-circle elevation-2"
                    alt="User Image" />
            </div>
            <div class="info">
                <a href="#" class="d-block">{{ Auth::user()->name }}</a>
            </div>
        </div>

        <!-- SidebarSearch Form -->
        <div class="form-inline">
            <div class="input-group" data-widget="sidebar-search">
                <input class="form-control form-control-sidebar" type="search" placeholder="Search"
                    aria-label="Search" />
                <div class="input-group-append">
                    <button class="btn btn-sidebar">
                        <i class="fas fa-search fa-fw"></i>
                    </button>
                </div>
            </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                data-accordion="false">
                @hasrole('admin')
                    <li class="nav-item">
                        <a href="{{ route('dashboard') }}"
                            class="nav-link {{ request()->is('dashboard') ? 'active' : '' }}">
                            <i class="nav-icon fas fa-tachometer-alt"></i>
                            <p>
                                Dashboard
                            </p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('kategori') }}" class="nav-link {{ request()->is('kategori') ? 'active' : '' }}">
                            <i class="fas fa-sloid fa-list"></i>
                            <p>
                                Categories
                            </p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('produk') }}" class="nav-link {{ request()->is('produk') ? 'active' : '' }}">
                            <i class="fas fa-sloid fa-box"></i>
                            <p>
                                Product
                            </p>
                        </a>
                    </li>
                @endhasrole
                @hasanyrole('admin|supplier')
                    <li class="nav-item">
                        <a href="{{ route('supplier') }}" class="nav-link {{ request()->is('supplier') ? 'active' : '' }}">
                            <i class="fas fa-sloid fa-truck"></i>
                            <p>
                                Supplier
                            </p>
                        </a>
                    </li>
                @endhasanyrole
                @hasrole('user')
                    <li class="nav-item">
                        <a href="{{ route('order') }}" class="nav-link {{ request()->is('pesanan') ? 'active' : '' }}">
                            <i class="fas fa-cart-shopping"></i>
                            <p>
                                Order
                            </p>
                        </a>
                    </li>
                @endhasrole
                @hasanyrole('admin|user')
                    <li class="nav-item">
                        <a href="{{ route('transaksi') }}"
                            class="nav-link {{ request()->is('transaksi') ? 'active' : '' }}">
                            <i class="fas fa-regular fa-money-bill"></i>
                            <p>
                                Transaction
                            </p>
                        </a>
                    </li>
                @endhasanyrole
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
