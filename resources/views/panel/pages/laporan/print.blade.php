<h6 class="text-center"><b>MONITORING DAN EVALUASI CAPAIAN KINERJA ATAS RENCANA AKSI</b></h6>
<h6 class="text-center"><b>DINAS KOMUNIKASI INFORMASI DAN INFORMATIKA </b></h6>
<h6 class="text-center"><b>APBD{{ ($apbd == 'perubahan') ? ' ' . strtoupper($apbd) : '' }} TAHUN {{ $tahun_anggaran }}</b></h6>
<div class="content">
    <div class="table">
        <table cellspacing="0">
            <thead>
                <tr class="header text-middle text-center">
                    <th scope="col" rowspan="3">
                        PROGRAM / KEGIATAN / SUB KEGIATAN
                    </th>
                    <th scope="col" rowspan="3">
                        INDIKATOR
                    </th>
                    <th scope="col" rowspan="2" colspan="2">
                        TARGET KINERJA DAN ANGGARAN
                    </th>
                    <th scope="col" rowspan="2" colspan="4">
                        REALISASI TAHUN {{ $tahun_anggaran }}
                    </th>
                    <th scope="col" colspan="16">
                        REALISASI PER TRIWULAN
                    </th>
                    <th scope="col" rowspan="3">
                        PENANGGUNG JAWAB
                    </th>
                </tr>
                <tr class="header text-middle text-center">
                    <th colspan="4">TW I</th>
                    <th colspan="4">TW II</th>
                    <th colspan="4">TW III</th>
                    <th colspan="4">TW IV</th>
                </tr>
                <tr class="header text-middle text-center">
                    <th>Target</th>
                    <th>Pagu</th>
                    {{-- total --}}
                    <th>Kinerja</th>
                    <th>%</th>
                    <th>Keuangan</th>
                    <th>%</th>
                    {{-- tw i --}}
                    <th>Kinerja</th>
                    <th>%</th>
                    <th>Keuangan</th>
                    <th>%</th>
                    {{-- tw ii --}}
                    <th>Kinerja</th>
                    <th>%</th>
                    <th>Keuangan</th>
                    <th>%</th>
                    {{-- tw iii --}}
                    <th>Kinerja</th>
                    <th>%</th>
                    <th>Keuangan</th>
                    <th>%</th>
                    {{-- tw iv --}}
                    <th>Kinerja</th>
                    <th>%</th>
                    <th>Keuangan</th>
                    <th>%</th>
                </tr>
            </thead>
            <tbody>
                @include('panel.pages.laporan.partials.program')
            </tbody>
        </table>
    </div>

    <div class="text-center ttd">
        <h4><b>Kepala Dinas Komunikasi dan Informatika</b></h4>
        <br>
        <br>
        <br>
        <br>
        <h3><u><b>Wahyudi Pranoto, S.Sos, MT</b></u></h3>
        <span>Pembina Tk I/ IV/b</span><br>
        <span>NIP. 19710130 199903 1 005</span>
    </div>
</div>