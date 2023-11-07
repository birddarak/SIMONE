<div class="sidebar-content">
    <div class="nav-container">
        <nav id="main-menu-navigation" class="navigation-main">
            <div class="nav-lavel">Navigation</div>
            <div class="nav-item {{ Route::currentRouteName() == 'dashboard' ? 'active' : '' }}">
                <a href="{{ route('dashboard') }}"><i class="ik ik-bar-chart-2"></i><span>Dashboard</span></a>
            </div>

            <div class="nav-lavel">Perencanaan</div>
            <div class="nav-item {{ in_array(Route::currentRouteName(), ['dpa.index']) ? 'active' : '' }}">
                <a href="{{ route('dpa.index') }}"><i class="ik ik-book"></i><span>DPA</span></a>
            </div>
            <div class="nav-lavel">Master Data</div>
            <div
                class="nav-item {{ in_array(Route::currentRouteName(), ['pegawai.index', 'pegawai.create', 'pegawai.edit']) ? 'active' : '' }}">
                <a href="{{ route('pegawai.index') }}"><i class="ik ik-users"></i><span>Pegawai</span></a>
            </div>
            <div
                class="nav-item {{ in_array(Route::currentRouteName(), ['user.index', 'user.create', 'user.edit']) ? 'active' : '' }}">
                <a href="{{ route('user.index') }}"><i class="ik ik-user"></i><span>User</span></a>
            </div>
            <div
            class="nav-item">
            <a href="#"><i class="ik ik-printer"></i><span>Laporan</span></a>
        </div>
        </nav>
    </div>
</div>
