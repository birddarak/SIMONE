@if ($subkegiatan->realisasi_subkegiatan->count() >= 1)
<tr class="bg-secondary text-white text-center">
    <th rowspan="2"></th>
    <th rowspan="2">TRIWULAN</th>
    <th colspan="4">CAPAIAN KINERJA & KEUANGAN</th>
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

$realisasi_subkegiatan = $subkegiatan->realisasi_subkegiatan()->orderBy('triwulan', 'ASC')->get();
@endphp

@foreach ($realisasi_subkegiatan as $rs)

@php
$total_keuangan += $rs->rincian_belanja->sum('pagu');
@endphp

<tr wire:key='{{ $rs->uuid }}'>
    <td></td>
    <td class="p-1">
        @if (auth()->user()->rule != 'kabid')
        <div class="input-group m-0">
            <select class="form-control" wire:change="update('{{ $rs->uuid }}', 'triwulan', $event.target.value)">
                <option value="I" {{ $rs->triwulan == 'I' ? 'selected' : '' }}>I</option>
                <option value="II" {{ $rs->triwulan == 'II' ? 'selected' : '' }}>II</option>
                <option value="III" {{ $rs->triwulan == 'III' ? 'selected' : '' }}>III
                </option>
                <option value="IV" {{ $rs->triwulan == 'IV' ? 'selected' : '' }}>IV
                </option>
            </select>
        </div>
        @else
        <div class="text-center">
            <span>{{ $rs->triwulan }}</span>
        </div>
        @endif
    </td>
    {{-- capaian kinerja --}}
    {{-- <td class="p-1 col-2">
        @if (auth()->user()->rule != 'kabid')
        <div class="input-group m-0">
            <input type="number" value="{{ $rs->capaian }}" class="form-control col-5"
                wire:blur="update('{{ $rs->uuid }}', 'capaian', $event.target.value)"
                wire:keydown.enter="update('{{ $rs->uuid }}', 'capaian', $event.target.value)">
            <div class="btn btn-transparent col-7"> / {{ $subkegiatan->satuan }}</div>
        </div>
        @else
        <div class="text-center">
            <span>{{ $rs->capaian }} {{ $subkegiatan->satuan }}</span>
        </div>
        @endif
    </td> --}}
    {{-- capaian kinerja % --}}
    {{-- <td class="p-1 text-center">
        {{ number_format(($rs->subkegiatan->target != 0 ?
        $rs->capaian / $rs->subkegiatan->target : 0) * 100, 1, ',', '') . ' %' }}
    </td> --}}
    {{-- capaian keuangan --}}
    <td colspan="2" class="p-1 text-right">
        @currency($total_keuangan)
    </td>
    {{-- capaian keuangan % --}}
    <td colspan="2" class="p-1 text-center">
        {{ number_format(($rs->subkegiatan->pagu != 0 ?
        $total_keuangan / $rs->subkegiatan->pagu : 0) * 100, 1, ',', '') . ' %'
        }}
    </td>
    {{-- aksi --}}
    <td class="text-center p-1">
        <div class="btn-group">
            <a href="{{ route('realisasi.rincian-belanja', $rs->uuid) }}" class="btn btn-info btn-icon ml-2 mb-2">
                <i class="ik ik-corner-down-right"></i>
            </a>
            @if (auth()->user()->rule != 'kabid')
            @if ($rs->rincian_belanja->count() == 0)
            <button class="btn btn-danger btn-icon ml-2 mb-2" wire:confirm='Ingin menghapus Realisasi ini?'
                wire:click='destroy("{{ $rs->uuid }}")'>
                <i class="ik ik-trash"></i>
            </button>
            @endif
            @endif
        </div>
    </td>
</tr>
@endforeach

<tr>
    <td></td>
    <th>TOTAL CAPAIAN</th>
    {{-- total --}}
    {{-- <td class="text-center"> --}}
        {{-- capaian kinerja --}}
        {{-- <strong
            class="{{ $realisasi_subkegiatan->last()->capaian >= $subkegiatan->target ? 'text-success' : 'text-dark' }}">
            {{ $realisasi_subkegiatan->last()->capaian . ' ' . $realisasi_subkegiatan->last()->subkegiatan->satuan }}
        </strong> --}}
    {{-- </td> --}}
    {{-- <td class="text-center"> --}}
        {{-- capaian kinerja --}}
        {{-- <strong
            class="{{ $realisasi_subkegiatan->last()->capaian >= $subkegiatan->target ? 'text-success' : 'text-dark' }}">
            {{ number_format(($realisasi_subkegiatan->last()->capaian /
            $subkegiatan->target * 100), 1, ',', '') . ' %' }}
        </strong> --}}
    {{-- </td> --}}
    {{-- capaian keuangan --}}
    <td colspan="2" class="p-1 text-right">
        <strong class="{{ $subkegiatan->pagu < $total_keuangan ? 'text-danger' : 'text-dark' }}">
            @currency($total_keuangan)
        </strong>
    </td>
    <td colspan="2" class="text-center">
        {{-- capaian keuangan --}}
        <strong class="{{ $subkegiatan->pagu < $total_keuangan ? 'text-danger' : 'text-dark' }}">
            {{ number_format(($subkegiatan->pagu != 0 ? $total_keuangan /
            $subkegiatan->pagu : 0) * 100, 1, ',', '') . ' %' }}
        </strong>
    </td>
    <td></td>
</tr>

@endif