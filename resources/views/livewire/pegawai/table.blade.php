<div>
    <div class="table-responsive">
        @include('livewire.partials.alert')
        <table class="table table-sm">
            <thead class="thead-dark">
                <tr>
                    <th>NO</th>
                    <th>NAMA</th>
                    <th>NIP</th>
                    <th>JABATAN</th>
                    <th>Aksi</th>
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
                            wire:blur="updatePegawai('{{ $pegawai->uuid }}', 'nama', $event.target.value)"
                            class="form-control">
                    </td>
                    <td>
                        <input type="text" value="{{ $pegawai->nip }}"
                            wire:blur="updatePegawai('{{ $pegawai->uuid }}', 'nip', $event.target.value)"
                            class="form-control">
                    </td>
                    <td>
                        <input type="text" value="{{ $pegawai->jabatan }}"
                            wire:blur="updatePegawai('{{ $pegawai->uuid }}', 'jabatan', $event.target.value)"
                            class="form-control">
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
                <tr>
                    <td class="collapse" id="collapse-{{ $pegawai->uuid }}" colspan="5">
                        <div class="card card-body">
                            <form action="" class="form-sample">
                                <div class="form-group row">
                                    <label for="" class="col-sm-2 col-form-label">Username</label>
                                    <div class="col-sm-9">
                                        <input type="text" value="{{ $pegawai->user->username }}"
                                            wire:blur="updateUser('{{ $pegawai->user->uuid }}', 'username', $event.target.value)"
                                            class="form-control">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="" class="col-sm-2 col-form-label">Email</label>
                                    <div class="col-sm-9">
                                        <input type="email" value="{{ $pegawai->user->email }}"
                                            wire:blur="updateUser('{{ $pegawai->user->uuid }}', 'email', $event.target.value)"
                                            class="form-control">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="" class="col-sm-2 col-form-label">Rule</label>
                                    <div class="col-sm-2">
                                        <select
                                            wire:change="updateUser('{{ $pegawai->user->uuid }}', 'rule', $event.target.value)"
                                            class="form-control" style="width: 100% !important;">
                                            <option value="">Pilih</option>
                                            <option value="kepala dinas" {{ ($pegawai->user->rule == 'kepala dinas') ?
                                                'selected' :
                                                '' }}>Kepala Dinas</option>
                                            <option value="kabid" {{ ($pegawai->user->rule == 'kabid') ? 'selected' : ''
                                                }}>Kabid
                                            </option>
                                            <option value="admin" {{ ($pegawai->user->rule == 'admin') ? 'selected' : ''
                                                }}>Admin
                                            </option>
                                        </select>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </td>
                </tr>
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