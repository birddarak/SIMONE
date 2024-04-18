@if ($program->realisasi_program->count() >= 1)
<tr class="bg-secondary text-white text-center">
    <th rowspan="2"></th>
    <th rowspan="2">TRIWULAN</th>
    <th colspan="4">CAPAIAN</th>
    <th rowspan="2" class="text-center">
        <i class="fas fa-cog fa-fw"></i>
    </th>
</tr>
<tr class="bg-secondary text-white text-center">
    {{-- <th>KINERJA</th>
    <th>%</th> --}}

    <th colspan="2">KEUANGAN</th>
    <th colspan="2">%</th>
</tr>

@php
$total_keuangan = 0;

$realisasi_program = $program->realisasi_program()->orderBy('triwulan', 'ASC')->get();
@endphp

@foreach ($realisasi_program as $rp)

@php
$total_keuangan += $rp->program->sumTotalRincian($rp->triwulan);
@endphp

<tr wire:key='{{ $rp->uuid }}'>
    <td></td>
    <td class="p-1">
        @if (auth()->user()->rule != 'kabid')
        <div class="input-group m-0">
            <select class="form-control" wire:change="update('{{ $rp->uuid }}', 'triwulan', $event.target.value)">
                <option value="I" {{ $rp->triwulan == 'I' ? 'selected' : '' }}>I</option>
                <option value="II" {{ $rp->triwulan == 'II' ? 'selected' : '' }}>II</option>
                <option value="III" {{ $rp->triwulan == 'III' ? 'selected' : '' }}>III</option>
                <option value="IV" {{ $rp->triwulan == 'IV' ? 'selected' : '' }}>IV</option>
            </select>
        </div>
        @else
        <div class="text-center">
            <span>{{ $rp->triwulan }}</span>
        </div>
        @endif
    </td>
    {{-- capaian kinerja --}}
    {{-- <td class="p-1 col-2">
        @if (auth()->user()->rule != 'kabid')
        <div class="input-group m-0">
            <input type="number" value="{{ $rp->capaian }}" class="form-control col-5"
                wire:blur="update('{{ $rp->uuid }}', 'capaian', $event.target.value)"
                wire:keydown.enter="update('{{ $rp->uuid }}', 'capaian', $event.target.value)">
            <span class="text-left btn btn-transparent col-7"> / {{ $program->satuan }}</span>
        </div>
        @else
        <div class="text-center">
            <span>{{ $rp->capaian }} {{ $program->satuan }}</span>
        </div>
        @endif
    </td> --}}
    {{-- capaian kinerja % --}}
    {{-- <td class="p-1 text-center">
        {{ number_format(($rp->program->target != 0 ?
        $rp->capaian / $rp->program->target : 0) * 100, 1, ',', '') . ' %'
        }}
    </td> --}}
    {{-- capaian keuangan --}}
    <td colspan="2" class="p-1 text-right">
        @currency($total_keuangan)
    </td>
    {{-- capaian keuangan % --}}
    <td colspan="2" class="p-1 text-center">
        {{ number_format(($rp->program->sumTotalSubKeg() != 0 ?
        $total_keuangan / $rp->program->sumTotalSubKeg() : 0) * 100, 1, ',', '') . ' %'
        }}
    </td>
    {{-- aksi --}}
    <td class="text-center p-1">
        @if (auth()->user()->rule != 'kabid')
        <div class="btn-group">
            <button class="btn btn-danger btn-icon ml-2 mb-2" wire:confirm='Ingin menghapus Realisasi ini?'
                wire:click='destroy("{{ $rp->uuid }}")'>
                <i class="ik ik-trash"></i>
            </button>
        </div>
        @endif
    </td>
</tr>
@endforeach

<tr>
    <td></td>
    <th>TOTAL CAPAIAN</th>
    {{-- total --}}
    {{-- <td class="text-center"> --}}
        {{-- capaian kinerja --}}
        {{-- <strong class="{{ $realisasi_program->last()->capaian >= $program->target ? 'text-success' : 'text-dark' }}">
            {{ $realisasi_program->last()->capaian . ' ' . $realisasi_program->last()->program->satuan }}
        </strong> --}}
    {{-- </td> --}}
    {{-- <td class="text-center"> --}}
        {{-- capaian kinerja --}}
        {{-- <strong class="{{ $realisasi_program->last()->capaian >= $program->target ? 'text-success' : 'text-dark' }}">
            {{ number_format(($realisasi_program->last()->capaian /
            $program->target * 100), 1, ',', '') . ' %' }}
        </strong> --}}
    {{-- </td> --}}
    {{-- capaian keuangan --}}
    <td colspan="2" class="p-1 text-right">
        <strong class="{{ $program->sumTotalSubKeg() < $total_keuangan ? 'text-danger' : 'text-dark' }}">
            @currency($total_keuangan)
        </strong>
    </td>
    <td colspan="2" class="text-center">
        {{-- capaian keuangan --}}
        <strong class="{{ $program->sumTotalSubKeg() < $total_keuangan ? 'text-danger' : 'text-dark' }}">
            {{ number_format(($program->sumTotalSubKeg() != 0 ? $total_keuangan /
            $program->sumTotalSubKeg() : 0) * 100, 1, ',', '') . ' %' }}
        </strong>
    </td>
    <td></td>
</tr>

@endif