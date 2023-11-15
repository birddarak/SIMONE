<div>
    @if(session()->has('message'))
    <div class="alert alert-success">
        {!! session('message') !!}
    </div>
    @endif
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

            {{-- insert --}}
            {{-- pegawai --}}
            <tr>
                <td></td>
                <td>
                    <input type="text" placeholder="NAMA" class="form-control @error('nama')
                    is-invalid @enderror" wire:model="nama">

                    @error('nama')
                    <span class="text-danger">
                        Mohon isi Nama Pegawai
                    </span>
                    @enderror
                </td>
                <td>
                    <input type="text" placeholder="NIP" class="form-control @error('nip')
                    is-invalid @enderror" wire:model='nip'>

                    @error('nip')
                    <span class="text-danger">
                        Mohon isi NIP Pegawai
                    </span>
                    @enderror
                </td>
                <td>
                    <input type="text" placeholder="JABATAN" class="form-control @error('jabatan')
                    is-invalid @enderror" wire:model='jabatan'>

                    @error('jabatan')
                    <span class="text-danger">
                        Mohon isi Jabatan Pegawai
                    </span>
                    @enderror
                </td>
                <td>
                    <button class="btn btn-primary btn-sm btn-block" wire:click='store'>
                        <i class="ik ik-save"></i>
                    </button>
                </td>
            </tr>
            {{-- pegawai --}}
            {{-- user --}}
            <tr>
                <td></td>
                <td>
                    <input type="text" placeholder="USERNAME"
                        class="form-control @error('username') is-invalid @enderror" wire:model="username">

                    @error('username')
                    <span class="text-danger">
                        Mohon isi Username Akun
                    </span>
                    @enderror
                </td>
                <td>
                    <input type="email" placeholder="EMAIL" class="form-control @error('email') is-invalid @enderror"
                        wire:model="email">

                    @error('email')
                    <span class="text-danger">
                        Mohon isi Email Akun
                    </span>
                    @enderror
                </td>
                <td>
                    <select class="form-control @error('rule') is-invalid @enderror" wire:model="rule"
                        style="width: 100% !important">
                        <option value="">Pilih</option>
                        <option value="kepala dinas">Kepala Dinas</option>
                        <option value="kabid">Kabid</option>
                        <option value="pegawai">Pegawai</option>
                        <option value="admin">Admin</option>
                    </select>

                    @error('rule')
                    <span class="text-danger">
                        Mohon Pilih Rule Akun
                    </span>
                    @enderror
                </td>
                <td></td>
            </tr>
            {{-- user --}}
            {{-- insert --}}

            {{-- data --}}
            @foreach ($pegawais as $pegawai)
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
                        <a class="btn btn-sm" data-toggle="collapse" href="#collapse-{{ $pegawai->uuid }}" role="button"
                            aria-expanded="false" aria-controls="collapse-{{ $pegawai->uuid }}">
                            <i class="ik ik-eye"></i>
                        </a>
                        <button class="btn btn-sm" onclick="return confirm('Ingin menghapus Program ini?')"
                            wire:click='destroy("{{ $pegawai->uuid }}")'><i class="ik ik-trash-2"></i></button>
                    </div>
                </td>
            </tr>
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
                                        <option value="pegawai" {{ ($pegawai->user->rule == 'pegawai') ? 'selected' : ''
                                            }}>Pegawai
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
            @endforeach
            {{-- --}}

        </tbody>
    </table>
</div>