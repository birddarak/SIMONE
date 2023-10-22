@extends('panel.templates.index')

@section('content')
<div>
    <div class="main-content">
        <div class="container-fluid">
            <div class="card">
                <div class="card-header row">
                    <div class="col col-sm-3">
                        <div class="card-options d-inline-block">
                            <a href="#"><i class="ik ik-printer"></i></a>
                            @include('panel.pages.user.create')
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    @livewire('user', ['users' => $users])
                </div>
            </div>
        </div>
    </div>
</div>
@endsection