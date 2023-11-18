<div>
    @include('livewire.partials.card-subkegiatan')
    <div class="table-responsive">
        @include('livewire.partials.alert')
        <table class="table table-sm">
            <thead class="thead-dark">
                <tr>
                    <th class="text-center">KODE</th>
                    <th>SUB KEGIATAN</th>
                    <th>PENANGGUNG JAWAB</th>
                    <th>PAGU VALIDASI</th>
                    <th>AKSI</th>
                </tr>
            </thead>
            <tbody>
                @include('livewire.d-p-a.subkegiatan.create')
                {{-- data --}}
                @forelse ($subKegiatans as $subkegiatan)
                <tr>
                    <td>
                        <input type="text" value="{{ $subkegiatan->kode }}"
                            wire:blur="update('{{ $subkegiatan->uuid }}', 'kode', $event.target.value)"
                            class="form-control">
                    </td>
                    <td>
                        <input type="text" value="{{ $subkegiatan->title }}"
                            wire:blur="update('{{ $subkegiatan->uuid }}', 'title', $event.target.value)"
                            class="form-control">
                    </td>
                    <td>
                        <select wire:change="update('{{ $subkegiatan->uuid }}', 'pegawai_id', $event.target.value)"
                            class="form-control" style="width: 100% !important;">
                            <option value="">Pilih</option>
                            @forelse ($pegawais as $pegawai)
                            <option value="{{ $pegawai->uuid }}" {{ $pegawai->id == $subkegiatan->pegawai_id ?
                                'selected' : '' }}>
                                {{ $pegawai->nama }}
                            </option>
                            @empty
                            <option value="">Kosong</option>
                            @endforelse
                        </select>
                    </td>
                    <td>
                        <div class="input-group">
                            <span class="btn">
                                Rp.
                            </span>
                            <input type="text" value="{{ $subkegiatan->pagu_awal }}"
                                wire:blur="update('{{ $subkegiatan->uuid }}', 'pagu_awal', $event.target.value)"
                                class="form-control">
                            <strong>(@currency($subkegiatan->pagu_awal))</strong>
                        </div>
                    </td>
                    <td>
                        <div class="list-actions d-flex justify-content-around form-inline">
                            <button class="btn btn-sm" onclick="return confirm('Ingin menghapus Sub Kegiatan ini?')"
                                wire:click.prevent='destroy("{{ $subkegiatan->uuid }}")'><i
                                    class="ik ik-trash-2"></i></button>
                        </div>
                    </td>
                </tr>
                @empty
                <tr class="">
                    <td class="text-center" colspan="5">Sub Kegiatan Masih Kosong</td>
                </tr>
                @endforelse
                {{-- --}}

            </tbody>
        </table>
    </div>
</div>