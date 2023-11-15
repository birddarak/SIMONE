<div class="container-fluid">
    <div class="row mb-4">
        <div class="col-12 col-md-3">
            <select class="form-control" wire:model='tahun_anggaran' wire:change='index()'>
                @for ($i = 2019; $i <= date('Y'); $i++)
                    <option value="{{ $i }}">
                        {{ $i }}
                    </option>
                @endfor
            </select>
        </div>
        <div class="col-12 col-md-3">
            <select class="form-control" wire:model='apbd' wire:change='index()'>
                <option value="murni">MURNI</option>
                <option value="perubahan">PERUBAHAN</option>
            </select>
        </div>
    </div>

    <div class="row clearfix">
        <div class="col-lg-4 col-md-6 col-sm-12">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center">
                        <div class="state">
                            <h6>Jumlah Program</h6>
                            <h2>{{ $total_program }}</h2>
                        </div>
                        <div class="icon">
                            <i class="ik ik-flag"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-4 col-md-6 col-sm-12">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center">
                        <div class="state">
                            <h6>Jumlah Kegiatan</h6>
                            <h2>{{ $total_kegiatan }}</h2>
                        </div>
                        <div class="icon">
                            <i class="ik ik-flag"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-4 col-md-6 col-sm-12">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center">
                        <div class="state">
                            <h6>Jumlah Sub Kegiatan</h6>
                            <h2>{{ $total_subkegiatan }}</h2>
                        </div>
                        <div class="icon">
                            <i class="ik ik-flag"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row clearfix">
        <div class="col-12 col-md-6">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center">
                        <div class="state">
                            <h6>Total Pagu Keseluruhan</h6>
                            <h2>@currency($total_pagu)</h2>
                        </div>
                        <div class="icon">
                            <i class="ik ik-shopping-cart"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-12 col-md-6">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center">
                        <div class="state">
                            @php
                                $total_terserap = 0;
                                foreach ($progs as $prog) {
                                    foreach ($prog->kegiatan as $kegiatan) {
                                        foreach ($kegiatan->subkegiatan as $subkegiatan) {
                                            foreach ($subkegiatan->realisasi_subkegiatan as $realisasi_subkegiatan) {
                                                $total_terserap += $realisasi_subkegiatan->pagu;
                                            }
                                        }
                                    }
                                }
                            @endphp
                            <h6>Total Pagu Terserap</h6>
                            <h2>@currency($total_terserap)</h2>
                        </div>
                        <div class="icon">
                            <i class="ik ik-shopping-cart"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
