@extends('panel.templates.index')

@section('content')
    <div>
        <div class="main-content">
            <div class="container-fluid">
                <div class="card">
                    <div class="card-body">
                        @livewire('realisasi.rincian-belanja.table', ['realisasi_subkegiatan' => $realisasi_subkegiatan])
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
