<div>
    @include('livewire.partials.card-subkegiatan')
    @include('livewire.partials.alert')
    <div class="table-responsive">
        <table class="table custom-bordered-table">
            <thead class="thead-dark">
                <tr>
                    <th class="text-center">KODE</th>
                    <th>SUB KEGIATAN</th>
                    <th>TARGET</th>
                    <th>PENANGGUNG JAWAB</th>
                    <th>PAGU</th>
                    <th>PAGU TERSERAP</th>
                    <th class="text-center">
                        <i class="fas fa-cog fa-fw"></i>
                    </th>
                </tr>
            </thead>
            <tbody>

                {{-- data --}}
                @forelse ($subkegiatans as $subkegiatan)
                    <tr class="">
                        <td class="p-1">
                            {{ $subkegiatan->kode }}
                        </td>
                        <td class="p-1">
                            {{ $subkegiatan->title }}
                        </td>
                        <td class="p-1">
                            {{ $subkegiatan->target . ' ' . $subkegiatan->satuan }}
                        </td>
                        <td class="p-1">
                            {{ $subkegiatan->pegawai->nama }}
                        </td>
                        <td class="p-1">
                            @currency($subkegiatan->pagu)
                        </td>
                        <td class="p-1">
                            @php
                                $pagu_terserap = 0;
                                foreach ($subkegiatan->realisasi_subkegiatan as $rs) {
                                    foreach ($rs->rincian_belanja as $rb) {
                                        $pagu_terserap += $rb->pagu;
                                    }
                                }
                            @endphp
                            <h6 class="m-0">
                                <strong
                                    class="{{ $subkegiatan->pagu == $pagu_terserap ? 'text-success' : 'text-danger' }}">
                                    @currency($pagu_terserap)
                                </strong>
                            </h6>
                        </td>
                        <td class="text-center p-1">
                            @if ($subkegiatan->realisasi_subkegiatan->count() < 4)
                                <button class="btn btn-sm btn-transparent" data-toggle="collapse"
                                    href="#subkegiatan-{{ $subkegiatan->uuid }}" role="button" aria-expanded="false"
                                    aria-controls="subkegiatan-{{ $subkegiatan->uuid }}">
                                    <i class="fas fa-plus fa-fw"></i>
                                </button>
                            @endif
                        </td>
                    </tr>
                    @if ($subkegiatan->realisasi_subkegiatan->count() < 4)
                        @include('livewire.realisasi.subkegiatan.create')
                    @endif
                    @foreach ($subkegiatan->realisasi_subkegiatan()->orderBy('triwulan', 'ASC')->get() as $rs)
                        <tr>
                            <td class="p-1"></td>
                            <td class="p-1">
                                <div class="input-group m-0">
                                    <select class="form-control">
                                        <option value="I" {{ $rs->triwulan == 'I' ? 'selected' : '' }}>I</option>
                                        <option value="II" {{ $rs->triwulan == 'II' ? 'selected' : '' }}>II</option>
                                        <option value="III" {{ $rs->triwulan == 'III' ? 'selected' : '' }}>III
                                        </option>
                                        <option value="IV" {{ $rs->triwulan == 'IV' ? 'selected' : '' }}>IV
                                        </option>
                                    </select>
                                    <input type="date" class="form-control" value="{{ $rs->tanggal }}"
                                        wire:blur="update('{{ $rs->uuid }}', 'tanggal', $event.target.value)">
                                </div>
                            </td>
                            <td class="p-1">
                                <div class="input-group m-0">
                                    <input type="text" value="{{ $rs->capaian }}" class="form-control"
                                        wire:blur="update('{{ $rs->uuid }}', 'capaian', $event.target.value)"
                                        maxlength="5" size="5">
                                    <span class="btn btn-sm btn-transparent"> / {{ $subkegiatan->satuan }}</span>
                                </div>
                            </td>
                            <td class="p-1"></td>
                            <td class="p-1"></td>
                            <td class="pv-1">
                                <strong class="m-0">@currency($rs->rincian_belanja->sum('pagu'))</strong>
                            </td>
                            <td class="text-center p-1">
                                <div class="btn-group">
                                    <a href="{{ route('realisasi.rincian-belanja', $rs->uuid) }}"
                                        class="btn btn-warning btn-icon ml-2 mb-2">
                                        <i class="ik ik-corner-down-right"></i>
                                    </a>
                                    @if ($rs->rincian_belanja->count() == 0)
                                        <button class="btn btn-sm btn-transparent"
                                            onclick="return confirm('Ingin menghapus Realisasi ini?')"
                                            wire:click='destroy("{{ $rs->uuid }}")'>
                                            <i class="ik ik-trash text-danger"></i>
                                        </button>
                                    @endif
                                </div>
                            </td>
                        </tr>
                        @include('livewire.realisasi.subkegiatan.create-rincian')
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
