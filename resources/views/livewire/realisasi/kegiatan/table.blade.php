<div>
    @include('livewire.partials.card-kegiatan')
    <div class="table-responsive">
        <table class="table custom-bordered-table">
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
                        <td class="p-1">
                            {{ $kegiatan->kode }}
                        </td>
                        <td class="p-1">
                            {{ $kegiatan->title }}
                        </td>
                        <td class="p-1">
                            {{ $kegiatan->target . ' ' . $kegiatan->satuan }}
                        </td>
                        <td class="p-1">
                            {{ $kegiatan->pegawai->nama }}
                        </td>
                        <td class="p-1 text-right">

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
                        <td class="p-1 text-right">
                            @php
                                $pagu_terserap = 0;
                                foreach ($kegiatan->subkegiatan as $sub) {
                                    foreach ($sub->realisasi_subkegiatan as $rs) {
                                        foreach ($rs->rincian_belanja as $rb) {
                                            $pagu_terserap += $rb->pagu;
                                        }
                                    }
                                }
                            @endphp

                            <b class="{{ $pagu_validasi >= $pagu_terserap ? 'text-success' : 'text-danger' }}">
                                @currency($pagu_terserap)
                            </b>
                        </td>
                        <td class="text-center p-1">
                            <div class="btn-group">
                                <a href="{{ route('realisasi.subkegiatan', $kegiatan->uuid) }}" class="btn btn-info btn-icon ml-2 mb-2">
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
