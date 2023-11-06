<div>
    {{-- menggunakan data ini agar dapat dipakai saat store ke database????? --}}
    {{-- <form action="{{ route('dpa') }}" method="POST">
        @csrf
        <select>
            @for ($i = 2017; $i <= date('Y'); $i++ )
            <option value="{{ $i }}">{{ $i }}</option>
            @endfor
        </select>
        <select>
            <option value="Murni">Murni</option>
            <option value="Perubahan">Perubahan</option>
        </select>
        <button>Pilih</button>
    </form> --}}
    <table id="advanced_table" class="table">
        <thead>
            <tr>
                <th></th>
                <th class="text-center">NO</th>
                <th>PROGRAM</th>
                <th>SEBELUM PERUBAHAN</th>
                <th>PAGU VALIDASI</th>
                <th>RINCIAN</th>
                <th>PENANGGUNG JAWAB</th>
                <th>AKSI</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            @foreach ($programs as $program)
            <tr>
                <td class="text-center"><i class="btn btn-outline-info ik ik-log-in"></i></td>
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
                        <form action="{{ route( 'program.destroy', $program->uuid) }}" method="POST">
                            @csrf
                            @method('delete')
                            <button class="btn btn-sm" data-toggle="tooltip" data-placement="top" title="Hapus Program"
                                onclick="return confirm('Ingin menghapus Program ini?')"><i
                                    class="ik ik-trash-2"></i></button>
                        </form>
                    </div>
                </td>
                <td></td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>