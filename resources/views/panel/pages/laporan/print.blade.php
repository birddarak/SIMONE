<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>MONEV</title>
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
        <h6 class="text-center"><b>DINAS KOMUNIKASI INFORMASI DAN INFORMATIKA </b></h6>
        <h6 class="text-center"><b>APBD {{ strtoupper($apbd) }} TAHUN {{ $tahun_anggaran }}</b></h6>
        <div class="wrapper mt-4">
            {{-- <div class="text-bold mb-3">
                <span>APBD : {{ ucfirst($apbd) }}</span>
                <br>
                <span>TAHUN : {{ $tahun_anggaran }}</span>
            </div> --}}
            <div class="table-responsive">
                <table class="table table-bordered">
                    <thead>
                        <tr class="header">
                            <th scope="col" class="text-center" style="vertical-align: middle" rowspan="3">
                                PROGRAM / KEGIATAN / SUB KEGIATAN
                            </th>
                            <th scope="col" class="text-center" style="vertical-align: middle" rowspan="3">
                                INDIKATOR
                            </th>
                            <th scope="col" class="text-center" style="vertical-align: middle" rowspan="2" colspan="2">
                                TARGET KINERJA DAN ANGGARAN
                            </th>
                            <th scope="col" class="text-center" style="vertical-align: middle" rowspan="2" colspan="3">
                                REALISASI TOTAL
                            </th>
                            <th scope="col" class="text-center" style="vertical-align: middle" colspan="12">
                                REALISASI PER TRIWULAN
                            </th>
                            <th scope="col" class="text-center" style="vertical-align: middle" rowspan="3">
                                PENANGGUNG JAWAB
                            </th>
                        </tr>
                        <tr class="header">
                            <th class="text-center" colspan="3">TW I</th>
                            <th class="text-center" colspan="3">TW II</th>
                            <th class="text-center" colspan="3">TW III</th>
                            <th class="text-center" colspan="3">TW IV</th>
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