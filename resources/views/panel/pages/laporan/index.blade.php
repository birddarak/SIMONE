@extends('panel.templates.index')

@section('content')
    {{-- <style>
        table {
            border-collapse: collapse;
            border: 1px solid black;
            white-space: nowrap;
            overflow-x: auto;
            color: black;
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
    </style> --}}
    <div>
        <div class="main-content">
            <div class="container-fluid">
                <div class="card">
                    <div class="card-body">
                        <form id="print" class="form-material" action="{{ route('print') }}" method="GET" target="_blank">
                            <div>
                                <div class="row mb-4">
                                    <div class="col-12 col-md-3">
                                        <select class="form-control" name="tahun_anggaran" required>
                                            <option value="">TAHUN ANGGARAN</option>
                                            @for ($i = 2019; $i <= date('Y'); $i++)
                                                <option value="{{ $i }}">{{ $i }}
                                                </option>
                                            @endfor
                                        </select>
                                    </div>
                                    <div class="col-12 col-md-3">
                                        <select class="form-control" name="apbd" required>
                                            <option value="">APBD</option>
                                            <option value="murni">MURNI</option>
                                            <option value="perubahan">PERUBAHAN</option>
                                        </select>
                                    </div>
                                    <div class="col-12 col-md-3">
                                        <button type="submit" form="print" class="btn btn-primary">Print</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>

                {{-- <div class="card">
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered">
                                <thead>
                                    <tr class="header text-dark">
                                        <th scope="col" class="text-center text-dark" style="vertical-align: middle"
                                            rowspan="3">
                                            PROGRAM / KEGIATAN / SUB KEGIATAN
                                        </th>
                                        <th scope="col" class="text-center text-dark" style="vertical-align: middle"
                                            rowspan="3">
                                            INDIKATOR
                                        </th>
                                        <th scope="col" class="text-center text-dark" style="vertical-align: middle"
                                            rowspan="2" colspan="2">
                                            TARGET KINERJA DAN ANGGARAN
                                        </th>
                                        <th scope="col" class="text-center text-dark" style="vertical-align: middle"
                                            colspan="12">
                                            REALISASI TRIWULAN
                                        </th>
                                    </tr>
                                    <tr class="header">
                                        <th class="text-center text-dark" colspan="3">TW I</th>
                                        <th class="text-center text-dark" colspan="3">TW II</th>
                                        <th class="text-center text-dark" colspan="3">TW III</th>
                                        <th class="text-center text-dark" colspan="3">TW IV</th>
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
                                    </tr>
                                </thead>
                                <tbody>
                                    @include('panel.pages.laporan.partials.program')
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div> --}}
            </div>
        </div>
    </div>
@endsection
