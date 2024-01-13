<div class="sidebar-content">
    <div class="nav-container">
        <nav id="main-menu-navigation" class="navigation-main">
            <div class="nav-lavel">Navigasi</div>
            <div class="nav-item {{ Route::currentRouteName() == 'dashboard' ? 'active' : '' }}">
                <a href="{{ route('dashboard') }}"><i class="ik ik-bar-chart-2"></i><span>Dashboard</span></a>
            </div>
            @if (auth()->user()->rule != 'non-admin')
            <div class="nav-item {{ Route::currentRouteName() == 'laporan' ? 'active' : '' }}">
                <a href="{{ route('laporan') }}"><i class="ik ik-printer"></i><span>Monev</span></a>
            </div>
            <div class="nav-lavel">Perencanaan</div>
            @if (auth()->user()->rule != 'kabid')
            <div
                class="nav-item {{ in_array(Route::currentRouteName(), ['dpa.program', 'dpa.kegiatan', 'dpa.subkegiatan']) ? 'active' : '' }}">
                <a href="{{ route('dpa.program', ['tahun_anggaran' => date('Y'), 'apbd' => 'murni']) }}"><i
                        class="ik ik-book"></i><span>DPA</span></a>
            </div>
            @endif
            <div
                class="nav-item {{ in_array(Route::currentRouteName(), ['realisasi.program', 'realisasi.kegiatan', 'realisasi.subkegiatan', 'realisasi.rincian-belanja']) ? 'active' : '' }}">
                <a href="{{ route('realisasi.program', ['tahun_anggaran' => date('Y'), 'apbd' => 'murni']) }}"><i class="ik ik-book-open"></i><span>Realisasi</span></a>
            </div>
            @if (auth()->user()->rule == 'admin')
            <div class="nav-lavel">Master Data</div>
            <div
                class="nav-item {{ in_array(Route::currentRouteName(), ['pegawai.index', 'pegawai.create', 'pegawai.edit']) ? 'active' : '' }}">
                <a href="{{ route('pegawai.index') }}"><i class="ik ik-users"></i><span>Pegawai</span></a>
            </div>
            @endif
            @endif
        </nav>
    </div>
</div>