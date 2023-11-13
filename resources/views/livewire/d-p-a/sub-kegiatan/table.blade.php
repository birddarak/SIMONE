<div>
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
            <tr>
                <td>
                    <input type="text" placeholder="KODE"
                        class="form-control @error('kode')
                    is-invalid
                    @enderror"
                        wire:model="kode">

                    @error('kode')
                        <span class="text-danger">
                            Mohon isi Kode Program
                        </span>
                    @enderror
                </td>
                <td>
                    <input type="text" placeholder="SUB KEGIATAN"
                        class="form-control @error('subkegiatan')
                    is-invalid
                @enderror"
                        wire:model='subkegiatan'>

                    @error('subkegiatan')
                        <span class="text-danger">
                            Mohon isi Nama subkegiatan
                        </span>
                    @enderror
                </td>
                <td>
                    <select
                        class="form-control @error('pegawai_id')
                        is-invalid
                    @enderror"
                        wire:model="pegawai_id" style="width: 100% !important;">
                        <option value="">Pilih</option>
                        @forelse ($pegawais as $pegawai)
                            <option value="{{ $pegawai->uuid }}">{{ $pegawai->nama }}</option>
                        @empty
                            <option value="">Kosong</option>
                        @endforelse
                    </select>
                    @error('pegawai_id')
                        <span class="text-danger">
                            Mohon isi Penanggung Jawab
                        </span>
                    @enderror
                </td>
                <td>
                    <input type="text" placeholder="PAGU VALIDASI"
                        class="form-control @error('pagu_awal')
                is-invalid
            @enderror"
                        wire:model='pagu_awal'>

                    @error('pagu_awal')
                        <span class="text-danger">
                            Mohon isi Nama Pagu
                        </span>
                    @enderror
                </td>
                <td>
                    <button class="btn btn-primary btn-sm btn-block" wire:click='store'>
                        <i class="ik ik-save"></i>
                    </button>
                </td>
            </tr>
            {{-- --}}

            {{-- data --}}
            @foreach ($subKegiatans as $kegiatan)
                <tr>
                    <td>
                        <input type="text" value="{{ $kegiatan->kode }}"
                            wire:blur="update('{{ $kegiatan->uuid }}', 'kode', $event.target.value)"
                            class="form-control">
                    </td>
                    <td>
                        <input type="text" value="{{ $kegiatan->title }}"
                            wire:blur="update('{{ $kegiatan->uuid }}', 'title', $event.target.value)"
                            class="form-control">
                    </td>
                    <td>
                        <select wire:change="update('{{ $kegiatan->uuid }}', 'pegawai_id', $event.target.value)"
                            class="form-control" style="width: 100% !important;">
                            <option value="">Pilih</option>
                            @forelse ($pegawais as $pegawai)
                                <option value="{{ $pegawai->uuid }}"
                                    {{ $pegawai->id == $kegiatan->pegawai_id ? 'selected' : '' }}>
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
                            <input type="text" value="{{ $kegiatan->pagu_awal }}"
                                wire:blur="update('{{ $kegiatan->uuid }}', 'pagu_awal', $event.target.value)"
                                class="form-control">
                        </div>
                    </td>
                    <td>
                        <div class="list-actions d-flex justify-content-around form-inline">
                            <a href="{{ route('dpa.subkegiatan', $kegiatan->uuid) }}" class="btn btn-sm">
                                <i class="ik ik-file"></i>
                            </a>
                            {{-- <button class="btn btn-sm" onclick="return confirm('Ingin menghapus Program ini?')"
                                wire:click='destroy("{{ $program->uuid }}")'><i class="ik ik-trash-2"></i></button> --}}
                        </div>
                    </td>
                </tr>
            @endforeach
            {{-- --}}

        </tbody>
    </table>
</div>
