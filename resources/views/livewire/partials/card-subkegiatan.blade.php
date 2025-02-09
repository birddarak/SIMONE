<div class="card border border-2">
    <div class="card-body">
        @php
        $prefix = explode('.', Url::currentRoute());
        @endphp
        <a href="{{ route($prefix[0] . '.kegiatan', ['program' => $kegiatan->program->uuid]) }}" class="btn btn-light">
            <i class="fas fa-arrow-left"></i>
            Kembali
        </a>
        <br>
        <br>
        <table class="text-uppercase col-12">
            <tr>
                <td class="col-3">TAHUN ANGGARAN</td>
                <td>:</td>
                <td><b>{{ $kegiatan->program->tahun_anggaran }}</b></td>
            </tr>
            <tr>
                <td class="col-3">APBD</td>
                <td>:</td>
                <td><b>{{ $kegiatan->program->apbd }}</b></td>
            </tr>
            <tr>
                <td class="col-3">PROGRAM</td>
                <td>:</td>
                <td><b>{{ $kegiatan->program->kode . ' ' . $kegiatan->program->title }}</b></td>
            </tr>
            <tr>
                <td class="col-3">KEGIATAN</td>
                <td>:</td>
                <td><b>{{ $kegiatan->kode . ' ' . $kegiatan->title }}</b></td>
            </tr>
            <tr>
                <td class="col-3">UNIT PENANGGUNG JAWAB</td>
                <td>:</td>
                <td><b>{{ $kegiatan->pegawai->nama }}</b></td>
            </tr>
            <tr>
                <td class="col-3">PAGU KEGIATAN</td>
                <td>:</td>
                @php
                $pagu_kegiatan = $kegiatan->subkegiatan->sum('pagu');
                @endphp
                <td><b>@currency($pagu_kegiatan)</b></td>
            </tr>
            <tr>
                <td class="col-3">PAGU TERSERAP</td>
                <td>:</td>
                @php
                $pagu_terserap = 0;
                foreach ($kegiatan->subkegiatan as $subkegiatan) {
                $pagu_terserap += $subkegiatan->sumTotal();
                }
                @endphp
                <td>
                    <b class="{{ $pagu_kegiatan >= $pagu_terserap ? 'text-success' : 'text-danger' }}">
                        @currency($pagu_terserap)
                    </b>
                </td>
            </tr>
        </table>
    </div>
</div>