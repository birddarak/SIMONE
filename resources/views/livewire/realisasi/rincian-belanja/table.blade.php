<div>
    @include('livewire.partials.card-rincian-belanja')
    <div class="table-responsive">
        @include('livewire.partials.alert')
        <table class="table table-sm">
            <thead class="thead-dark">
                <tr>
                    <th class="text-center">KODE</th>
                    <th>SUB KEGIATAN</th>
                    <th>TARGET</th>
                    <th>PENANGGUNG JAWAB</th>
                    <th>PAGU</th>
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
                        {{ $subkegiatan->target . ' ' . $subkegiatan->satuan }}
                    </td>
                    <td>
                        {{ $subkegiatan->pegawai->nama }}
                    </td>
                    <td>
                        @currency($subkegiatan->pagu)
                    </td>
                    <td colspan="2">
                        @php
                        $pagu_terserap = 0;
                        foreach ($subkegiatan->realisasi_subkegiatan as $rs) {
                        $pagu_terserap += $rs->pagu;
                        }
                        @endphp
                        <h6 class="m-0">
                            <strong class="{{ $subkegiatan->pagu == $pagu_terserap ? 'text-success' : 'text-danger' }}">
                                @currency($pagu_terserap)
                            </strong>
                        </h6>
                    </td>
                </tr>
                @include('livewire.realisasi.subkegiatan.create')
                @foreach ($subkegiatan->realisasi_subkegiatan()->orderBy('triwulan', 'ASC')->get() as $rs)
                <tr style="background-color: rgb(218, 218, 218);">
                    <td colspan="2">
                        <div class="d-flex">
                            <select style="width: 100% !important;" class="form-control">
                                <option value="I" {{ $rs->triwulan == 'I' ? 'selected' : '' }}>I</option>
                                <option value="II" {{ $rs->triwulan == 'II' ? 'selected' : '' }}>II</option>
                                <option value="III" {{ $rs->triwulan == 'III' ? 'selected' : '' }}>III
                                </option>
                                <option value="IV" {{ $rs->triwulan == 'IV' ? 'selected' : '' }}>IV</option>
                            </select>
                            <input type="date" class="form-control" value="{{ $rs->tanggal }}"
                                wire:blur="update('{{ $rs->uuid }}', 'tanggal', $event.target.value)">
                        </div>
                    </td>
                    <td>
                        <input type="text" value="{{ $rs->capaian }}"
                            class="d-inline form-control border-bottom border-primary"
                            wire:blur="update('{{ $rs->uuid }}', 'capaian', $event.target.value)" maxlength="5"
                            size="5">
                        <span class="d-inline"> / {{ $subkegiatan->satuan }}</span>
                    </td>
                    <td class="text-right">
                        <strong>@currency($rs->rincian_belanja->sum('pagu'))</strong>
                    </td>
                    <td></td>
                    <td class="text-center">
                        <div class="btn-group">
                            <a href="{{ route('realisasi.rincian-belanja', $rs->uuid) }}"
                                class="btn btn-warning btn-icon ml-2 mb-2">
                                <i class="ik ik-corner-down-right"></i>
                            </a>
                            <button class="btn btn-sm btn-transparent" onclick="return confirm('Ingin menghapus Realisasi ini?')" wire:click='destroy("{{ $rs->uuid }}")'>
                                <i class="ik ik-trash text-danger"></i>
                            </button>
                        </div>
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