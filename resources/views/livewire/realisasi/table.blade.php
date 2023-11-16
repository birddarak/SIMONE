<div>
    <div class="row mb-4">
        <div class="col-12 col-md-3">
            <select class="form-control" wire:model='tahun_anggaran' wire:change='index()'>
                @for ($i = 2019; $i <= date('Y'); $i++) <option value="{{ $i }}">
                    {{ $i }}
                    </option>
                    @endfor
            </select>
        </div>
        <div class="col-12 col-md-3">
            <select class="form-control" wire:model='apbd' wire:change='index()'>
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
                <th>PAGU TERSERAP</th>
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
                    {{ $program->pegawai->nama }}
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

                    <b>
                        @currency($pagu_validasi)
                    </b>
                </td>
                <td>
                    @php
                    $pagu_terserap = 0;
                    foreach ($program->kegiatan as $keg) {
                    foreach ($keg->subkegiatan as $sub) {
                    foreach ($sub->realisasi_subkegiatan as $rs) {
                    $pagu_terserap += $rs->pagu;
                    }
                    }
                    }
                    @endphp

                    <b class="{{ $pagu_validasi == $pagu_terserap ? 'text-success' : 'text-danger' }}">
                        @currency($pagu_terserap)
                    </b>
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