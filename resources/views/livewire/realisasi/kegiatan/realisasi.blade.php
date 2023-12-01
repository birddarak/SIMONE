@if ($kegiatan->realisasi_kegiatan->count() >= 1)
<tr class="bg-secondary text-white text-center">
    <th rowspan="2"></th>
    <th rowspan="2">TRIWULAN</th>
    <th colspan="2">CAPAIAN</th>
    <th rowspan="2" colspan="2">TERSERAP</th>
    <th rowspan="2" class="text-center">
        <i class="fas fa-cog fa-fw"></i>
    </th>
</tr>
<tr class="bg-secondary text-white text-center">
    <th>KINERJA</th>
    <th>KEUANGAN</th>
</tr>
@foreach ($kegiatan->realisasi_kegiatan()->orderBy('triwulan', 'ASC')->get() as $rk)
<tr>
    <td></td>
    <td class="p-1">
        <div class="input-group m-0">
            <select class="form-control"
                wire:change="update('{{ $rk->uuid }}', 'triwulan', $event.target.value)">
                <option value="I" {{ $rk->triwulan == 'I' ? 'selected' : '' }}>I</option>
                <option value="II" {{ $rk->triwulan == 'II' ? 'selected' : '' }}>II</option>
                <option value="III" {{ $rk->triwulan == 'III' ? 'selected' : '' }}>III
                </option>
                <option value="IV" {{ $rk->triwulan == 'IV' ? 'selected' : '' }}>IV
                </option>
            </select>
        </div>
    </td>
    <td class="p-1 col-2">
        <div class="input-group m-0">
            <input type="number" value="{{ $rk->capaian }}" class="form-control col-5"
                wire:blur="update('{{ $rk->uuid }}', 'capaian', $event.target.value)"
                wire:keydown.enter="update('{{ $rk->uuid }}', 'capaian', $event.target.value)">
            <span class="text-left btn btn-transparent col-7"> / {{ $kegiatan->satuan }}</span>
        </div>
    </td>
    <td class="p-1 text-center col-2">
        {{ number_format(($rk->kegiatan->subkegiatan->sum('pagu') != 0 ?
        $rk->kegiatan->sumTotalRincian($rk->triwulan) /
        $rk->kegiatan->subkegiatan->sum('pagu') : 0) * 100, 1, ',', '') . ' %'
        }}
    </td>
    <td class="p-1 text-right" colspan="2">
        @currency($rk->kegiatan->sumTotalRincian($rk->triwulan))
    </td>
    <td class="text-center p-1">
        <div class="btn-group">
            <button class="btn btn-danger btn-icon ml-2 mb-2" onclick="return confirm('Ingin menghapus Realisasi ini?')"
                wire:click='destroy("{{ $rk->uuid }}")'>
                <i class="ik ik-trash"></i>
            </button>
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
                class="{{ $kegiatan->realisasi_kegiatan->sum('capaian') >= $kegiatan->target ? 'text-success' : 'text-dark' }}">
                {{ number_format(($kegiatan->realisasi_kegiatan->sum('capaian') /
                $kegiatan->target * 100), 1, ',', '') . ' %' }}
            </strong>
    </td>
    @php
    $total_keuangan = $kegiatan->sumTotalRincian("I") +
    $kegiatan->sumTotalRincian("II") + $kegiatan->sumTotalRincian("III") +
    $kegiatan->sumTotalRincian("IV");
    @endphp
    <td class="text-center">
        {{-- capaian keuangan --}}
            <strong class="{{ $kegiatan->subkegiatan->sum('pagu') < $total_keuangan ? 'text-danger' : 'text-dark' }}">
                {{ number_format(($kegiatan->subkegiatan->sum('pagu') != 0 ? $total_keuangan /
                ($kegiatan->subkegiatan->sum('pagu')) : 0) * 100, 1, ',', '') . ' %' }}
            </strong>
    </td>
    <td class="text-right" colspan="2">
            <strong class="{{ $kegiatan->subkegiatan->sum('pagu') < $total_keuangan ? 'text-danger' : 'text-dark' }}">
                @currency($total_keuangan)
            </strong>
    </td>
    <td></td>
</tr>
@endif