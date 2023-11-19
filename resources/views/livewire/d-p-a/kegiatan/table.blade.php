<div>
    @include('livewire.partials.card-kegiatan')
    <div class="table-responsive">
        @include('livewire.partials.alert')
        <table class="table table-sm">
            <thead class="thead-light">
                <tr>
                    <th class="text-center">KODE</th>
                    <th>KEGIATAN</th>
                    <th>PENANGGUNG JAWAB</th>
                    <th>PAGU VALIDASI</th>
                    <th>AKSI</th>
                </tr>
            </thead>
            <tbody>
                @include('livewire.d-p-a.kegiatan.create')

                {{-- data --}}
                @forelse ($kegiatans as $kegiatan)
                <tr class="bg-light">
                    <td>
                        <input type="text" value="{{ $kegiatan->kode }}"
                            wire:blur="updateKegiatan('{{ $kegiatan->uuid }}', 'kode', $event.target.value)"
                            class="form-control border-left border-right border-primary">
                    </td>
                    <td>
                        <input type="text" value="{{ $kegiatan->title }}"
                            wire:blur="updateKegiatan('{{ $kegiatan->uuid }}', 'title', $event.target.value)"
                            class="form-control border-left border-right border-primary">
                    </td>
                    <td>
                        <select wire:change="updateKegiatan('{{ $kegiatan->uuid }}', 'pegawai_id', $event.target.value)"
                            class="form-control border-left border-right border-primary"
                            style="width: 100% !important;">
                            <option value="">Pilih</option>
                            @forelse ($pegawais as $pegawai)
                            <option value="{{ $pegawai->uuid }}" {{ $pegawai->id == $kegiatan->pegawai_id ? 'selected' :
                                '' }}>
                                {{ $pegawai->nama }}
                            </option>
                            @empty
                            <option value="">Kosong</option>
                            @endforelse
                        </select>
                    </td>
                    <td>
                        @php
                        $pagu_validasi = 0;
                        foreach ($kegiatan->subkegiatan as $sub) {
                        $pagu_validasi += $sub->pagu_awal;
                        }
                        @endphp
                        @currency($pagu_validasi)
                    </td>
                    <td>
                        <div class="list-actions d-flex justify-content-around form-inline">
                            <a href="{{ route('dpa.subkegiatan', $kegiatan->uuid) }}"
                                class="btn btn-warning btn-icon ml-2 mb-2">
                                <i class="ik ik-corner-down-right"></i>
                            </a>
                            <button class="btn btn-danger btn-icon ml-2 mb-2"
                                onclick="return confirm('Ingin menghapus Kegiatan ini?')"
                                wire:click.prevent='destroyKegiatan("{{ $kegiatan->uuid }}")'><i
                                    class="ik ik-trash-2"></i></button>
                        </div>
                    </td>
                </tr>
                @include('livewire.d-p-a.kegiatan.create-indikator')
                @include('livewire.d-p-a.kegiatan.indikator')
                @empty
                <tr class="">
                    <td class="text-center" colspan="5">Kegiatan Masih Kosong</td>
                </tr>
                @endforelse
                {{-- --}}

            </tbody>
        </table>
    </div>
</div>