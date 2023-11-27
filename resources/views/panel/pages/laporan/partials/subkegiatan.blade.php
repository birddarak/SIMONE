{{-- baris sub kegiatan --}}
@forelse ($keg->subkegiatan as $sub)
<tr class="subkegiatan">
    <td style="vertical-align: middle;"
        rowspan="{{ $sub->indikator_subkegiatan->count() != 0 ? $sub->indikator_subkegiatan->count() : '1' }}">
        {{ $sub->kode . ' ' . $sub->title }}</td>
    <td>
        {{ $sub->indikator_subkegiatan->count() != 0 ? $sub->indikator_subkegiatan->first()->title : '-' }}
    </td>
    <td class="text-center"
        rowspan="{{ $sub->indikator_subkegiatan->count() != 0 ? $sub->indikator_subkegiatan->count() : '1' }}"
        style="vertical-align: middle;"
        rowspan="{{ $sub->indikator_subkegiatan->count() != 0 ? $sub->indikator_subkegiatan->count() : '1' }}">
        {{ $sub->target . ' ' . $sub->satuan }}
    </td>
    <td class="text-right" class="text-right" style="vertical-align: middle;"
        rowspan="{{ $sub->indikator_subkegiatan->count() != 0 ? $sub->indikator_subkegiatan->count() : '1' }}">
        @currency($sub->pagu)
    </td>
    {{-- triwulan --}}
    {{-- kinerja --}}
    <td class="text-center"
        rowspan="{{ $sub->indikator_subkegiatan->count() != 0 ? $sub->indikator_subkegiatan->count() : '1' }}">
        {{ $sub->countTotalCapaian('I') . ' ' . $sub->satuan }}
    </td>
    {{-- keuangan --}}
    <td class="text-center"
        rowspan="{{ $sub->indikator_subkegiatan->count() != 0 ? $sub->indikator_subkegiatan->count() : '1' }}">
        {{ number_format(($sub->pagu != 0 ? $sub->sumTotalRincian('I') /
        $sub->pagu : 0) * 100, 1, ',', '') . ' %' }}
    </td>
    {{-- RP --}}
    <td class="text-center"
        rowspan="{{ $sub->indikator_subkegiatan->count() != 0 ? $sub->indikator_subkegiatan->count() : '1' }}">
        @currency($sub->sumTotalRincian('I'))
    </td>
    {{-- kinerja --}}
    <td class="text-center"
        rowspan="{{ $sub->indikator_subkegiatan->count() != 0 ? $sub->indikator_subkegiatan->count() : '1' }}">
        {{ $sub->countTotalCapaian('II') . ' ' . $sub->satuan }}
    </td>
    {{-- keuangan --}}
    <td class="text-center"
        rowspan="{{ $sub->indikator_subkegiatan->count() != 0 ? $sub->indikator_subkegiatan->count() : '1' }}">
        {{ number_format(($sub->pagu != 0 ? $sub->sumTotalRincian('II') /
        $sub->pagu : 0) * 100, 1, ',', '') . ' %' }}
    </td>
    {{-- RP --}}
    <td class="text-center"
        rowspan="{{ $sub->indikator_subkegiatan->count() != 0 ? $sub->indikator_subkegiatan->count() : '1' }}">
        @currency($sub->sumTotalRincian('II'))
    </td>
    {{-- kinerja --}}
    <td class="text-center"
        rowspan="{{ $sub->indikator_subkegiatan->count() != 0 ? $sub->indikator_subkegiatan->count() : '1' }}">
        {{ $sub->countTotalCapaian('III') . ' ' . $sub->satuan }}
    </td>
    {{-- keuangan --}}
    <td class="text-center"
        rowspan="{{ $sub->indikator_subkegiatan->count() != 0 ? $sub->indikator_subkegiatan->count() : '1' }}">
        {{ number_format(($sub->pagu != 0 ? $sub->sumTotalRincian('III') /
        $sub->pagu : 0) * 100, 1, ',', '') . ' %' }}
    </td>
    {{-- RP --}}
    <td class="text-center"
        rowspan="{{ $sub->indikator_subkegiatan->count() != 0 ? $sub->indikator_subkegiatan->count() : '1' }}">
        @currency($sub->sumTotalRincian('III'))
    </td>
    {{-- kinerja --}}
    <td class="text-center"
        rowspan="{{ $sub->indikator_subkegiatan->count() != 0 ? $sub->indikator_subkegiatan->count() : '1' }}">
        {{ $sub->countTotalCapaian('IV') . ' ' . $sub->satuan }}
    </td>
    {{-- keuangan --}}
    <td class="text-center"
        rowspan="{{ $sub->indikator_subkegiatan->count() != 0 ? $sub->indikator_subkegiatan->count() : '1' }}">
        {{ number_format(($sub->pagu != 0 ? $sub->sumTotalRincian('IV') /
        $sub->pagu : 0) * 100, 1, ',', '') . ' %' }}
    </td>
    {{-- RP --}}
    <td class="text-center"
        rowspan="{{ $sub->indikator_subkegiatan->count() != 0 ? $sub->indikator_subkegiatan->count() : '1' }}">
        @currency($sub->sumTotalRincian('IV'))
    </td>
    {{-- /. triwulan --}}
</tr>
@foreach ($sub->indikator_subkegiatan as $isk)
@if ($sub->indikator_subkegiatan->first()->id != $isk->id)
<tr class="subkegiatan">
    <td>{{ $isk->title }}</td>
</tr>
@endif
@endforeach

@empty
@endforelse
{{-- /. baris sub kegiatan --}}