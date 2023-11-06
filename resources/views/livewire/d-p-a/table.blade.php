<div>
    {{-- menggunakan data ini agar dapat dipakai saat store ke database????? --}}
    <div class="row mb-4">
        <div class="col-12 col-md-3">
            <select class="form-control" wire:model.live='tahun_anggaran'>
                @for ($i = 2019; $i <= date('Y'); $i++)
                    <option value="{{ $i }}">
                        {{ $i }}
                    </option>
                @endfor
            </select>
        </div>
        <div class="col-12 col-md-3">
            <select class="form-control" wire:model='apbd'>
                <option value="murni">MURNI</option>
                <option value="perubahan">PERUBAHAN</option>
            </select>
        </div>
    </div>

    <table class="table table-sm">
        <thead class="thead-dark">
            <tr>
                <th class="text-center">KODE</th>
                <th>PROGRAM</th>
                <th>PENANGGUNG JAWAB</th>
                <th>SEBELUM PERUBAHAN</th>
                <th>PAGU VALIDASI</th>
                <th>RINCIAN</th>
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
                            {{ $message }}
                        </span>
                    @enderror
                </td>
                <td>
                    <input type="text" placeholder="PROGRAM"
                        class="form-control @error('program')
                    is-invalid
                @enderror"
                        wire:model='program'>

                    @error('program')
                        <span class="text-danger">
                            {{ $message }}
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
                            {{ $message }}
                        </span>
                    @enderror
                </td>
                <td>
                </td>
                <td>
                </td>
                <td>
                </td>
                <td>
                    <button class="btn btn-primary btn-sm btn-block" wire:click='simpan'>
                        <i class="ik ik-save"></i>
                    </button>
                </td>
            </tr>
            @foreach ($programs as $program)
                <tr>
                    <td>
                        <input type="text" value="{{ $program->kode }}"
                            wire:blur="update('{{ $program->uuid }}','kode',$event.target.value)">
                    </td>
                    <td>
                        <input type="text" value="{{ $program->title }}"
                            wire:blur="update('{{ $program->uuid }}', 'title', $event.target.value)">
                    </td>
                    <td>
                        <select wire:change="update('{{ $program->uuid }}', 'pegawai_id', $event.target.value)"
                            class="form-control @error('pegawai_id')
                        is-invalid
                    @enderror"
                            style="width: 100% !important;">
                            <option value="">Pilih</option>
                            @forelse ($pegawais as $pegawai)
                                <option value="{{ $pegawai->id }}"
                                    {{ $pegawai->id == $program->pegawai_id ? 'selected' : '' }}>
                                    {{ $pegawai->nama }}
                                </option>
                            @empty
                                <option value="">Kosong</option>
                            @endforelse
                        </select>
                    </td>
                    <td>@currency($program->pagu_awal)</td>
                    <td>@currency($program->pagu_akhir)</td>
                    <td>total pagu</td>
                    <td>
                        <div class="list-actions d-flex justify-content-around form-inline">
                            {{-- edit yg pindah page ke form edit --}}
                            {{-- @livewire('program.form-edit', ['program' => $program]) --}}
                            {{-- --}}
                            <button class="btn btn-sm" onclick="return confirm('Ingin menghapus Program ini?')"
                                wire:click='delete("{{ $program->uuid }}")'><i class="ik ik-trash-2"></i></button>
                        </div>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
