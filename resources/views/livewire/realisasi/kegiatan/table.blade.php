<div>
    <div class="card border border-2">
        <div class="card-body">
            <button onclick="window.history.back()" class="btn btn-light">
                <i class="fas fa-arrow-left"></i>
                Kembali
            </button>
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
                    foreach ($program->kegiatan as $keg) {
                    foreach ($keg->subkegiatan as $sub) {
                    $pagu_program += $sub->pagu_awal;
                    }
                    }
                    @endphp
                    <td><b>@currency($pagu_program)</b></td>
                </tr>
                <tr>
                    <td class="col-3">PAGU TERSERAP</td>
                    <td>:</td>
                    @php
                    $pagu_trsrp = 0;
                    foreach ($program->kegiatan as $keg) {
                    foreach ($keg->subkegiatan as $sub) {
                    foreach ($sub->realisasi_subkegiatan as $rs) {
                    $pagu_trsrp += $rs->pagu;
                    }
                    }
                    }

                    @endphp
                    <td>
                        <b class="{{ $pagu_program == $pagu_trsrp ? 'text-success' : 'text-danger' }}">
                            @currency($pagu_trsrp)
                        </b>
                    </td>
                </tr>
            </table>
        </div>
    </div>
    <div class="table-responsive">
        <table class="table table-sm">
            <thead class="thead-dark">
                <tr>
                    <th class="text-center">KODE</th>
                    <th>KEGIATAN</th>
                    <th>PENANGGUNG JAWAB</th>
                    <th>PAGU VALIDASI</th>
                    <th>PAGU TERSERAP</th>
                    <th>AKSI</th>
                </tr>
            </thead>
            <tbody>

                {{-- data --}}
                @foreach ($kegiatans as $kegiatan)
                <tr>
                    <td>
                        {{ $kegiatan->kode }}
                    </td>
                    <td>
                        {{ $kegiatan->title }}
                    </td>
                    <td>
                        {{ $kegiatan->pegawai->nama }}
                    </td>
                    <td>

                        @php
                        $pagu_validasi = 0;
                        foreach ($kegiatan->subkegiatan as $sub) {
                        $pagu_validasi += $sub->pagu_awal;
                        }
                        @endphp

                        <b>
                            @currency($pagu_validasi)
                        </b>
                    </td>
                    </td>
                    <td>
                        @php
                        $pagu_terserap = 0;
                        foreach ($kegiatan->subkegiatan as $sub) {
                        foreach ($sub->realisasi_subkegiatan as $rs) {
                        $pagu_terserap += $rs->pagu;
                        }
                        }
                        @endphp

                        <b class="{{ $pagu_validasi == $pagu_terserap ? 'text-success' : 'text-danger' }}">
                            @currency($pagu_terserap)
                        </b>
                    </td>
                    <td>
                        <div class="list-actions d-flex justify-content-around form-inline">
                            <a href="{{ route('realisasi.subkegiatan', $kegiatan->uuid) }}" class="btn btn-sm">
                                <i class="ik ik-corner-down-right"></i>
                            </a>
                        </div>
                    </td>
                </tr>
                @empty
                <tr class="">
                    <td class="text-center" colspan="6">Kegiatan Masih Kosong, Mohon Tambahkan dimenu DPA</td>
                </tr>
                @endforelse
                {{-- --}}

            </tbody>
        </table>
    </div>
</div>