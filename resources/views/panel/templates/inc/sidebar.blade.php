<div class="sidebar-content">
    <div class="nav-container">
        <nav id="main-menu-navigation" class="navigation-main">
            <div class="nav-lavel">Navigation</div>
            <div class="nav-item {{ Route::currentRouteName() == 'dashboard' ? 'active' : '' }}">
                <a href="{{ route('dashboard') }}"><i class="ik ik-bar-chart-2"></i><span>Dashboard</span></a>
            </div>
            <div class="nav-item {{ Route::currentRouteName() == 'laporan' ? 'active' : '' }}">
                <a href="{{ route('laporan') }}"><i class="ik ik-printer"></i><span>Monev</span></a>
            </div>

            <div class="nav-lavel">Perencanaan</div>
            <div
                class="nav-item {{ in_array(Route::currentRouteName(), ['dpa.index', 'dpa.kegiatan', 'dpa.subkegiatan']) ? 'active' : '' }}">
                <a href="{{ route('dpa.index') }}"><i class="ik ik-book"></i><span>DPA</span></a>
            </div>
            <div
                class="nav-item {{ in_array(Route::currentRouteName(), ['realisasi.index', 'realisasi.kegiatan', 'realisasi.subkegiatan', 'realisasi.rincian-belanja']) ? 'active' : '' }}">
                <a href="{{ route('realisasi.index') }}"><i class="ik ik-book-open"></i><span>Realisasi</span></a>
            </div>
            @if (auth()->user()->rule == 'admin')
                <div class="nav-lavel">Master Data</div>
                <div
                    class="nav-item {{ in_array(Route::currentRouteName(), ['pegawai.index', 'pegawai.create', 'pegawai.edit']) ? 'active' : '' }}">
                    <a href="{{ route('pegawai.index') }}"><i class="ik ik-users"></i><span>Pegawai</span></a>
                </div>
            @endif
        </nav>
    </div>
</div>
