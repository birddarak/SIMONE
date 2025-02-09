<div class="modal fade apps-modal" id="appsModal" tabindex="-1" role="dialog" aria-labelledby="appsModalLabel"
    aria-hidden="true" data-backdrop="false">
    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><i class="ik ik-x-circle"></i></button>
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="quick-search">
                <div class="container">
                    <div class="row">
                        <div class="col-md-4 ml-auto mr-auto">
                            <div class="input-wrap">
                                <input type="text" id="quick-search" class="form-control" placeholder="Search..." />
                                <i class="ik ik-search"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-body d-flex align-items-center">
                <div class="container">
                    <div class="apps-wrap">
                        <div class="app-item">
                            <a href="{{ route('dashboard') }}"><i
                                    class="ik ik-bar-chart-2"></i><span>Dashboard</span></a>
                        </div>
                        @if (auth()->user()->rule != 'non-admin')
                        {{-- <div class="app-item">
                            <a href="{{ route('laporan') }}"><i class="ik ik-printer"></i><span>Monev</span></a>
                        </div> --}}
                        <div class="app-item">
                            <a href="{{ route('dpa.program', ['tahun_anggaran' => date('Y'), 'apbd' => 'murni']) }}"><i
                                    class="ik ik-book"></i><span>DPA</span></a>
                        </div>
                        <div class="app-item">
                            <a href="{{ route('realisasi.program', ['tahun_anggaran' => date('Y'), 'apbd' => 'murni']) }}"><i
                                    class="ik ik-book-open"></i><span>Realisasi</span></a>
                        </div>
                        @endif
                        @if (auth()->user()->rule == 'admin')
                        <div class="app-item">
                            <a href="{{ route('pegawai.index') }}"><i class="ik ik-users"></i><span>Pegawai</span></a>
                        </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>