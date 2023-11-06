@extends('panel.templates.index')

@section('content')
<div>
    <div class="main-content">
        <div class="container-fluid">
            <div class="card">
                <div class="card-header row">
                    <div class="col col-sm-3">
                        @livewire('d-p-a.form')
                    </div>
                </div>
                <div class="card-body">
                    @livewire('d-p-a.table')
                </div>
            </div>
        </div>
    </div>
</div>
@endsection