<div>
    <div class="row mb-4">
        <div class="col-12 col-md-3">
            <select class="form-control" wire:model.live='tahun_anggaran'>
                @for ($i = 2019; $i <= date('Y'); $i++) <option value="{{ $i }}">
                    {{ $i }}
                    </option>
                    @endfor
            </select>
        </div>
        <div class="col-12 col-md-3">
            <select class="form-control" wire:model='apbd'>
                <option value="murni">MURNI</option>
                <option value="perubahan">PERUBAHAN</option>
            </select>
        </div>
    </div>

    <table class="table table-sm">
        <thead class="thead-dark">
            <tr>
                <th class="text-center">KODE</th>
                <th>PROGRAM</th>
                <th>PENANGGUNG JAWAB</th>
                <th>PAGU VALIDASI</th>
                <th>RINCIAN</th>
                <th>AKSI</th>
            </tr>
        </thead>
        <tbody>

            {{-- data --}}
            @foreach ($programs as $program)
            <tr>
                <td>
                    {{ $program->kode }}
                </td>
                <td>
                    {{ $program->title }}
                </td>
                <td>
                    {{ $program->pegawai->nama}}
                </td>
                <td>

                    @php
                    $pagu_validasi = 0;
                    foreach ($program->kegiatan as $keg) {
                    foreach ($keg->subkegiatan as $sub) {
                    $pagu_validasi += $sub->pagu_awal;
                    }
                    }
                    @endphp

                    @currency($pagu_validasi)</td>
                <td>

                </td>
                <td>
                    <div class="list-actions d-flex justify-content-around form-inline">
                        <a href="{{ route('realisasi.kegiatan', $program->uuid) }}" class="btn btn-sm">
                            <i class="ik ik-corner-down-right"></i>
                        </a>
                    </div>
                </td>
            </tr>
            @endforeach
            {{-- --}}

        </tbody>
    </table>
</div>