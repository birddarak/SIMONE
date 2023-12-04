<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <title>SIEMON</title>
    <meta content='width=device-width, initial-scale=1.0, shrink-to-fit=no' name='viewport' />
    <!-- Required Fremwork -->
    @include('panel.pages.laporan.partials.style')
</head>

<body>
    <h6 class="text-center"><b>MONITORING DAN EVALUASI CAPAIAN KINERJA ATAS RENCANA AKSI</b></h6>
    <h6 class="text-center"><b>DINAS KOMUNIKASI INFORMASI DAN INFORMATIKA </b></h6>
    <h6 class="text-center"><b>APBD {{ strtoupper($apbd) }} TAHUN {{ $tahun_anggaran }}</b></h6>
    <div class="wrapper mt-4">
        <table class="table table-bordered" style="width: 100%; height: 100%;">
            <thead>
                <tr style="background-color: #92D050 !important;">
                    <th scope="col" style="vertical-align: middle; text-align: center;" rowspan="3">
                        PROGRAM / KEGIATAN / SUB KEGIATAN
                    </th>
                    <th scope="col" style="vertical-align: middle; text-align: center;" rowspan="3">
                        INDIKATOR
                    </th>
                    <th scope="col" style="vertical-align: middle; text-align: center;" rowspan="2" colspan="2">
                        TARGET KINERJA DAN ANGGARAN
                    </th>
                    <th scope="col" style="vertical-align: middle; text-align: center;" rowspan="2" colspan="3">
                        REALISASI TOTAL
                    </th>
                    <th scope="col" style="vertical-align: middle; text-align: center;" colspan="12">
                        REALISASI PER TRIWULAN
                    </th>
                    <th scope="col" style="vertical-align: middle; text-align: center;" rowspan="3">
                        PENANGGUNG JAWAB
                    </th>
                </tr>
                <tr class="header">
                    <th style="vertical-align: middle; text-align: center;" colspan="3">TW I</th>
                    <th style="vertical-align: middle; text-align: center;" colspan="3">TW II</th>
                    <th style="vertical-align: middle; text-align: center;" colspan="3">TW III</th>
                    <th style="vertical-align: middle; text-align: center;" colspan="3">TW IV</th>
                </tr>
                <tr class="header text-center">
                    <th>Target</th>
                    <th>Pagu</th>

                    <th>Kinerja</th>
                    <th>Keuangan</th>
                    <th>Rp.</th>
                    <th>Kinerja</th>
                    <th>Keuangan</th>
                    <th>Rp.</th>
                    <th>Kinerja</th>
                    <th>Keuangan</th>
                    <th>Rp.</th>
                    <th>Kinerja</th>
                    <th>Keuangan</th>
                    <th>Rp.</th>

                    <th>Kinerja</th>
                    <th>Keuangan</th>
                    <th>Rp.</th>
                </tr>
            </thead>
            <tbody>
                @include('panel.pages.laporan.partials.program')
            </tbody>
        </table>
    </div>

    <div class="ttd">
        <h6><b>Kepala Dinas</b></h6>
        <br>
        <br>
        <br>
        <br>
        <h6><u><b>Wahyudi Pranoto, S.Sos, MT</b></u></h6>
        <span>Pembina Tk I/ IV/b</span><br>
        <span>NIP. 19710130 199903 1 005</span>
    </div>

    @include('panel.pages.laporan.partials.script')

</body>

</html>