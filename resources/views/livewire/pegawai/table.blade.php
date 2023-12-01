<div>
    <div class="table-responsive">
        @include('livewire.partials.alert')
        <table class="table custom-bordered-table">
            <thead class="thead-dark">
                <tr>
                    <th>NO</th>
                    <th>NAMA</th>
                    <th>NIP</th>
                    <th>JABATAN</th>
                    <th>USERNAME</th>
                    <th>EMAIL</th>
                    <th>ROLE</th>
                    <th><i class="fas fa-cog fa-fw"></i></th>
                </tr>
            </thead>
            <tbody>
                @include('livewire.pegawai.create')
                @forelse ($pegawais as $pegawai)
                    {{-- pegawai --}}
                    <tr>
                        <td>
                            {{ $loop->iteration }}
                        </td>
                        <td>
                            <input type="text" value="{{ $pegawai->nama }}"
                                wire:blur="updatePegawai('{{ $pegawai->uuid }}', 'nama', $event.target.value)" wire:keydown.enter="updatePegawai('{{ $pegawai->uuid }}', 'nama', $event.target.value)"
                                class="form-control">
                        </td>
                        <td>
                            <input type="text" value="{{ $pegawai->nip }}"
                                wire:blur="updatePegawai('{{ $pegawai->uuid }}', 'nip', $event.target.value)" wire:keydown.enter="updatePegawai('{{ $pegawai->uuid }}', 'nip', $event.target.value)"
                                class="form-control">
                        </td>
                        <td>
                            <input type="text" value="{{ $pegawai->jabatan }}"
                                wire:blur="updatePegawai('{{ $pegawai->uuid }}', 'jabatan', $event.target.value)" wire:keydown.enter="updatePegawai('{{ $pegawai->uuid }}', 'jabatan', $event.target.value)"
                                class="form-control">
                        </td>
                        <td>
                            {{ $pegawai->user->username }}
                        </td>
                        <td>
                            {{ $pegawai->user->email }}
                        </td>
                        <td>
                            {{ $pegawai->user->rule }}
                        </td>
                        <td>
                            <div class="list-actions d-flex justify-content-around form-inline">
                                <a class="btn btn-sm" data-toggle="collapse" href="#collapse-{{ $pegawai->uuid }}"
                                    role="button" aria-expanded="false" aria-controls="collapse-{{ $pegawai->uuid }}">
                                    <i class="ik ik-eye"></i>
                                </a>
                                <button class="btn btn-sm" onclick="return confirm('Ingin menghapus Program ini?')"
                                    wire:click='destroy("{{ $pegawai->uuid }}")'><i class="ik ik-trash-2"></i></button>
                            </div>
                        </td>
                    </tr>
                    {{-- detail user --}}
                    @include('livewire.pegawai.user')
                @empty
                    <tr class="">
                        <td class="text-center" colspan="5">Data Pegawai Masih Kosong, Silahkan Tambahkan .. :D</td>
                    </tr>
                @endforelse
                {{-- --}}

            </tbody>
        </table>
    </div>
</div>
