<div>
    <div class="card">
        <div class="card-body">
            <form id="print" class="form-material" action="{{ route('print') }}" method="GET" target="_blank">
                <div>
                    @include('livewire.partials.filter')
                    <input type="text" value="{{ $apbd }}" name="apbd" hidden>
                    <input type="text" value="{{ $tahun_anggaran }}" name="tahun_anggaran" hidden>
                    <div class="col-12 col-md-3">
                        <button type="submit" form="print" class="btn btn-primary">Print</button>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <div class="card">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" style="width: 100%; height: 100%;">
                    <thead>
                        <tr style="background-color: #92D050 !important;">
                            <th class="text-dark" scope="col" style="vertical-align: middle; text-align: center;"
                                rowspan="3">
                                PROGRAM / KEGIATAN / SUB KEGIATAN
                            </th>
                            <th class="text-dark" scope="col" style="vertical-align: middle; text-align: center;"
                                rowspan="3">
                                INDIKATOR
                            </th>
                            <th class="text-dark" scope="col" style="vertical-align: middle; text-align: center;"
                                rowspan="2" colspan="2">
                                TARGET KINERJA DAN ANGGARAN
                            </th>
                            <th class="text-dark" scope="col" style="vertical-align: middle; text-align: center;"
                                rowspan="2" colspan="3">
                                REALISASI TOTAL
                            </th>
                            <th class="text-dark" scope="col" style="vertical-align: middle; text-align: center;"
                                colspan="12">
                                REALISASI PER TRIWULAN
                            </th>
                            <th class="text-dark" scope="col" style="vertical-align: middle; text-align: center;"
                                rowspan="3">
                                PENANGGUNG JAWAB
                            </th>
                        </tr>
                        <tr class="header">
                            <th class="text-dark" style="vertical-align: middle; text-align: center;" colspan="3">TW I
                            </th>
                            <th class="text-dark" style="vertical-align: middle; text-align: center;" colspan="3">TW II
                            </th>
                            <th class="text-dark" style="vertical-align: middle; text-align: center;" colspan="3">TW III
                            </th>
                            <th class="text-dark" style="vertical-align: middle; text-align: center;" colspan="3">TW IV
                            </th>
                        </tr>
                        <tr class="header text-center">
                            <th class="text-dark">Target</th>
                            <th class="text-dark">Pagu</th>

                            <th class="text-dark">Kinerja</th>
                            <th class="text-dark">Keuangan</th>
                            <th class="text-dark">Rp.</th>
                            <th class="text-dark">Kinerja</th>
                            <th class="text-dark">Keuangan</th>
                            <th class="text-dark">Rp.</th>
                            <th class="text-dark">Kinerja</th>
                            <th class="text-dark">Keuangan</th>
                            <th class="text-dark">Rp.</th>
                            <th class="text-dark">Kinerja</th>
                            <th class="text-dark">Keuangan</th>
                            <th class="text-dark">Rp.</th>

                            <th class="text-dark">Kinerja</th>
                            <th class="text-dark">Keuangan</th>
                            <th class="text-dark">Rp.</th>
                        </tr>
                    </thead>
                    <tbody>
                        @include('panel.pages.laporan.partials.program')
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>