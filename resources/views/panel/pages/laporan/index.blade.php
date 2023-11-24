@extends('panel.templates.index')

@section('content')
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
                                        @for ($i = 2019; $i <= date('Y'); $i++) <option value="{{ $i }}">{{ $i }}
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
        </div>
    </div>
</div>

@endsection