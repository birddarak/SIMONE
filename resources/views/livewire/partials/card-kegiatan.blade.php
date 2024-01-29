<div class="card border border-2">
    <div class="card-body">
        @php
        $prefix = explode('.', Url::currentRoute());
        @endphp
        <a href="{{ route($prefix[0] . '.program', ['tahun_anggaran' => $program->tahun_anggaran, 'apbd' => $program->apbd]) }}"
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
                <td><b>{{ $program->tahun_anggaran }}</b></td>
            </tr>
            <tr>
                <td class="col-3">APBD</td>
                <td>:</td>
                <td><b>{{ $program->apbd }}</b></td>
            </tr>
            <tr>
                <td class="col-3">PROGRAM</td>
                <td>:</td>
                <td><b>{{ $program->kode . ' ' . $program->title }}</b></td>
            </tr>
            <tr>
                <td class="col-3">UNIT PENANGGUNG JAWAB</td>
                <td>:</td>
                <td><b>{{ $program->pegawai->nama }}</b></td>
            </tr>
            <tr>
                <td class="col-3">PAGU PROGRAM</td>
                <td>:</td>
                @php
                $pagu_program = 0;
                foreach ($program->kegiatan as $kegiatan) {
                $pagu_program += $kegiatan->sumTotalSubKeg();
                }
                @endphp
                <td><b>@currency($pagu_program)</b></td>
            </tr>
            <tr>
                <td class="col-3">PAGU TERSERAP</td>
                <td>:</td>
                @php
                $pagu_terserap = 0;
                foreach ($program->kegiatan as $kegiatan) {
                $pagu_terserap += $kegiatan->sumTotal();
                }

                @endphp
                <td>
                    <b class="{{ $pagu_program >= $pagu_terserap ? 'text-success' : 'text-danger' }}">
                        @currency($pagu_terserap)
                    </b>
                </td>
            </tr>
        </table>

    </div>
</div>