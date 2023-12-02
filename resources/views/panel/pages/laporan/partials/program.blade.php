@forelse ($programs as $prog)
<tr class="program">
    @php
    $rows = $prog->indikator_program->count() != 0 ? $prog->indikator_program->count() : '1';
    @endphp
    <td rowspan="{{ $rows }}">
        {{ $prog->kode . ' ' . $prog->title }}
    </td>
    <td>
        {{ $prog->indikator_program->count() != 0 ? $prog->indikator_program->first()->title : '-' }}
    </td>
    <td class="text-center" rowspan="{{ $rows }}">
        {{ $prog->target . ' ' . $prog->satuan }}
    </td>
    <td class="text-right" rowspan="{{ $rows }}">
        @currency($prog->sumTotalSubKeg())
    </td>

    {{-- total triwulan --}}
    @php
    $total_prog = $prog->sumTotalRincian("I") +
    $prog->sumTotalRincian("II") + $prog->sumTotalRincian("III") +
    $prog->sumTotalRincian("IV");
    @endphp
    {{-- total kinerja --}}
    <td class="text-center" rowspan="{{ $rows }}">
        {{ number_format(($prog->realisasi_program->sum('capaian') /
        $prog->target * 100), 1, ',', '') . ' %' }}
    </td>
    {{-- total keuangan --}}
    <td class="text-center" rowspan="{{ $rows }}">
        {{ number_format(($prog->sumTotalSubKeg() != 0 ? $total_prog /
        ($prog->sumTotalSubKeg()) : 0) * 100, 1, ',', '') . ' %' }}
    </td>
    {{-- total RP --}}
    <td class="text-center" rowspan="{{ $rows }}">
        @currency($total_prog)
    </td>
    {{-- /. total triwulan --}}

    {{-- triwulan --}}
    {{-- kinerja --}}
    <td class="text-center" rowspan="{{ $rows }}">
        {{ $prog->countTotalCapaian('I') . ' ' . $prog->satuan }}
    </td>
    {{-- keuangan --}}
    <td class="text-center" rowspan="{{ $rows }}">
        {{ number_format(($prog->sumTotalSubKeg() != 0 ? $prog->sumTotalRincian('I') / $prog->sumTotalSubKeg() : 0) *
        100, 1, ',', '') . ' %' }}
    </td>
    {{-- RP --}}
    <td class="text-center" rowspan="{{ $rows }}">
        @currency($prog->sumTotalRincian('I'))
    </td>
    {{-- kinerja --}}
    <td class="text-center" rowspan="{{ $rows }}">
        {{ $prog->countTotalCapaian('II') . ' ' . $prog->satuan }}
    </td>
    {{-- keuangan --}}
    <td class="text-center" rowspan="{{ $rows }}">
        {{ number_format(($prog->sumTotalSubKeg() != 0 ? $prog->sumTotalRincian('II') / $prog->sumTotalSubKeg() : 0) *
        100, 1, ',', '') . ' %' }}
    </td>
    {{-- RP --}}
    <td class="text-center" rowspan="{{ $rows }}">
        @currency($prog->sumTotalRincian('II'))
    </td>
    {{-- kinerja --}}
    <td class="text-center" rowspan="{{ $rows }}">
        {{ $prog->countTotalCapaian('III') . ' ' . $prog->satuan }}
    </td>
    {{-- keuangan --}}
    <td class="text-center" rowspan="{{ $rows }}">
        {{ number_format(($prog->sumTotalSubKeg() != 0 ? $prog->sumTotalRincian('III') / $prog->sumTotalSubKeg() : 0) *
        100, 1, ',', '') . ' %' }}
    </td>
    {{-- RP --}}
    <td class="text-center" rowspan="{{ $rows }}">
        @currency($prog->sumTotalRincian('III'))
    </td>
    {{-- kinerja --}}
    <td class="text-center" rowspan="{{ $rows }}">
        {{ $prog->countTotalCapaian('IV') . ' ' . $prog->satuan }}
    </td>
    {{-- keuangan --}}
    <td class="text-center" rowspan="{{ $rows }}">
        {{ number_format(($prog->sumTotalSubKeg() != 0 ? $prog->sumTotalRincian('IV') / $prog->sumTotalSubKeg() : 0) *
        100, 1, ',', '') . ' %' }}
    </td>
    {{-- RP --}}
    <td class="text-center" rowspan="{{ $rows }}">
        @currency($prog->sumTotalRincian('IV'))
    </td>
    {{-- /. triwulan --}}

    <td class="text-center" rowspan="{{ $rows }}">
        {{ $prog->pegawai->nama }}
    </td>
</tr>
@foreach ($prog->indikator_program as $ip)
@if ($prog->indikator_program->first()->id != $ip->id)
<tr class="program">
    <td>{{ $ip->title }}</td>
</tr>
@endif
@endforeach

@include('panel.pages.laporan.partials.kegiatan')

@empty
<tr>
    <td class="text-center" colspan="20">DATA KOSONG</td>
</tr>
@endforelse