@foreach ($subkegiatan->realisasi_subkegiatan()->orderBy('triwulan', 'ASC')->get() as $rs)
<tr>
    <td class="p-1 bg-dark text-white border border-light">TRIWULAN</td>
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
    <td class="p-1 bg-dark text-white border border-light">
        CAPAIAN KINERJA & KEUANGAN
    </td>
    <td class="p-1 col-2">
        <div class="input-group m-0">
            <input type="number" value="{{ $rs->capaian }}" class="form-control col-5"
                wire:blur="update('{{ $rs->uuid }}', 'capaian', $event.target.value)">
            <span class="text-left btn btn-transparent col-7"> / {{ $subkegiatan->satuan }}</span>
        </div>
    </td>
    <td class="p-1 text-center">
        {{ number_format(($rs->subkegiatan->pagu != 0 ?
        $rs->subkegiatan->sumTotalRincian($rs->triwulan) /
        $rs->subkegiatan->pagu : 0) * 100, 1, ',', '') . ' %'
        }}
    </td>
    <td class="p-1 bg-dark text-white border border-light">PAGU TERSERAP</td>
    <td class="p-1 text-right">
        <strong class="m-0">@currency($rs->rincian_belanja->sum('pagu'))</strong>
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