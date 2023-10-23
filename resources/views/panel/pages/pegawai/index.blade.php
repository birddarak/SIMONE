@extends('panel.templates.index')

@section('content')
    <div>
        <div class="main-content">
            <div class="container-fluid">
                <div class="card">
                    <div class="card-header row">
                        <div class="col col-sm-3">
                            <div class="card-options d-inline-block">
                                <span data-toggle="tooltip" data-placement="top" title="Print Semua">
                                    <a href="#"><i class="ik ik-printer"></i></a>
                                </span>
                                @include('panel.pages.pegawai.create')
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        @livewire('pegawai.table')
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
