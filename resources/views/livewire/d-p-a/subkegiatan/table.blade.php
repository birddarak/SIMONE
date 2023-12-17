<div>
    @include('livewire.partials.card-subkegiatan')
    <div class="table-responsive">
        <table class="mb-3">
            <tr>
                <td>
                    <i class="fas fa-circle fa-fw text-form-subkegiatan"></i>
                </td>
                <td>:</td>
                <td>
                    <i>
                        Form Penginputan Sub Kegiatan (Klik Tombol + di samping kanan tulisan AKSI untuk menampilkan
                        form)
                    </i>
                </td>
            </tr>
            <tr>
                <td>
                    <i class="fas fa-circle fa-fw text-form-indikator-subkegiatan"></i>
                </td>
                <td>:</td>
                <td>
                    <i>
                        Form Penginputan indikator Sub Kegiatan (Klik Tombol + di baris data Sub Kegiatan dan di samping
                        tombol
                        aksi sub kegiatan)
                    </i>
                </td>
            </tr>
        </table>
        <table class="table custom-bordered-table">
            <thead class="thead-dark">
                <tr>
                    <th class="text-center">KODE</th>
                    <th>SUB KEGIATAN</th>
                    <th class="text-center">TARGET</th>
                    <th>PENANGGUNG JAWAB</th>
                    <th>PAGU</th>
                    <th>AKSI</th>
                    <th class="text-center">
                        <button class="btn btn-success btn-icon btn-sm" data-toggle="collapse"
                            href="#collapse-subkegiatan" role="button" aria-expanded="false"
                            aria-controls="collapse-subkegiatan">
                            <i class="fas fa-plus fa-fw"></i>
                        </button>
                    </th>
                </tr>
            </thead>
            <tbody>
                @include('livewire.d-p-a.subkegiatan.create')
                {{-- data --}}
                @forelse ($subKegiatans as $subkegiatan)
                <tr class="bg-light">
                    <td class="p-1">
                        <input type="text" value="{{ $subkegiatan->kode }}"
                            wire:blur="updateSubkegiatan('{{ $subkegiatan->uuid }}', 'kode', $event.target.value)"
                            wire:keydown.enter="updateSubkegiatan('{{ $subkegiatan->uuid }}', 'kode', $event.target.value)"
                            class="form-control">
                    </td>
                    <td class="p-1">
                        <textarea type="text"
                            wire:blur="updateSubkegiatan('{{ $subkegiatan->uuid }}', 'title', $event.target.value)"
                            wire:keydown.enter="updateSubkegiatan('{{ $subkegiatan->uuid }}', 'title', $event.target.value)"
                            class="form-control" rows="3">{{ $subkegiatan->title }}</textarea>
                    </td>
                    <td class="p-1 col-2">
                        <div class="input-group mb-0">
                            <input type="text" value="{{ $subkegiatan->target }}"
                                wire:blur="updateSubkegiatan('{{ $subkegiatan->uuid }}', 'target', $event.target.value)"
                                wire:keydown.enter="updateSubkegiatan('{{ $subkegiatan->uuid }}', 'target', $event.target.value)"
                                class="form-control col-3">
                            <div class="btn btn-transparent">
                                /
                            </div>
                            <input type="text" value="{{ $subkegiatan->satuan }}"
                                wire:blur="updateSubkegiatan('{{ $subkegiatan->uuid }}', 'satuan', $event.target.value)"
                                wire:keydown.enter="updateSubkegiatan('{{ $subkegiatan->uuid }}', 'satuan', $event.target.value)"
                                class="form-control col-9">
                        </div>
                    </td>
                    <td class="p-1">
                        <select
                            wire:change="updateSubkegiatan('{{ $subkegiatan->uuid }}', 'pegawai_id', $event.target.value)"
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
                    <td class="p-1 text-right">
                        <div class="list-actions d-flex justify-content-start form-inline">
                            <input type="number" value="{{ $subkegiatan->pagu }}"
                                wire:blur="updateSubkegiatan('{{ $subkegiatan->uuid }}', 'pagu', $event.target.value)"
                                wire:keydown.enter="updateSubkegiatan('{{ $subkegiatan->uuid }}', 'pagu', $event.target.value)"
                                class="form-control">
                            <span class="ml-2">
                                <strong>(@currency($subkegiatan->pagu))</strong>
                            </span>
                        </div>
                    </td>
                    <td class="p-1 text-center">
                        @if ($subkegiatan->realisasi_subkegiatan->count() == 0)
                        <button class="btn btn-danger btn-icon"
                            onclick="return confirm('Ingin menghapus Sub Kegiatan ini?')"
                            wire:click.prevent='destroySubkegiatan("{{ $subkegiatan->uuid }}")'><i
                                class="ik ik-trash-2"></i></button>
                        @endif
                    </td>
                    <td>
                        <button class="btn btn-success btn-icon btn-sm" data-toggle="collapse"
                            href="#collapse-{{ $subkegiatan->uuid }}-sk" role="button" aria-expanded="false"
                            aria-controls="collapse-{{ $subkegiatan->uuid }}-sk">
                            <i class="fas fa-plus fa-fw"></i>
                        </button>
                    </td>
                </tr>
                @include('livewire.d-p-a.subkegiatan.create-indikator')
                @include('livewire.d-p-a.subkegiatan.indikator')
                @empty
                <tr class="">
                    <td class="text-center" colspan="7">Sub Kegiatan Masih Kosong</td>
                </tr>
                @endforelse
                {{-- --}}

            </tbody>
        </table>
    </div>
</div>