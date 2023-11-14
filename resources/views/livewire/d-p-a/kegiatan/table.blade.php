<div>
    <table class="table table-sm">
        <thead class="thead-dark">
            <tr>
                <th class="text-center">KODE</th>
                <th>KEGIATAN</th>
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
                            Mohon isi Kode Kegiatan
                        </span>
                    @enderror
                </td>
                <td>
                    <input type="text" placeholder="KEGIATAN"
                        class="form-control @error('kegiatan')
                    is-invalid
                @enderror"
                        wire:model='kegiatan'>

                    @error('kegiatan')
                        <span class="text-danger">
                            Mohon isi Nama Kegiatan
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
                <td> </td>
                <td>
                    <button class="btn btn-primary btn-sm btn-block" wire:click='store'>
                        <i class="ik ik-save"></i>
                    </button>
                </td>
            </tr>
            {{-- --}}

            {{-- data --}}
            @foreach ($kegiatans as $kegiatan)
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
                            <a href="{{ route('dpa.subkegiatan', $kegiatan->uuid) }}" class="btn btn-sm">
                                <i class="ik ik-corner-down-right"></i>
                            </a>
                            <button class="btn btn-sm" onclick="return confirm('Ingin menghapus Kegiatan ini?')"
                                wire:click='destroy("{{ $kegiatan->uuid }}")'><i class="ik ik-trash-2"></i></button>
                        </div>
                    </td>
                </tr>
            @endforeach
            {{-- --}}

        </tbody>
    </table>
</div>
