@extends('panel.templates.index')

@section('content')
    <div>
        <div class="main-content">
            <div class="container-fluid">
                <div class="card">
                    <div class="card-body">
                        @livewire('realisasi.program.table', ['tahun_anggaran' => $tahun_anggaran, 'apbd' => $apbd])
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
