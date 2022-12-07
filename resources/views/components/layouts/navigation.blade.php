<div>
    <ul class="menu-inner py-1">
            <!-- Dashboard -->
            @role(['Admin','Pelanggan'])
            <li class="menu-item active">
              <a href="{{route('dashboard')}}" class="menu-link">
                <i class="menu-icon tf-icons bx bx-home-circle"></i>
                <div>Dashboard</div>
              </a>
            </li>
            @endrole

            @role('Admin')
            <li class="menu-header small text-uppercase">
              <span class="menu-header-text">Management</span>
            </li>
            <li class="menu-item">
              <a href="javascript:void(0);" class="menu-link menu-toggle">
                <i class="menu-icon tf-icons bx bx-group"></i>
                <div>User</div>
              </a>
              <ul class="menu-sub">
                <li class="menu-item">
                  <a href="{{route('users.index')}}" class="menu-link">
                    <div>Users</div>
                  </a>
                </li>
                <li class="menu-item">
                  <a href="{{route('roles.index')}}" class="menu-link">
                    <div>Roles</div>
                  </a>
                </li>
                <li class="menu-item">
                  <a href="{{route('permissions.index')}}" class="menu-link">
                    <div>Permissions</div>
                  </a>
                </li>
                <li class="menu-item">
                  <a href="{{route('assign-permissions.index')}}" class="menu-link">
                    <div>Assign Permissions</div>
                  </a>
                </li>
                <li class="menu-item">
                  <a href="{{route('assign-users.index')}}" class="menu-link">
                    <div>Assign Users</div>
                  </a>
                </li>
              </ul>
            </li>
            <li class="menu-item">
              <a href="javascript:void(0);" class="menu-link menu-toggle">
                <i class="menu-icon tf-icons bx bx-notepad"></i>
                <div>Blog</div>
              </a>
              <ul class="menu-sub">
                <li class="menu-item">
                  <a href="{{route('articles.index')}}" class="menu-link">
                    <div>Artikel</div>
                  </a>
                </li>
                <li class="menu-item">
                  <a href="{{route('categories.index')}}" class="menu-link">
                    <div>Kategori</div>
                  </a>
                </li>
              </ul>
            </li>
            <li class="menu-item">
              <a href="javascript:void(0);" class="menu-link menu-toggle">
                <i class="menu-icon tf-icons bx bx-coffee"></i>
                <div>Kopi</div>
              </a>
              <ul class="menu-sub">
                <li class="menu-item">
                  <a href="{{route('coffees.index')}}" class="menu-link">
                    <div>Kopi</div>
                  </a>
                </li>
                <li class="menu-item">
                  <a href="{{route('types.index')}}" class="menu-link">
                    <div>Tipe</div>
                  </a>
                </li>
              </ul>
            </li>
            @endrole
            @role(['Admin','Pelanggan','Kasir'])
            <li class="menu-header small text-uppercase"><span class="menu-header-text">Report</span></li>
            <li class="menu-item">
              <a href="{{route('transactions.index')}}" class="menu-link">
                <i class="menu-icon tf-icons bx bx-store"></i>
                <div>Transaksi</div>
              </a>
            </li>
            @endrole
            @role('Admin')
            <li class="menu-item">
              <a href="#" class="menu-link">
                <i class="menu-icon tf-icons bx bx-stats"></i>
                <div>Laporan</div>
              </a>
            </li>
            @endrole
            <li class="menu-header small text-uppercase"><span class="menu-header-text">Profile</span></li>
            <li class="menu-item">
                <a href="{{route('profiles.index')}}" class="menu-link">
                    <i class="menu-icon tf-icons bx bx-user"></i>
                    <div>Profile</div>
                </a>
            </li>
            <li class="menu-item">
                <a href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();" class="menu-link">
                    <i class="menu-icon tf-icons bx bx-door-open"></i>
                    <div>Logout</div>
                </a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                    @csrf
                </form>
            </li>
          </ul>
</div>
