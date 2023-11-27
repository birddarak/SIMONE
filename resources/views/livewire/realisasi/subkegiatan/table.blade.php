<div>
    @include('livewire.partials.card-subkegiatan')
    @include('livewire.partials.alert')
    <div class="table-responsive">
        <table class="table custom-bordered-table">
            <thead class="thead-dark">
                <tr>
                    <th class="text-center">KODE</th>
                    <th>SUB KEGIATAN</th>
                    <th>PENANGGUNG JAWAB</th>
                    <th colspan="2" class="text-center">TARGET</th>
                    <th colspan="2" class="text-center">PAGU</th>
                    <th class="text-center">
                        <i class="fas fa-cog fa-fw"></i>
                    </th>
                </tr>
            </thead>
            <tbody>

                {{-- data --}}
                @forelse ($subkegiatans as $subkegiatan)
                <tr>
                    <td>
                        {{ $subkegiatan->kode }}
                    </td>
                    <td>
                        {{ $subkegiatan->title }}
                    </td>
                    <td>
                        {{ $subkegiatan->pegawai->nama }}
                    </td>
                    <td class="text-center" colspan="2">
                        {{ $subkegiatan->target . ' ' . $subkegiatan->satuan }}
                    </td>
                    <td colspan="2" class="text-right">
                        @currency($subkegiatan->pagu)
                    </td>
                    <td class="text-center ">
                        @if ($subkegiatan->realisasi_subkegiatan->count() < 4) <button
                            class="btn btn-sm btn-transparent" data-toggle="collapse"
                            href="#subkegiatan-{{ $subkegiatan->uuid }}" role="button" aria-expanded="false"
                            aria-controls="subkegiatan-{{ $subkegiatan->uuid }}">
                            <i class="fas fa-plus fa-fw"></i>
                            </button>
                            @endif
                    </td>
                </tr>
                @if ($subkegiatan->realisasi_subkegiatan->count() < 4) 
                {{-- tombol create --}}
                @include('livewire.realisasi.subkegiatan.create')
                {{-- /. tombol create --}}
                    @endif
                    {{-- tampilan realisasi --}}
                    @include('livewire.realisasi.subkegiatan.realisasi') 
                    {{-- /. tampilan realisasi --}}
                    
                    {{-- TOTAL KINERJA & KEUANGAN & TERSERAP--}}
                    @if ($subkegiatan->realisasi_subkegiatan->count() >= 1)
                    <tr>
                        <td class="" colspan="2"></td>
                        <td class="bg-dark text-white">TOTAL KINERJA & KEUANGAN</td>
                        <td class="text-center">
                            <h6 class="m-0">
                                <strong
                                    class="{{ $subkegiatan->realisasi_subkegiatan->sum('capaian') >= $subkegiatan->target ? 'text-success' : 'text-dark' }}">
                                    {{ number_format(($subkegiatan->realisasi_subkegiatan->sum('capaian') /
                                    $subkegiatan->target * 100), 1, ',', '') . ' %' }}
                                </strong>
                            </h6>
                        </td>
                        <td class="text-center col-1">
                            @php
                            $total_kinerja = $subkegiatan->sumTotalRincian("I") +
                            $subkegiatan->sumTotalRincian("II") + $subkegiatan->sumTotalRincian("III") +
                            $subkegiatan->sumTotalRincian("IV");
                            @endphp
                            <h6 class="m-0">
                                <strong
                                    class="{{ $total_kinerja >= $subkegiatan->pagu ? 'text-success' : 'text-dark' }}">
                                    {{ number_format(($subkegiatan->pagu != 0 ? $total_kinerja /
                                    ($subkegiatan->pagu) : 0) * 100, 1, ',', '') . ' %' }}
                                </strong>
                            </h6>

                        </td>
                        <td class="bg-dark text-white">TOTAL TERSERAP</td>
                        <td class="text-right">
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
                                    class="{{ $subkegiatan->pagu >= $pagu_terserap ? 'text-success' : 'text-danger' }}">
                                    @currency($pagu_terserap)
                                </strong>
                            </h6>
                        </td>
                    </tr>
                    @endif
                    @empty
                    <tr class="">
                        <td class="text-center" colspan="7">Sub Kegiatan Masih Kosong, Mohon Tambahkan dimenu DPA
                        </td>
                    </tr>
                    @endforelse

            </tbody>
        </table>
    </div>
</div>