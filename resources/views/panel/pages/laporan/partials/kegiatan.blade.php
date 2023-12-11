{{-- baris kegiatan --}}
@forelse ($prog->kegiatan as $keg)
@php
$rows = $keg->indikator_kegiatan->count() != 0 ? $keg->indikator_kegiatan->count() : '1';
@endphp
<tr class="kegiatan">
    <td rowspan="{{ $rows }}">
        {{ $keg->kode . ' ' . $keg->title }}</td>
    <td>
        {{ $keg->indikator_kegiatan->count() != 0 ? $keg->indikator_kegiatan->first()->title : '' }}
    </td>
    <td class="text-center" rowspan="{{ $rows }}">
        {{ $keg->target . ' ' . $keg->satuan }}
    </td>
    <td class="text-right" rowspan="{{ $rows }}">
        @currency($keg->subkegiatan->sum('pagu'))
    </td>

    {{-- total triwulan --}}
    @php
    $total_keg = $keg->sumTotalRincian("I") +
    $keg->sumTotalRincian("II") + $keg->sumTotalRincian("III") +
    $keg->sumTotalRincian("IV");
    @endphp
    {{-- total kinerja --}}
    <td class="text-center" rowspan="{{ $rows }}">
        {{ number_format(($keg->realisasi_kegiatan->sum('capaian') /
        $keg->target * 100), 1, ',', '') . ' %' }}
    </td>
    {{-- total keuangan --}}
    <td class="text-center" rowspan="{{ $rows }}">
        {{ number_format(($keg->subkegiatan->sum('pagu') != 0 ? $total_keg /
        ($keg->subkegiatan->sum('pagu')) : 0) * 100, 1, ',', '') . ' %' }}
    </td>
    {{-- total RP --}}
    <td class="text-center" rowspan="{{ $rows }}">
        @currency($total_keg)
    </td>
    {{-- /. total triwulan --}}

    {{-- triwulan --}}
    {{-- kinerja --}}
    <td class="text-center" rowspan="{{ $rows }}">
        {{ $keg->countTotalCapaian('I') . ' ' . $keg->satuan }}
    </td>
    {{-- keuangan --}}
    <td class="text-center" rowspan="{{ $rows }}">
        {{ number_format(($keg->subkegiatan->sum('pagu') != 0 ? $keg->sumTotalRincian('I') /
        $keg->subkegiatan->sum('pagu') : 0) * 100, 1, ',', '') . ' %' }}
    </td>
    {{-- RP --}}
    <td class="text-center" rowspan="{{ $rows }}">
        @currency($keg->sumTotalRincian('I'))
    </td>
    {{-- kinerja --}}
    <td class="text-center" rowspan="{{ $rows }}">
        {{ $keg->countTotalCapaian('II') . ' ' . $keg->satuan }}
    </td>
    {{-- keuangan --}}
    <td class="text-center" rowspan="{{ $rows }}">
        {{ number_format(($keg->subkegiatan->sum('pagu') != 0 ? $keg->sumTotalRincian('II') /
        $keg->subkegiatan->sum('pagu') : 0) * 100, 1, ',', '') . ' %' }}
    </td>
    {{-- RP --}}
    <td class="text-center" rowspan="{{ $rows }}">
        @currency($keg->sumTotalRincian('II'))
    </td>
    {{-- kinerja --}}
    <td class="text-center" rowspan="{{ $rows }}">
        {{ $keg->countTotalCapaian('III') . ' ' . $keg->satuan }}
    </td>
    {{-- keuangan --}}
    <td class="text-center" rowspan="{{ $rows }}">
        {{ number_format(($keg->subkegiatan->sum('pagu') != 0 ? $keg->sumTotalRincian('III') /
        $keg->subkegiatan->sum('pagu') : 0) * 100, 1, ',', '') . ' %' }}
    </td>
    {{-- RP --}}
    <td class="text-center" rowspan="{{ $rows }}">
        @currency($keg->sumTotalRincian('III'))
    </td>
    {{-- kinerja --}}
    <td class="text-center" rowspan="{{ $rows }}">
        {{ $keg->countTotalCapaian('IV') . ' ' . $keg->satuan }}
    </td>
    {{-- keuangan --}}
    <td class="text-center" rowspan="{{ $rows }}">
        {{ number_format(($keg->subkegiatan->sum('pagu') != 0 ? $keg->sumTotalRincian('IV') /
        $keg->subkegiatan->sum('pagu') : 0) * 100, 1, ',', '') . ' %' }}
    </td>
    {{-- RP --}}
    <td class="text-center" rowspan="{{ $rows }}">
        @currency($keg->sumTotalRincian('IV'))
    </td>
    {{-- /. triwulan --}}

    <td class="text-center" rowspan="{{ $rows }}">
        {{ $keg->pegawai->nama }}
    </td>
</tr>
@foreach ($keg->indikator_kegiatan as $ik)
@if ($keg->indikator_kegiatan->first()->id != $ik->id)
<tr class="kegiatan">
    <td>{{ $ik->title }}</td>
</tr>
@endif
@endforeach

@include('panel.pages.laporan.partials.subkegiatan')

@empty
@endforelse
{{-- /. baris kegiatan --}}