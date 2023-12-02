{{-- baris sub kegiatan --}}
@forelse ($keg->subkegiatan as $sub)
<tr class="subkegiatan">
    @php
    $rows = $sub->indikator_subkegiatan->count() != 0 ? $sub->indikator_subkegiatan->count() : '1';
    @endphp
    <td rowspan="{{ $rows }}">
        {{ $sub->kode . ' ' . $sub->title }}</td>
    <td>
        {{ $sub->indikator_subkegiatan->count() != 0 ? $sub->indikator_subkegiatan->first()->title : '-' }}
    </td>
    <td class="text-center" rowspan="{{ $rows }}" rowspan="{{ $rows }}">
        {{ $sub->target . ' ' . $sub->satuan }}
    </td>
    <td class="text-right" class="text-right" rowspan="{{ $rows }}">
        @currency($sub->pagu)
    </td>

    {{-- total triwulan --}}
    @php
    $total_sub = $sub->sumTotalRincian("I") +
    $sub->sumTotalRincian("II") + $sub->sumTotalRincian("III") +
    $sub->sumTotalRincian("IV");
    @endphp
    {{-- kinerja --}}
    <td class="text-center" rowspan="{{ $rows }}">
        {{ number_format(($sub->realisasi_subkegiatan->sum('capaian') /
        $sub->target * 100), 1, ',', '') . ' %' }}
    </td>
    {{-- keuangan --}}
    <td class="text-center" rowspan="{{ $rows }}">
        {{ number_format(($sub->pagu != 0 ? $total_sub /
        ($sub->pagu) : 0) * 100, 1, ',', '') . ' %' }}
    </td>
    {{-- RP --}}
    <td class="text-center" rowspan="{{ $rows }}">
        @currency($total_sub)
    </td>
    {{-- /. total triwulan --}}

    {{-- triwulan --}}
    {{-- kinerja --}}
    <td class="text-center" rowspan="{{ $rows }}">
        {{ $sub->countTotalCapaian('I') . ' ' . $sub->satuan }}
    </td>
    {{-- keuangan --}}
    <td class="text-center" rowspan="{{ $rows }}">
        {{ number_format(($sub->pagu != 0 ? $sub->sumTotalRincian('I') /
        $sub->pagu : 0) * 100, 1, ',', '') . ' %' }}
    </td>
    {{-- RP --}}
    <td class="text-center" rowspan="{{ $rows }}">
        @currency($sub->sumTotalRincian('I'))
    </td>
    {{-- kinerja --}}
    <td class="text-center" rowspan="{{ $rows }}">
        {{ $sub->countTotalCapaian('II') . ' ' . $sub->satuan }}
    </td>
    {{-- keuangan --}}
    <td class="text-center" rowspan="{{ $rows }}">
        {{ number_format(($sub->pagu != 0 ? $sub->sumTotalRincian('II') /
        $sub->pagu : 0) * 100, 1, ',', '') . ' %' }}
    </td>
    {{-- RP --}}
    <td class="text-center" rowspan="{{ $rows }}">
        @currency($sub->sumTotalRincian('II'))
    </td>
    {{-- kinerja --}}
    <td class="text-center" rowspan="{{ $rows }}">
        {{ $sub->countTotalCapaian('III') . ' ' . $sub->satuan }}
    </td>
    {{-- keuangan --}}
    <td class="text-center" rowspan="{{ $rows }}">
        {{ number_format(($sub->pagu != 0 ? $sub->sumTotalRincian('III') /
        $sub->pagu : 0) * 100, 1, ',', '') . ' %' }}
    </td>
    {{-- RP --}}
    <td class="text-center" rowspan="{{ $rows }}">
        @currency($sub->sumTotalRincian('III'))
    </td>
    {{-- kinerja --}}
    <td class="text-center" rowspan="{{ $rows }}">
        {{ $sub->countTotalCapaian('IV') . ' ' . $sub->satuan }}
    </td>
    {{-- keuangan --}}
    <td class="text-center" rowspan="{{ $rows }}">
        {{ number_format(($sub->pagu != 0 ? $sub->sumTotalRincian('IV') /
        $sub->pagu : 0) * 100, 1, ',', '') . ' %' }}
    </td>
    {{-- RP --}}
    <td class="text-center" rowspan="{{ $rows }}">
        @currency($sub->sumTotalRincian('IV'))
    </td>
    {{-- /. triwulan --}}

    <td class="text-center" rowspan="{{ $rows }}">
        {{ $sub->pegawai->nama }}
    </td>
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