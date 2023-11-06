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
                    <input type="text" placeholder="PROGRAM" class="form-control" wire:model='program'>
                </td>
                <td wire:ignore>
                    <select class="select2" wire:model="pegawai_id" style="width: 100% !important;">
                        @forelse ($pegawais as $pegawai)
                            <option value="{{ $pegawai->uuid }}">{{ $pegawai->nama }}</option>
                        @empty
                            <option value="">Pilih</option>
                        @endforelse
                    </select>
                </td>
                <td>
                </td>
                <td>
                </td>
                <td>
                </td>
                <td>
                    <button class="btn btn-primary btn-sm btn-block" wire:click='simpan'>
                        <ik class="ik ik-save"></ik>
                    </button>
                </td>
            </tr>
            @foreach ($programs as $program)
                <tr>
                    <td class="text-center">{{ $loop->iteration }}</td>
                    <td>{{ $program->kode . ' - ' . $program->title }}</td>
                    <td>@currency($program->pagu_awal)</td>
                    <td>@currency($program->pagu_akhir)</td>
                    <td>total pagu</td>
                    <td>{{ $program->pegawai->nama }}</td>
                    <td>
                        <div class="list-actions d-flex justify-content-around form-inline">
                            {{-- edit yg pindah page ke form edit --}}
                            {{-- @livewire('program.form-edit', ['program' => $program]) --}}
                            {{--  --}}
                            <form action="{{ route('program.destroy', $program->uuid) }}" method="POST">
                                @csrf
                                @method('delete')
                                <button class="btn btn-sm" data-toggle="tooltip" data-placement="top"
                                    title="Hapus Program" onclick="return confirm('Ingin menghapus Program ini?')"><i
                                        class="ik ik-trash-2"></i></button>
                            </form>
                        </div>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
