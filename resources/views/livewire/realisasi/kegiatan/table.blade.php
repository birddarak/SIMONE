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
                <tr style="background-color: #FFD966">
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
                        <b>
                            @currency($kegiatan->subkegiatan->sum('pagu'))
                        </b>
                    </td>
                    <td class="p-1 text-right">
                        <b class="{{ $kegiatan->subkegiatan->sum('pagu') < $kegiatan->sumTotal() ? 'text-danger' : 'text-dark' }}">
                            @currency($kegiatan->sumTotal())
                        </b>
                    </td>
                    <td class="text-center p-1">
                        <div class="btn-group">
                            <a href="{{ route('realisasi.subkegiatan', $kegiatan->uuid) }}"
                                class="btn btn-info btn-icon ml-2 mb-2">
                                <i class="ik ik-corner-down-right"></i>
                            </a>
                        </div>
                        <div class="btn-group">
                            @if ($kegiatan->realisasi_kegiatan->count() < 4) <button
                                class="btn btn-sm btn-success btn-icon mb-2" data-toggle="collapse"
                                href="#kegiatan-{{ $kegiatan->uuid }}" role="button" aria-expanded="false"
                                aria-controls="kegiatan-{{ $kegiatan->uuid }}">
                                <i class="fas fa-plus fa-fw"></i>
                                </button>
                                @endif
                        </div>
                    </td>
                </tr>
                @if ($kegiatan->realisasi_kegiatan->count() < 4) 
                {{-- tombol create --}}
                    @include('livewire.realisasi.kegiatan.create') 
                {{-- /. tombol create --}} 
                @endif 
                {{-- tampilan realisasi --}} 
                    @include('livewire.realisasi.kegiatan.realisasi') 
                {{-- /. tampilan realisasi --}}
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