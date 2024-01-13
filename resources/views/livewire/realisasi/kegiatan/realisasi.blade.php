@if ($kegiatan->realisasi_kegiatan->count() >= 1)
<tr class="bg-secondary text-white text-center">
    <th rowspan="2"></th>
    <th rowspan="2">TRIWULAN</th>
    <th colspan="4">CAPAIAN</th>
    <th rowspan="2" class="text-center">
        <i class="fas fa-cog fa-fw"></i>
    </th>
</tr>
<tr class="bg-secondary text-white text-center">
    <th>KINERJA</th>
    <th>%</th>

    <th>KEUANGAN</th>
    <th>%</th>
</tr>
@php
$total_keuangan = 0;

$realisasi_kegiatan = $kegiatan->realisasi_kegiatan()->orderBy('triwulan', 'ASC')->get();
@endphp

@foreach ($realisasi_kegiatan as $rk)

@php
$total_keuangan += $rk->kegiatan->sumTotalRincian($rk->triwulan);
@endphp

<tr wire:key='{{ $rk->uuid }}'>
    <td></td>
    <td class="p-1">
        <div class="input-group m-0">
            <select class="form-control" wire:change="update('{{ $rk->uuid }}', 'triwulan', $event.target.value)">
                <option value="I" {{ $rk->triwulan == 'I' ? 'selected' : '' }}>I</option>
                <option value="II" {{ $rk->triwulan == 'II' ? 'selected' : '' }}>II</option>
                <option value="III" {{ $rk->triwulan == 'III' ? 'selected' : '' }}>III
                </option>
                <option value="IV" {{ $rk->triwulan == 'IV' ? 'selected' : '' }}>IV
                </option>
            </select>
        </div>
    </td>
    {{-- capaian kinerja --}}
    <td class="p-1 col-2">
        <div class="input-group m-0">
            <input type="number" value="{{ $rk->capaian }}" class="form-control col-5"
                wire:blur="update('{{ $rk->uuid }}', 'capaian', $event.target.value)"
                wire:keydown.enter="update('{{ $rk->uuid }}', 'capaian', $event.target.value)">
            <span class="text-left btn btn-transparent col-7"> / {{ $kegiatan->satuan }}</span>
        </div>
    </td>
    {{-- capaian kinerja % --}}
    <td class="p-1 text-center">
        {{ number_format(($rk->kegiatan->target != 0 ?
        $rk->capaian / $rk->kegiatan->target : 0) * 100, 1, ',', '') . ' %'
        }}
    </td>
    {{-- capaian keuangan --}}
    <td class="p-1 text-right">
        @currency($total_keuangan)
    </td>
    {{-- capaian keuangan % --}}
    <td class="p-1 text-center">
        {{ number_format(($rk->kegiatan->subkegiatan->sum('pagu') != 0 ?
        $total_keuangan / $rk->kegiatan->subkegiatan->sum('pagu') : 0) * 100, 1, ',', '') . ' %'
        }}
    </td>
    {{-- aksi --}}
    <td class="text-center p-1">
        <div class="btn-group">
            <button class="btn btn-danger btn-icon ml-2 mb-2" wire:confirm='Ingin menghapus Realisasi ini?'
                wire:click='destroy("{{ $rk->uuid }}")'>
                <i class="ik ik-trash"></i>
            </button>
        </div>
    </td>
</tr>
@endforeach

<tr>
    <td></td>
    <th>TOTAL CAPAIAN</th>
    {{-- total --}}
    <td class="text-center">
        {{-- capaian kinerja --}}
        <strong class="{{ $realisasi_kegiatan->last()->capaian >= $kegiatan->target ? 'text-success' : 'text-dark' }}">
            {{ $realisasi_kegiatan->last()->capaian . ' ' . $realisasi_kegiatan->last()->kegiatan->satuan }}
        </strong>
    </td>
    <td class="text-center">
        {{-- capaian kinerja --}}
        <strong class="{{ $realisasi_kegiatan->last()->capaian >= $kegiatan->target ? 'text-success' : 'text-dark' }}">
            {{ number_format(($realisasi_kegiatan->last()->capaian /
            $kegiatan->target * 100), 1, ',', '') . ' %' }}
        </strong>
    </td>
    {{-- capaian keuangan --}}
    <td class="text-right">
        <strong class="{{ $kegiatan->subkegiatan->sum('pagu') < $total_keuangan ? 'text-danger' : 'text-dark' }}">
            @currency($total_keuangan)
        </strong>
    </td>
    <td class="text-center">
        {{-- capaian keuangan --}}
        <strong class="{{ $kegiatan->subkegiatan->sum('pagu') < $total_keuangan ? 'text-danger' : 'text-dark' }}">
            {{ number_format(($kegiatan->subkegiatan->sum('pagu') != 0 ? $total_keuangan /
            $kegiatan->subkegiatan->sum('pagu') : 0) * 100, 1, ',', '') . ' %' }}
        </strong>
    </td>
    <td></td>
</tr>

@endif