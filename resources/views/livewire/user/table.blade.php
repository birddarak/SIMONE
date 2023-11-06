<div>
    <table id="advanced_table" class="table">
        <thead>
            <tr>
                <th class="text-center">NO</th>
                <th>USERNAME</th>
                <th>EMAIL</th>
                <th>AKUN</th>
                <th>Aksi</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            @foreach ($users as $user)
            <tr>
                <td class="text-center">{{ $loop->iteration }}</td>
                <td>{{ $user->username }}</td>
                <td>{{ $user->email }}</td>
                @if ($user->pegawai)
                <td>{{ $user->pegawai->nama }}</td>
                @else
                <td class="text-danger">{{ '-- Kosong --' }}</td>
                @endif
                <td>
                    <div class="list-actions d-flex justify-content-around form-inline">
                        {{-- edit yg pindah page ke form edit --}}
                        {{-- @livewire('user.form-edit', ['user' => $user]) --}}
                        {{-- --}}
                        <form action="{{ route( 'user.destroy', $user->uuid) }}" method="POST">
                            @csrf
                            @method('delete')
                            <button class="btn btn-sm" data-toggle="tooltip" data-placement="top" title="Hapus {{ str()->words($user->username, 2, ' ...') }}"
                                onclick="return confirm('Ingin menghapus {{ $user->username }} dari tabel?')"><i
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