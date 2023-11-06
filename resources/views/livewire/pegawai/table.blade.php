<div>
    <table id="advanced_table" class="table">
        <thead>
            <tr>
                <th class="text-center">NO</th>
                <th>NAMA</th>
                <th>NIP</th>
                <th>JABATAN</th>
                <th>Aksi</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            @foreach ($pegawais as $pegawai)
            <tr>
                <td class="text-center">{{ $loop->iteration }}</td>
                <td>{{ $pegawai->nama }}</td>
                <td>{{ $pegawai->nip }}</td>
                <td>{{ $pegawai->jabatan }}</td>
                <td>
                    <div class="list-actions d-flex justify-content-around form-inline">
                        {{-- edit yg pindah page ke form edit --}}
                        {{-- @livewire('pegawai.form-edit', ['pegawai' => $pegawai]) --}}
                        {{--  --}}
                        <form action="{{ route( 'pegawai.destroy', $pegawai->uuid) }}" method="POST">
                            @csrf
                            @method('delete')
                            <button class="btn btn-sm" data-toggle="tooltip" data-placement="top" title="Hapus {{ str()->words($pegawai->nama, 2, ' ...') }}"
                                onclick="return confirm('Ingin menghapus {{ $pegawai->nama }} dari tabel?')"><i
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