@extends('panel.templates.index')

@section('content')
<div>
    <div class="main-content">
        <div class="container-fluid">
            <div class="card">
                <div class="card-header row">
                    <div class="col col-sm-3">
                        @livewire('user.form')
                    </div>
                </div>
                <div class="card-body">
                    @livewire('user.table')
                </div>
            </div>
        </div>
    </div>
</div>
@endsection