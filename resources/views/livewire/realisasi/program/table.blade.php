<div>
    @include('livewire.partials.filter')
    <div class="table-responsive">
        <table class="table table-sm">
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
                    <td>
                        {{ $program->kode }}
                    </td>
                    <td>
                        {{ $program->title }}
                    </td>
                    <td>
                        {{ $program->target . ' ' . $program->satuan }}
                    </td>
                    <td>
                        {{ $program->pegawai->nama }}
                    </td>
                    <td>

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
                @empty
                <tr class="">
                    <td class="text-center" colspan="7">Program Masih Kosong, Mohon Tambahkan dimenu DPA</td>
                </tr>
                @endforelse
                {{-- --}}

            </tbody>
        </table>
    </div>
</div>