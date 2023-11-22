<div>
    @include('livewire.partials.card-subkegiatan')
    <div class="table-responsive">
        @include('livewire.partials.alert')
        <table class="table table-sm">
            <thead class="thead-light">
                <tr>
                    <th class="text-center">KODE</th>
                    <th>SUB KEGIATAN</th>
                    <th class="text-center">TARGET</th>
                    <th>PENANGGUNG JAWAB</th>
                    <th>PAGU</th>
                    <th>AKSI</th>
                </tr>
            </thead>
            <tbody>
                @include('livewire.d-p-a.subkegiatan.create')
                {{-- data --}}
                @forelse ($subKegiatans as $subkegiatan)
                <tr class="bg-light">
                    <td>
                        <input type="text" value="{{ $subkegiatan->kode }}"
                            wire:blur="updateSubkegiatan('{{ $subkegiatan->uuid }}', 'kode', $event.target.value)"
                            class="form-control border-bottom border-primary">
                    </td>
                    <td>
                        <input type="text" value="{{ $subkegiatan->title }}"
                            wire:blur="updateSubkegiatan('{{ $subkegiatan->uuid }}', 'title', $event.target.value)"
                            class="form-control border-bottom border-primary">
                    </td>
                    <td  class="d-flex justify-content-center">
                        <input type="text" value="{{ $subkegiatan->target }}"
                            wire:blur="updateProgram('{{ $subkegiatan->uuid }}', 'target', $event.target.value)"
                            class="form-control border-bottom border-primary">/
                        <input type="text" value="{{ $subkegiatan->satuan }}"
                            wire:blur="updateProgram('{{ $subkegiatan->uuid }}', 'satuan', $event.target.value)"
                            class="form-control border-bottom border-primary">
                    </td>
                    <td>
                        <select
                            wire:change="updateSubkegiatan('{{ $subkegiatan->uuid }}', 'pegawai_id', $event.target.value)"
                            class="form-control border-bottom border-primary"
                            style="width: 100% !important;">
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
                        <div class="list-actions d-flex justify-content-start form-inline">
                            <input type="number" value="{{ $subkegiatan->pagu }}"
                                wire:blur="updateSubkegiatan('{{ $subkegiatan->uuid }}', 'pagu', $event.target.value)"
                                class="form-control border-bottom border-primary">
                                <span class="ml-2">
                                    <strong>(@currency($subkegiatan->pagu))</strong>
                                </span>
                        </div>
                    </td>
                    <td>
                        <div class="list-actions d-flex justify-content-around form-inline">
                            <button class="btn btn-danger btn-icon ml-2 mb-2" onclick="return confirm('Ingin menghapus Sub Kegiatan ini?')"
                                wire:click.prevent='destroySubkegiatan("{{ $subkegiatan->uuid }}")'><i
                                    class="ik ik-trash-2"></i></button>
                        </div>
                    </td>
                </tr>
                @include('livewire.d-p-a.subkegiatan.create-indikator')
                @include('livewire.d-p-a.subkegiatan.indikator')
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