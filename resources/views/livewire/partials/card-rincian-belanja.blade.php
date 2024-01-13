<div class="card border border-2">
    <div class="card-body">
        <a href="{{ route('realisasi.subkegiatan', ['kegiatan' => $realisasi_subkegiatan->subkegiatan->kegiatan->uuid]) }}"
            class="btn btn-light">
            <i class="fas fa-arrow-left"></i>
            Kembali
        </a>
        <br>
        <br>
        <table class="text-uppercase col-12">
            <tr>
                <td class="col-3">TAHUN ANGGARAN</td>
                <td>:</td>
                <td><b>{{ $realisasi_subkegiatan->subkegiatan->kegiatan->program->tahun_anggaran }}</b></td>
            </tr>
            <tr>
                <td class="col-3">APBD</td>
                <td>:</td>
                <td><b>{{ $realisasi_subkegiatan->subkegiatan->kegiatan->program->apbd }}</b></td>
            </tr>
            <tr>
                <td class="col-3">PROGRAM</td>
                <td>:</td>
                <td><b>{{ $realisasi_subkegiatan->subkegiatan->kegiatan->program->kode . ' ' .
                        $realisasi_subkegiatan->subkegiatan->kegiatan->program->title }}</b></td>
            </tr>
            <tr>
                <td class="col-3">KEGIATAN</td>
                <td>:</td>
                <td><b>{{ $realisasi_subkegiatan->subkegiatan->kegiatan->kode . ' ' .
                        $realisasi_subkegiatan->subkegiatan->kegiatan->title }}</b></td>
            </tr>
            <tr>
                <td class="col-3">SUB KEGIATAN</td>
                <td>:</td>
                <td><b>{{ $realisasi_subkegiatan->subkegiatan->kode . ' ' . $realisasi_subkegiatan->subkegiatan->title
                        }}</b></td>
            </tr>
            <tr>
                <td class="col-3">UNIT PENANGGUNG JAWAB</td>
                <td>:</td>
                <td><b>{{ $realisasi_subkegiatan->subkegiatan->pegawai->nama }}</b></td>
            </tr>
            <tr>
                <td class="col-3">PAGU SUB KEGIATAN</td>
                <td>:</td>
                @php
                $pagu_subkegiatan = $realisasi_subkegiatan->subkegiatan->pagu;
                @endphp
                <td><b>@currency($pagu_subkegiatan)</b></td>
            </tr>
            <tr>
                <td class="col-3">TRIWULAN</td>
                <td>:</td>
                <td><b>
                        @switch($realisasi_subkegiatan->triwulan)
                        @case('I')
                        {{ $realisasi_subkegiatan->triwulan . ' (SATU)' }}
                        @break
                        @case('II')
                        {{ $realisasi_subkegiatan->triwulan . ' (DUA)' }}
                        @break
                        @case('III')
                        {{ $realisasi_subkegiatan->triwulan . ' (TIGA)' }}
                        @break
                        @case('IV')
                        {{ $realisasi_subkegiatan->triwulan . ' (EMPAT)' }}
                        @break
                        @endswitch
                    </b></td>
            </tr>
            <tr>
                <td class="col-3">PAGU TERSERAP</td>
                <td>:</td>
                @php
                $pagu_terserap = $realisasi_subkegiatan->rincian_belanja->sum('pagu');
                @endphp
                <td>
                    <b class="{{ $pagu_subkegiatan >= $pagu_terserap ? 'text-success' : 'text-danger' }}">
                        @currency($pagu_terserap)
                    </b>
                </td>
            </tr>
        </table>
    </div>
</div>