<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>

<body>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <title>SIEMON</title>
        <meta content='width=device-width, initial-scale=1.0, shrink-to-fit=no' name='viewport' />
        <!-- Required Fremwork -->
        <link rel="stylesheet" type="text/css"
            href="{{ url('templates/panel') }}/node_modules/bootstrap/dist/css/bootstrap.min.css">
        <style>
            @media print {

                /* atur tampilan halaman saat dicetak dalam mode landscape */
                input.noPrint {
                    display: none;
                }

                @page {
                    size: landscape;
                }
            }

            table {
                border-collapse: collapse;
                border: 1px solid black;
                white-space: nowrap;
                overflow-x: auto;
            }

            .program {
                background-color: #F8CBAD
            }

            .kegiatan {
                background-color: #D0CECE
            }

            .subkegiatan {
                background-color: #FFD966
            }

            td,
            th {
                border-width: 3px !important;
                border-color: black !important
            }

            th,
            td,
            p {
                font-size: 12px;
            }

            .header {
                background-color: #92D050;
            }

            .ttd {
                float: right;
                margin-right: 50px
            }
        </style>
    </head>

    <body>
        <h6 class="text-center"><b>MONITORING DAN EVALUASI CAPAIAN KINERJA ATAS RENCANA AKSI</b></h6>
        <h6 class="text-center"><b>DINAS KOMUNIKASI INFORMASI DAN INFORMATIKA TAHUN </b></h6>
        <div class="wrapper mt-4">
            <div class="text-bold mb-3">
                <span>NAMA SKPD : DINAS KOMUNIKASI INFORMASI DAN INFORMATIKA</span>
                <br>
                {{-- <span>STATUS : {{ ucfirst($status) }}</span>
                <br>
                <span>TAHUN : {{ $tahun }}</span> --}}
            </div>
            <div class="table-responsive">
                <table class="table table-bordered">
                    <thead>
                        <tr class="header">
                            {{-- <th scope="col" class="text-center" style="vertical-align: middle" rowspan="3"
                                style="width: 10%">No
                            </th> --}}
                            <th scope="col" class="text-center" style="vertical-align: middle" rowspan="3">
                                PROGRAM / KEGIATAN / SUB KEGIATAN
                            </th>
                            <th scope="col" class="text-center" style="vertical-align: middle" rowspan="3">
                                PAGU
                            </th>
                            <th scope="col" class="text-center" style="vertical-align: middle" rowspan="2" colspan="2">
                                TARGET KINERJA DAN ANGGARAN
                            </th>
                            <th scope="col" class="text-center" style="vertical-align: middle" colspan="12">
                                REALISASI TRIWULAN
                            </th>
                        </tr>
                        <tr class="header">
                            <th class="text-center" colspan="3">TW I</th>
                            <th class="text-center" colspan="3">TW II</th>
                            <th class="text-center" colspan="3">TW III</th>
                            <th class="text-center" colspan="3">TW IV</th>
                        </tr>
                        <tr class="header text-center">
                            <th>Indikator</th>
                            <th>Target</th>

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
                        @forelse ($programs as $prog)
                        <tr class="program">
                            <td rowspan={{ $prog->indikator_program->count() + 1 }} style="vertical-align: middle;">
                                {{ $prog->kode . ' ' . $prog->title }}
                            </td>
                            <td class="text-right" rowspan={{ $prog->indikator_program->count() + 1 }}
                                style="vertical-align: middle;">
                                @currency($prog->sumTotalSubKeg())
                            </td>
                        </tr>
                        @forelse ($prog->indikator_program as $ip)
                        <tr class="program">
                            <td>
                                {{ $ip->title }}
                            </td>
                            <td class="text-center">
                                {{ $ip->target . ' ' . $ip->satuan }}
                            </td>
                            {{-- triwulan I --}}
                            <td class="text-center">
                                {{ !empty($prog->triwulan('I')) ? $prog->triwulan('I')->target . ' ' .
                                $prog->triwulan('I')->satuan : 0 }}
                            </td>
                            {{-- <td class="text-center">
                                {{ !empty($keg->total_realisasi()->where('triwulan', 'I'))
                                ? number_format((intval($keg->total_realisasi()->where('triwulan',
                                'I')->sum('pagu')) / intval($keg->subkegiatan->sum('pagu_awal'))) * 100, 2)
                                . ' %'
                                : '0 %' }}
                            </td> --}}
                            <td></td>
                            <td></td>
                            {{-- <td class="text-right">@currency(!empty($prog->total_realisasi('I')) ?
                                $prog->total_realisasi('I')->sum('pagu') : 0)</td> --}}
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                        </tr>
                        @empty
                        @endforelse

                        {{-- baris kegiatan --}}
                        @forelse ($prog->kegiatan as $keg)
                        <tr class="kegiatan">
                            <td rowspan="{{ $keg->indikator_kegiatan->count() + 1 }}">
                                {{ $keg->kode . ' ' . $keg->title }}</td>
                            <td class="text-right" rowspan="{{ $keg->indikator_kegiatan->count() + 1 }}">
                                @currency($keg->subkegiatan->sum('pagu_awal'))
                            </td>
                        </tr>
                        @forelse ($keg->indikator_kegiatan as $ik)
                        <tr class="kegiatan">

                            <td>
                                {{ $ik->title }}
                            </td>
                            <td class="text-center">
                                {{ $ik->target . ' ' . $ik->satuan }}
                            </td>
                            {{-- triwulan I --}}
                            <td class="text-center">
                                {{ !empty($keg->triwulan('I')) ? $keg->triwulan('I')->target . ' ' .
                                $keg->triwulan('I')->satuan : 0 }}
                            </td>
                            <td class="text-center">
                                {{ !empty($keg->total_realisasi('I'))
                                ? number_format((intval($keg->total_realisasi('I')->sum('pagu')) / intval($keg->subkegiatan->sum('pagu_awal'))) * 100, 2)
                                . ' %'
                                : '0 %' }}
                            </td>
                            <td class="text-right">@currency(!empty($keg->total_realisasi('I')) ?
                                $keg->total_realisasi('I')->sum('pagu') : 0)</td>
                            {{-- triwulan II --}}
                            <td class="text-center">
                                {{ !empty($keg->triwulan('II')) ? $keg->triwulan('II')->target . ' ' .
                                $keg->triwulan('II')->satuan : 0 }}
                            </td>
                            <td class="text-center">
                                {{ !empty($keg->total_realisasi('II'))
                                ? number_format((intval($keg->total_realisasi('II')->sum('pagu')) / intval($keg->subkegiatan->sum('pagu_awal'))) * 100, 2)
                                . ' %'
                                : '0 %' }}
                            </td>
                            <td class="text-right">@currency(!empty($keg->total_realisasi('II')) ?
                                $keg->total_realisasi('II')->sum('pagu') : 0)</td>
                            {{-- triwulan III --}}
                            <td class="text-center">
                                {{ !empty($keg->triwulan('III')) ? $keg->triwulan('III')->target . ' ' .
                                $keg->triwulan('III')->satuan : 0 }}
                            </td>
                            <td class="text-center">
                                {{ !empty($keg->total_realisasi('III'))
                                ? number_format((intval($keg->total_realisasi('III')->sum('pagu')) / intval($keg->subkegiatan->sum('pagu_awal'))) * 100, 2)
                                . ' %'
                                : '0 %' }}
                            </td>
                            <td class="text-right">@currency(!empty($keg->total_realisasi('III')) ?
                                $keg->total_realisasi('III')->sum('pagu') : 0)</td>
                            {{-- triwulan IV --}}
                            <td class="text-center">
                                {{ !empty($keg->triwulan('IV')) ? $keg->triwulan('IV')->target . ' ' .
                                $keg->triwulan('IV')->satuan : 0 }}
                            </td>
                            <td class="text-center">
                                {{ !empty($keg->total_realisasi('IV'))
                                ? number_format((intval($keg->total_realisasi('IV')->sum('pagu')) / intval($keg->subkegiatan->sum('pagu_awal'))) * 100, 2)
                                . ' %'
                                : '0 %' }}
                            </td>
                            <td class="text-right">@currency(!empty($keg->total_realisasi('IV')) ?
                                $keg->total_realisasi('IV')->sum('pagu') : 0)</td>
                        </tr>
                        @empty
                        @endforelse

                        {{-- baris sub kegiatan --}}
                        @forelse ($keg->subkegiatan as $sub)
                        <tr class="subkegiatan">
                            <td rowspan="{{ $sub->indikator_subkegiatan->count() + 1 }}">
                                {{ $sub->kode . ' ' . $sub->title }}</td>
                            <td class="text-right" class="text-right"
                                rowspan="{{ $sub->indikator_subkegiatan->count() + 1 }}">
                                @currency($sub->pagu_awal)
                            </td>
                        </tr>

                        @forelse ($sub->indikator_subkegiatan as $isk)
                        <tr class="subkegiatan">
                            <td>{{ $isk->title }}</td>
                            <td class="text-center">{{ $isk->target . ' ' . $isk->satuan }}</td>
                            {{-- triwulan I --}}
                            <td class="text-center">
                                {{ isset($sub->triwulan('I')->target) ? $sub->triwulan('I')->target . ' ' .
                                $sub->triwulan('I')->satuan : '0' }}
                            </td>
                            <td class="text-center">
                                {{ isset($sub->triwulan('I')->pagu)
                                ? number_format((intval($sub->triwulan('I')->pagu) / intval($sub->pagu_awal)) * 100, 2)
                                . ' %'
                                : '0 %' }}
                            </td>
                            <td class="text-right">@currency(isset($sub->triwulan('I')->pagu) ?
                                $sub->triwulan('I')->pagu : 0)</td>
                            {{-- triwulan II --}}
                            <td class="text-center">
                                {{ isset($sub->triwulan('II')->target)
                                ? $sub->triwulan('II')->target . ' ' . $sub->triwulan('II')->satuan
                                : '0' }}
                            </td>
                            <td class="text-center">
                                {{ isset($sub->triwulan('II')->pagu)
                                ? number_format((intval($sub->triwulan('II')->pagu) / intval($sub->pagu_awal)) * 100, 2)
                                . ' %'
                                : '0 %' }}
                            </td>
                            <td class="text-right">@currency(isset($sub->triwulan('II')->pagu) ?
                                $sub->triwulan('II')->pagu : 0)</td>
                            {{-- triwulan III --}}
                            <td class="text-center">
                                {{ isset($sub->triwulan('III')->target)
                                ? $sub->triwulan('III')->target . ' ' . $sub->triwulan('III')->satuan
                                : '0' }}
                            </td>
                            <td class="text-center">
                                {{ isset($sub->triwulan('III')->pagu)
                                ? number_format((intval($sub->triwulan('III')->pagu) / intval($sub->pagu_awal)) * 100,
                                2) . ' %' : '0 %' }}
                            </td>
                            <td class="text-right">@currency(isset($sub->triwulan('III')->pagu) ?
                                $sub->triwulan('III')->pagu : 0)</td>
                            {{-- triwulan IV --}}
                            <td class="text-center">
                                {{ isset($sub->triwulan('IV')->target)
                                ? $sub->triwulan('IV')->target . ' ' . $sub->triwulan('IV')->satuan
                                : '0' }}
                            </td>
                            <td class="text-center">
                                {{ isset($sub->triwulan('IV')->pagu)
                                ? number_format((intval($sub->triwulan('IV')->pagu) / intval($sub->pagu_awal)) * 100, 2)
                                .
                                '
                                %'
                                : '0 %' }}
                            </td>
                            <td class="text-right">@currency(isset($sub->triwulan('IV')->pagu) ?
                                $sub->triwulan('IV')->pagu : 0)</td>
                        </tr>
                        @empty
                        @endforelse

                        @empty
                        @endforelse
                        {{-- /. baris sub kegiatan --}}

                        @empty
                        @endforelse
                        {{-- /. baris kegiatan --}}


                        @empty
                        <tr>
                            <td class="text-center" colspan="12">DATA KOSONG</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
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

        <script type="text/javascript" src="{{ url('templates/backend') }}/js/core/jquery.3.2.1.min.js "></script>
        <script type="text/javascript" src="{{ url('templates/backend') }}/js/core/popper.min.js"></script>
        <script type="text/javascript" src="{{ url('templates/backend') }}/js/core/bootstrap.min.js "></script>

        {{-- <script>
            window.print()
        </script> --}}
    </body>

    </html>
</body>

</html>