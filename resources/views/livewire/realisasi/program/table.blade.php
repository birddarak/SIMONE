<div>
    @include('livewire.partials.filter')
    <div class="table-responsive">
        <table class="table custom-bordered-table">
            <thead class="thead-dark">
                <tr>
                    <th class="text-center">KODE</th>
                    <th>PROGRAM</th>
                    <th>TARGET</th>
                    <th>PENANGGUNG JAWAB</th>
                    <th>PAGU</th>
                    <th>PAGU TERSERAP</th>
                    <th>AKSI</th>
                </tr>
            </thead>
            <tbody>

                {{-- data --}}
                @forelse ($programs as $program)
                    <tr>
                        <td class="p-1">
                            {{ $program->kode }}
                        </td>
                        <td class="p-1">
                            {{ $program->title }}
                        </td>
                        <td class="p-1">
                            {{ $program->target . ' ' . $program->satuan }}
                        </td>
                        <td class="p-1">
                            {{ $program->pegawai->nama }}
                        </td>
                        <td class="p-1">

                            @php
                                $pagu_validasi = 0;
                                foreach ($program->kegiatan as $keg) {
                                    foreach ($keg->subkegiatan as $sub) {
                                        $pagu_validasi += $sub->pagu;
                                    }
                                }
                            @endphp

                            <b>
                                @currency($pagu_validasi)
                            </b>
                        </td>
                        <td class="p-1">
                            @php
                                $pagu_terserap = 0;
                                foreach ($program->kegiatan as $keg) {
                                    foreach ($keg->subkegiatan as $sub) {
                                        foreach ($sub->realisasi_subkegiatan as $rs) {
                                            foreach ($rs->rincian_belanja as $rb) {
                                                $pagu_terserap += $rb->pagu;
                                            }
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
                                <a href="{{ route('realisasi.kegiatan', $program->uuid) }}" class="btn btn-info btn-icon ml-2 mb-2">
                                    <i class="ik ik-corner-down-right"></i>
                                </a>
                            </div>
                        </td>
                    </tr>
                @empty
                    <tr class="">
                        <td class="p-1" class="text-center" colspan="7">Program Masih Kosong, Mohon Tambahkan
                            dimenu DPA</td>
                    </tr>
                @endforelse
                {{-- --}}

            </tbody>
        </table>
    </div>
</div>
