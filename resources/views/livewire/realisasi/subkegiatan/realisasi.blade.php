@if ($subkegiatan->realisasi_subkegiatan->count() >= 1)
<tr class="bg-secondary text-white text-center">
    <th rowspan="2"></th>
    <th rowspan="2">TRIWULAN</th>
    <th colspan="2">CAPAIAN</th>
    <th rowspan="2">TERSERAP</th>
    <th rowspan="2" class="text-center">
        <i class="fas fa-cog fa-fw"></i>
    </th>
</tr>
<tr class="bg-secondary text-white text-center">
    <th>KINERJA</th>
    <th>KEUANGAN</th>
</tr>
@foreach ($subkegiatan->realisasi_subkegiatan()->orderBy('triwulan', 'ASC')->get() as $rs)
<tr>
    <td></td>
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
        </div>
    </td>
    <td class="p-1 col-2">
        <div class="input-group m-0">
            <input type="number" value="{{ $rs->capaian }}" class="form-control col-5"
                wire:blur="update('{{ $rs->uuid }}', 'capaian', $event.target.value)">
            <span class="text-left btn btn-transparent col-7"> / {{ $subkegiatan->satuan }}</span>
        </div>
    </td>
    <td class="p-1 text-center col-2">
        {{ number_format(($rs->subkegiatan->pagu != 0 ?
        $rs->subkegiatan->sumTotalRincian($rs->triwulan) /
        $rs->subkegiatan->pagu : 0) * 100, 1, ',', '') . ' %'
        }}
    </td>
    <td class="p-1 text-right">
        @currency($rs->rincian_belanja->sum('pagu'))
    </td>
    <td class="text-center p-1">
        <div class="btn-group">
            <a href="{{ route('realisasi.rincian-belanja', $rs->uuid) }}" class="btn btn-info btn-icon ml-2 mb-2">
                <i class="ik ik-corner-down-right"></i>
            </a>
            @if ($rs->rincian_belanja->count() == 0)
            <button class="btn btn-danger btn-icon ml-2 mb-2" onclick="return confirm('Ingin menghapus Realisasi ini?')"
                wire:click='destroy("{{ $rs->uuid }}")'>
                <i class="ik ik-trash"></i>
            </button>
            @endif
        </div>
    </td>
</tr>
@endforeach
<tr>
    <td></td>
    <th>TOTAL</th>
    {{-- total --}}
    <td class="text-center">
        {{-- capaian kinerja --}}
            <strong
                class="{{ $subkegiatan->realisasi_subkegiatan->sum('capaian') >= $subkegiatan->target ? 'text-success' : 'text-dark' }}">
                {{ number_format(($subkegiatan->realisasi_subkegiatan->sum('capaian') /
                $subkegiatan->target * 100), 1, ',', '') . ' %' }}
            </strong>
    </td>
    <td class="text-center">
        {{-- capaian keuangan --}}
        @php
        $total_kinerja = $subkegiatan->sumTotalRincian("I") +
        $subkegiatan->sumTotalRincian("II") + $subkegiatan->sumTotalRincian("III") +
        $subkegiatan->sumTotalRincian("IV");
        @endphp
            <strong class="{{ $subkegiatan->pagu < $total_kinerja ? 'text-danger' : 'text-dark' }}">
                {{ number_format(($subkegiatan->pagu != 0 ? $total_kinerja /
                ($subkegiatan->pagu) : 0) * 100, 1, ',', '') . ' %' }}
            </strong>
    </td>
    <td class="text-right">
        @php
        $pagu_terserap = 0;
        foreach ($subkegiatan->realisasi_subkegiatan as $rs) {
        foreach ($rs->rincian_belanja as $rb) {
        $pagu_terserap += $rb->pagu;
        }
        }
        @endphp
            <strong class="{{ $subkegiatan->pagu < $pagu_terserap ? 'text-danger' : 'text-dark' }}">
                @currency($pagu_terserap)
            </strong>
    </td>
    <td></td>
</tr>
@endif