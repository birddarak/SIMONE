@if ($program->realisasi_program->count() >= 1)
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
@foreach ($program->realisasi_program()->orderBy('triwulan', 'ASC')->get() as $rp)
<tr>
    <td></td>
    <td class="p-1">
        <div class="input-group m-0">
            <select class="form-control"
                wire:change="update('{{ $rp->uuid }}', 'triwulan', $event.target.value)">
                <option value="I" {{ $rp->triwulan == 'I' ? 'selected' : '' }}>I</option>
                <option value="II" {{ $rp->triwulan == 'II' ? 'selected' : '' }}>II</option>
                <option value="III" {{ $rp->triwulan == 'III' ? 'selected' : '' }}>III
                </option>
                <option value="IV" {{ $rp->triwulan == 'IV' ? 'selected' : '' }}>IV
                </option>
            </select>
        </div>
    </td>
    <td class="p-1 col-2">
        <div class="input-group m-0">
            <input type="number" value="{{ $rp->capaian }}" class="form-control col-5"
                wire:blur="update('{{ $rp->uuid }}', 'capaian', $event.target.value)"
                wire:keydown.enter="update('{{ $rp->uuid }}', 'capaian', $event.target.value)">
            <span class="text-left btn btn-transparent col-7"> / {{ $program->satuan }}</span>
        </div>
    </td>
    <td class="p-1 text-center col-2">
        {{ number_format(($rp->program->sumTotalSubKeg() != 0 ?
        $rp->program->sumTotalRincian($rp->triwulan) /
        $rp->program->sumTotalSubKeg() : 0) * 100, 1, ',', '') . ' %'
        }}
    </td>
    <td class="p-1 text-right" colspan="2">
        @currency($rp->program->sumTotalRincian($rp->triwulan))
    </td>
    <td class="text-center p-1">
        <div class="btn-group">
            <button class="btn btn-danger btn-icon ml-2 mb-2" onclick="return confirm('Ingin menghapus Realisasi ini?')"
                wire:click='destroy("{{ $rp->uuid }}")'>
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
                class="{{ $program->realisasi_program->sum('capaian') >= $program->target ? 'text-success' : 'text-dark' }}">
                {{ number_format(($program->realisasi_program->sum('capaian') /
                $program->target * 100), 1, ',', '') . ' %' }}
            </strong>
    </td>
    @php
    $total_keuangan = $program->sumTotalRincian("I") +
    $program->sumTotalRincian("II") + $program->sumTotalRincian("III") +
    $program->sumTotalRincian("IV");
    @endphp
    <td class="text-center">
        {{-- capaian keuangan --}}
            <strong class="{{ $program->sumTotalSubKeg() < $total_keuangan ? 'text-danger' : 'text-dark' }}">
                {{ number_format(($program->sumTotalSubKeg() != 0 ? $total_keuangan /
                ($program->sumTotalSubKeg()) : 0) * 100, 1, ',', '') . ' %' }}
            </strong>
    </td>
    <td class="text-right" colspan="2">
            <strong class="{{ $program->sumTotalSubKeg() < $total_keuangan ? 'text-danger' : 'text-dark' }}">
                @currency($total_keuangan)
            </strong>
    </td>
    <td></td>
</tr>
@endif