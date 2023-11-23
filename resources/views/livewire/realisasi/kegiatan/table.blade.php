<div>
    @include('livewire.partials.card-kegiatan')
    <div class="table-responsive">
        <table class="table table-sm">
            <thead class="thead-dark">
                <tr>
                    <th class="text-center">KODE</th>
                    <th>KEGIATAN</th>
                    <th>TARGET</th>
                    <th>PENANGGUNG JAWAB</th>
                    <th>PAGU</th>
                    <th>PAGU TERSERAP</th>
                    <th>AKSI</th>
                </tr>
            </thead>
            <tbody>

                {{-- data --}}
                @forelse ($kegiatans as $kegiatan)
                <tr>
                    <td>
                        {{ $kegiatan->kode }}
                    </td>
                    <td>
                        {{ $kegiatan->title }}
                    </td>
                    <td>
                        {{ $kegiatan->target . ' ' . $kegiatan->satuan }}
                    </td>
                    <td>
                        {{ $kegiatan->pegawai->nama }}
                    </td>
                    <td>

                        @php
                        $pagu_validasi = 0;
                        foreach ($kegiatan->subkegiatan as $sub) {
                        $pagu_validasi += $sub->pagu;
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
                    <td class="text-center" colspan="7">Kegiatan Masih Kosong, Mohon Tambahkan dimenu DPA</td>
                </tr>
                @endforelse
                {{-- --}}

            </tbody>
        </table>
    </div>
</div>