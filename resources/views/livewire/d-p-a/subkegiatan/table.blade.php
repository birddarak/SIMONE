<div>
    <div class="card border border-2">
        <div class="card-body">
            <button onclick="window.history.back()" class="btn btn-light">
                <i class="fas fa-arrow-left"></i>
                Kembali
            </button>
            <br>
            <br>
            <table class="text-uppercase col-12">
                <tr>
                    <td class="col-3">TAHUN ANGGARAN</td>
                    <td>:</td>
                    <td><b>{{ $kegiatan->program->tahun_anggaran }}</b></td>
                </tr>
                <tr>
                    <td class="col-3">APBD</td>
                    <td>:</td>
                    <td><b>{{ $kegiatan->program->apbd }}</b></td>
                </tr>
                <tr>
                    <td class="col-3">PROGRAM</td>
                    <td>:</td>
                    <td><b>{{ $kegiatan->program->kode . ' ' . $kegiatan->program->title }}</b></td>
                </tr>
                <tr>
                    <td class="col-3">KEGIATAN</td>
                    <td>:</td>
                    <td><b>{{ $kegiatan->kode . ' ' . $kegiatan->title }}</b></td>
                </tr>
                <tr>
                    <td class="col-3">UNIT PENANGGUNG JAWAB</td>
                    <td>:</td>
                    <td><b>{{ $kegiatan->program->pegawai->nama }}</b></td>
                </tr>
                <tr>
                    <td class="col-3">PAGU KEGIATAN</td>
                    <td>:</td>
                    @php
                    $pagu_program = 0;
                    foreach ($kegiatan->program->kegiatan as $keg) {
                    foreach ($keg->subkegiatan as $sub) {
                    $pagu_program += $sub->pagu_awal;
                    }
                    }
                    @endphp
                    <td><b>@currency($pagu_program)</b></td>
                </tr>
                <tr>
                    <td class="col-3">PAGU TERSERAP</td>
                    <td>:</td>
                    @php
                    $pagu_program = 0;
                    $pagu_terserap = 0;
                    foreach ($kegiatan->program->kegiatan as $keg) {
                    foreach ($keg->subkegiatan as $sub) {
                    $pagu_program += $sub->pagu_awal;
                    foreach ($sub->realisasi_subkegiatan as $rs) {
                    $pagu_terserap += $rs->pagu;
                    }
                    }
                    }
                    @endphp
                    <td>
                        <b class="{{ $pagu_program == $pagu_terserap ? 'text-success' : 'text-danger' }}">
                            @currency($pagu_terserap)
                        </b>
                    </td>
                </tr>
            </table>
        </div>
    </div>
    <div class="table-responsive">
        @if(session()->has('message'))
        <div class="alert alert-success">
            {!! session('message') !!}
        </div>
        @endif
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
                        <input type="text" placeholder="KODE" class="form-control @error('kode')
                    is-invalid
                    @enderror" wire:model="kode">

                        @error('kode')
                        <span class="text-danger">
                            Mohon isi Kode Program
                        </span>
                        @enderror
                    </td>
                    <td>
                        <input type="text" placeholder="SUB KEGIATAN" class="form-control @error('subkegiatan')
                    is-invalid
                @enderror" wire:model='subkegiatan'>

                        @error('subkegiatan')
                        <span class="text-danger">
                            Mohon isi Nama subkegiatan
                        </span>
                        @enderror
                    </td>
                    <td>
                        <select class="form-control @error('pegawai_id')
                        is-invalid
                    @enderror" wire:model="pegawai_id" style="width: 100% !important;">
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
                        <input type="text" placeholder="PAGU VALIDASI" class="form-control @error('pagu_awal')
                is-invalid
            @enderror" wire:model='pagu_awal'>

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
                @forelse ($subKegiatans as $subkegiatan)
                <tr>
                    <td>
                        <input type="text" value="{{ $subkegiatan->kode }}"
                            wire:blur="update('{{ $subkegiatan->uuid }}', 'kode', $event.target.value)"
                            class="form-control">
                    </td>
                    <td>
                        <input type="text" value="{{ $subkegiatan->title }}"
                            wire:blur="update('{{ $subkegiatan->uuid }}', 'title', $event.target.value)"
                            class="form-control">
                    </td>
                    <td>
                        <select wire:change="update('{{ $subkegiatan->uuid }}', 'pegawai_id', $event.target.value)"
                            class="form-control" style="width: 100% !important;">
                            <option value="">Pilih</option>
                            @forelse ($pegawais as $pegawai)
                            <option value="{{ $pegawai->uuid }}" {{ $pegawai->id == $subkegiatan->pegawai_id ?
                                'selected' : '' }}>
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
                            <input type="text" value="{{ $subkegiatan->pagu_awal }}"
                                wire:blur="update('{{ $subkegiatan->uuid }}', 'pagu_awal', $event.target.value)"
                                class="form-control">
                            <strong>(@currency($subkegiatan->pagu_awal))</strong>
                        </div>
                    </td>
                    <td>
                        <div class="list-actions d-flex justify-content-around form-inline">
                            <button class="btn btn-sm" onclick="return confirm('Ingin menghapus Sub Kegiatan ini?')"
                                wire:click.prevent='destroy("{{ $subkegiatan->uuid }}")'><i
                                    class="ik ik-trash-2"></i></button>
                        </div>
                    </td>
                </tr>
                @empty
                <tr class="">
                    <td class="text-center" colspan="5">Sub Kegiatan Masih Kosong</td>
                </tr>
                @endforelse
                {{-- --}}

            </tbody>
        </table>
    </div>
</div>