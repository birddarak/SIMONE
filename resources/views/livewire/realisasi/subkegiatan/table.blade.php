<div>
    @include('livewire.partials.card-subkegiatan')
    <div class="table-responsive">
        @include('livewire.partials.alert')
        <table class="table table-sm">
            <thead class="thead-dark">
                <tr>
                    <th class="text-center">KODE</th>
                    <th>SUB KEGIATAN</th>
                    <th>PENANGGUNG JAWAB</th>
                    <th>PAGU VALIDASI</th>
                    <th colspan="2">PAGU TERSERAP</th>
                </tr>
            </thead>
            <tbody>

                {{-- data --}}
                @forelse ($subkegiatans as $subkegiatan)
                    <tr class=" text-white" style="background-color: rgb(255, 191, 112);">
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
                        <td colspan="2">
                            @php
                                $pagu_terserap = 0;
                                foreach ($subkegiatan->realisasi_subkegiatan as $rs) {
                                    $pagu_terserap += $rs->pagu;
                                }
                            @endphp
                            <h6 class="m-0">
                                <strong
                                    class="{{ $subkegiatan->pagu_awal == $pagu_terserap ? 'text-success' : 'text-danger' }}">
                                    @currency($pagu_terserap)
                                </strong>
                            </h6>
                        </td>
                    </tr>
                    @include('livewire.realisasi.subkegiatan.create')
                    @foreach ($subkegiatan->realisasi_subkegiatan()->orderBy('triwulan', 'ASC')->get() as $rs)
                        <tr style="background-color: rgb(218, 218, 218);">
                            <td class="">
                                <div class="d-flex">
                                    <select style="width: 100% !important;" class="form-control">
                                        <option value="I" {{ $rs->triwulan == 'I' ? 'selected' : '' }}>I</option>
                                        <option value="II" {{ $rs->triwulan == 'II' ? 'selected' : '' }}>II</option>
                                        <option value="III" {{ $rs->triwulan == 'III' ? 'selected' : '' }}>III
                                        </option>
                                        <option value="IV" {{ $rs->triwulan == 'IV' ? 'selected' : '' }}>IV</option>
                                    </select>
                                </div>
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
                            <td class="text-center">
                                <a href="{{ url('storage') . '/' . $rs->file }}">
                                    <i class="ik ik-file"></i>
                                </a>
                            </td>
                            <td>
                                <div class="btn-group">
                                    <button class="btn btn-sm btn-transparent" data-toggle="collapse"
                                        href="#collapse-{{ $rs->uuid }}" role="button" aria-expanded="false"
                                        aria-controls="collapse-{{ $rs->uuid }}">
                                        <i class="fas fa-plus fa-fw"></i>
                                    </button>
                                    <button class="btn btn-sm btn-transparent"
                                        wire:click='destroy("{{ $rs->uuid }}")'>
                                        <i class="ik ik-trash text-danger"></i>
                                    </button>
                                </div>
                            </td>
                        </tr>
                        <tr style="background-color: rgb(237, 237, 237);" class="collapse"
                            id="collapse-{{ $rs->uuid }}">
                            <td class="text-right">
                                <i class="ik ik-corner-down-right fa-2x"></i>
                            </td>
                            <td colspan="">
                                <input type="text" class="form-control" placeholder="Deskripsi Rincian...">
                            </td>
                            <td>
                                <div class="input-group m-0">
                                    <span class="btn">
                                        Rp.
                                    </span>
                                    <input type="number" class="form-control" placeholder="Pagu">
                                </div>
                                @error('pagu')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </td>
                            <td>
                                <input type="date" class="form-control" placeholder="Tanggal" wire:model='tanggal'
                                    value="{{ date('Y-m-d') }}">
                            </td>
                            <td>
                                <input type="file" class="form-control" placeholder="FILE">
                                @error('file')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </td>
                            <td>
                                <button class="btn btn-sm btn-transaparent"
                                    wire:click='destroy("{{ $rs->uuid }}")'>
                                    <i class="ik ik-trash text-danger"></i>
                                </button>
                            </td>
                        </tr>
                    @endforeach
                @empty
                    <tr class="">
                        <td class="text-center" colspan="6">Sub Kegiatan Masih Kosong, Mohon Tambahkan dimenu DPA
                        </td>
                    </tr>
                @endforelse

            </tbody>
        </table>
    </div>
</div>
