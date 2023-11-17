@extends('panel.templates.index')

@section('content')
<div>
    <div class="main-content">
        <div class="container-fluid">
            <div class="card">
                <div class="card-body">
                    @livewire('pegawai.table')
                </div>
            </div>
        </div>
    </div>
</div>
@endsection