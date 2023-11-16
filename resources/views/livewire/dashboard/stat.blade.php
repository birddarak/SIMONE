<div class="container-fluid">
    <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
    <div class="row mb-4">
        <div class="col-12 col-md-3">
            <select class="form-control" wire:model.live='tahun_anggaran'  >
                @for ($i = 2019; $i <= date('Y'); $i++)
                    <option value="{{ $i }}">
                        {{ $i }}
                    </option>
                @endfor
            </select>
        </div>
        <div class="col-12 col-md-3">
            <select class="form-control" wire:model.live='apbd' >
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
                            <h6>Total Pagu Terserap</h6>
                            <h2>@currency($pagu_terserap)</h2>
                        </div>
                        <div class="icon">
                            <i class="ik ik-shopping-cart"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row clearfix">
        <div class="col-12">
            <h5 class="m-0">
                <strong class="text-dark">
                    Pagu Terserap
                </strong>
            </h5>
            <div id="chart"></div>
        </div>
    </div>

    <script>
        var options = {
            series: [{
                data: {{ $char }}
            }],
            chart: {
                type: 'bar',
                height: 350
            },
            plotOptions: {
                bar: {
                    borderRadius: 4,
                    horizontal: true,
                }
            },
            dataLabels: {
                enabled: false
            },
            xaxis: {
                categories: ['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September',
                    'Oktober', 'November', 'Desember'
                ],
            }
        };

        var chart = new ApexCharts(document.querySelector("#chart"), options);
        chart.render();
    </script>
</div>
