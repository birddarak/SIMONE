<div class="sidebar-content">
    <div class="nav-container">
        <nav id="main-menu-navigation" class="navigation-main">
            <div class="nav-lavel">Navigation</div>
            <div class="nav-item {{ Route::currentRouteName() == 'home' ? 'active' : '' }}">
                <a href="{{ route('home') }}"><i class="ik ik-bar-chart-2"></i><span>Dashboard</span></a>
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
        </nav>
    </div>
</div>
