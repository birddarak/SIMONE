<div>
    @include('livewire.partials.card-subkegiatan')
    @include('livewire.partials.alert')
    <div class="table-responsive">
        <table class="table custom-bordered-table">
            <thead class="thead-dark">
                <tr>
                    <th class="text-center">KODE</th>
                    <th>SUB KEGIATAN</th>
                    <th>PENANGGUNG JAWAB</th>
                    <th class="text-center">TARGET</th>
                    <th class="text-center">PAGU</th>
                    <th class="text-center">PAGU TERSERAP</th>
                    <th class="text-center">
                        <i class="fas fa-cog fa-fw"><i>
                    </th>
                </tr>
            </thead>
            <tbody>

                {{-- data --}}
                @forelse ($subkegiatans as $subkegiatan)
                <tr style="background-color: #FFD966">
                    <th>
                        {{ $subkegiatan->kode }}
                    </th>
                    <th class="col-2">
                        {{ $subkegiatan->title }}
                    </th>
                    <th>
                        {{ $subkegiatan->pegawai->nama }}
                    </th>
                    <th class="text-center">
                        {{ $subkegiatan->target . ' ' . $subkegiatan->satuan }}
                    </th>
                    <th class="text-right">
                        <b>
                            @currency($subkegiatan->pagu)
                        </b>
                    </th>
                    <th class="text-right">
                        <b class="{{ $subkegiatan->pagu < $subkegiatan->sumTotal() ? 'text-danger' : 'text-dark' }}">
                            @currency($subkegiatan->sumTotal())
                        </b>
                    </th>
                    <th class="text-center ">
                        @if ($subkegiatan->realisasi_subkegiatan->count() < 4) <button
                            class="btn btn-sm btn-transparent" data-toggle="collapse"
                            href="#subkegiatan-{{ $subkegiatan->uuid }}" role="button" aria-expanded="false"
                            aria-controls="subkegiatan-{{ $subkegiatan->uuid }}">
                            <i class="fas fa-plus fa-fw"></i>
                            </button>
                            @endif
                            </td>
                </tr>
                @if ($subkegiatan->realisasi_subkegiatan->count() < 4) 
                {{-- tombol create --}}
                    @include('livewire.realisasi.subkegiatan.create') 
                {{-- /. tombol create --}} 
                @endif 
                {{-- tampilan realisasi --}} 
                    @include('livewire.realisasi.subkegiatan.realisasi') 
                {{-- /. tampilan realisasi --}}
                @empty
                <tr class="">
                    <td class="text-center" colspan="7">Sub Kegiatan Masih Kosong, Mohon Tambahkan dimenu DPA</td>
                </tr>
                @endforelse

            </tbody>
        </table>
    </div>
</div>