@extends('panel.templates.index')

@section('content')
    <style>
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
    </style>
    <div>
        <div class="main-content">
            <div class="container-fluid">
                @livewire('laporan.table')
            </div>
        </div>
    </div>
@endsection
