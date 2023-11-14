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
                    <td class="col-3">PROGRAM</td>
                    <td>:</td>
                    <td><b>{{ $kegiatan->program->title }}</b></td>
                </tr>
                <tr>
                    <td class="col-3">UNIT PENANGGUNG JAWAB</td>
                    <td>:</td>
                    <td><b>{{ $kegiatan->program->pegawai->nama }}</b></td>
                </tr>
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
                    <td class="col-3">PAGU PROGRAM</td>
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
            </table>
        </div>
    </div>
    <div class="table-responsive">
        <table class="table table-sm">
            <thead class="thead-dark">
                <tr>
                    <th class="text-center">KODE</th>
                    <th>SUB KEGIATAN</th>
                    <th>PENANGGUNG JAWAB</th>
                    <th>PAGU VALIDASI</th>
                    <th>PAGU TERSERAP</th>
                    {{-- <th>TW</th>
                    <th>TARGET / SATUAN</th>
                    <th>PAGU</th>
                    <th>RINCIAN</th>
                    <th>FILE</th> --}}
                    <th>AKSI</th>
                </tr>
            </thead>
            <tbody>

                {{-- data --}}
                @foreach ($subkegiatans as $subkegiatan)
                    <tr class="text-primary">
                        <td>
                            <i class="fas fa-arrow-right"></i>
                            {{ $subkegiatan->kode }}
                        </td>
                        <td>
                            {{ $subkegiatan->title }}
                        </td>
                        <td>
                            {{ $subkegiatan->pegawai->nama }}
                        </td>
                        <td>
                            @currency($subkegiatan->pagu_awal)
                        </td>
                        <td>
                            @php
                                $pagu_terserap = 0;
                                foreach ($subkegiatan->realisasi_subkegiatan as $rs) {
                                    $pagu_terserap += $rs->pagu;
                                }
                            @endphp
                            <h5 class="m-0">
                                <strong
                                    class="{{ $subkegiatan->pagu_awal == $pagu_terserap ? 'text-success' : 'text-danger' }}">
                                    @currency($pagu_terserap)
                                </strong>
                            </h5>

                        </td>
                        <td colspan="5">
                        </td>
                        <td>
                            <div class="list-actions d-flex justify-content-around form-inline">
                                {{-- <a href="{{ route('realisasi.subkegiatan', $kegiatan->uuid) }}" class="btn btn-sm">
                            <i class="ik ik-corner-down-right"></i>
                        </a> --}}
                            </div>
                        </td>
                    </tr>
                    <tr class="bg-info text-white">
                        <td>
                            Triwulan
                        </td>
                        <td>
                            Target & Satuan
                        </td>
                        <td>
                            Pagu
                        </td>
                        <td>
                            Rincian
                        </td>
                        <td>
                            File
                        </td>
                        <td>
                            <i class="fas fa-cog fa-fw"></i>
                        </td>
                    </tr>
                    <tr>
                        {{-- <td colspan="5"></td> --}}
                        <td>
                            <select class="form-control form-control-sm" wire:model='triwulan'>
                                <option>.::PILIH TRIWULAN::.</option>
                                <option value="I">I</option>
                                <option value="II">II</option>
                                <option value="III">III</option>
                                <option value="IV">IV</option>
                            </select>
                            @error('triwulan')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </td>
                        <td class="d-flex justify-content-center">
                            <input type="text" class="form-control" placeholder="TARGET" wire:model='target'>
                            @error('target')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                            /
                            <input type="text" class="form-control" placeholder="SATUAN" wire:model='satuan'>
                            @error('target')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </td>
                        <td>
                            <div class="input-group">
                                <span class="btn">
                                    Rp.
                                </span>
                                <input type="number" class="form-control" wire:model='pagu'>
                            </div>
                            @error('pagu')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </td>
                        <td>
                            <input type="text" class="form-control" placeholder="RINCIAN" wire:model='rincian'>
                            @error('rincian')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </td>
                        <td>
                            <input type="file" class="form-control" placeholder="FILE" wire:model='file'>
                            @error('file')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </td>
                        <td>
                            <button class="btn  btn-primary" wire:click='simpan("{{ $subkegiatan->uuid }}")'>
                                <i class="fas fa-save"></i>
                            </button>
                        </td>
                    </tr>
                    @foreach ($subkegiatan->realisasi_subkegiatan()->orderBy('triwulan', 'ASC')->get() as $rs)
                        <tr>
                            {{-- <td colspan="5"></td> --}}
                            <td>
                                <select style="width: 100% !important;" class="form-control">
                                    <option value="I" {{ $rs->triwulan == 'I' ? 'selected' : '' }}>I</option>
                                    <option value="II" {{ $rs->triwulan == 'II' ? 'selected' : '' }}>II</option>
                                    <option value="III" {{ $rs->triwulan == 'III' ? 'selected' : '' }}>III</option>
                                    <option value="IV" {{ $rs->triwulan == 'IV' ? 'selected' : '' }}>IV</option>
                                </select>
                            </td>
                            <td class="d-flex justify-content-center">
                                <input type="text" value="{{ $rs->target }}" class="form-control"
                                    wire:blur="update('{{ $rs->uuid }}', 'target', $event.target.value)">
                                /
                                <input type="text" value="{{ $rs->satuan }}" class="form-control"
                                    wire:blur="update('{{ $rs->uuid }}', 'satuan', $event.target.value)">
                            </td>
                            <td>
                                <div class="d-flex">
                                    <input type="text" value="{{ $rs->pagu }}" class="form-control"
                                        wire:blur="update('{{ $rs->uuid }}', 'pagu', $event.target.value)"> =
                                    <strong>@currency($rs->pagu)</strong>
                                </div>
                            </td>
                            <td>
                                <input type="text" value="{{ $rs->keterangan }}" class="form-control"
                                    wire:blur="update('{{ $rs->uuid }}', 'keterangan', $event.target.value)">
                            </td>
                            <td>
                                <a href="{{ url('storage') . '/' . $rs->file }}">
                                    <i class="ik ik-file"></i>
                                </a>
                            </td>
                            <td>
                                <i class="ik ik-trash"></i>
                            </td>
                        </tr>
                    @endforeach
                @endforeach

            </tbody>
        </table>
    </div>
</div>
