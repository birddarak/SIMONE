@forelse ($programs as $prog)
<tr class="program">
    <td
        rowspan="{{ $prog->indikator_program->count() != 0 ? $prog->indikator_program->count() : '1' }}">
        {{ $prog->kode . ' ' . $prog->title }}
    </td>
    <td>
        {{ $prog->indikator_program->count() != 0 ? $prog->indikator_program->first()->title : '-' }}
    </td>
    <td class="text-center"
        rowspan="{{ $prog->indikator_program->count() != 0 ? $prog->indikator_program->count() : '1' }}">
        {{ $prog->target . ' ' . $prog->satuan }}
    </td>
    <td class="text-right"
        rowspan="{{ $prog->indikator_program->count() != 0 ? $prog->indikator_program->count() : '1' }}">
        @currency($prog->sumTotalSubKeg())
    </td>
    {{-- triwulan --}}
    {{-- kinerja --}}
    <td class="text-center"
        rowspan="{{ $prog->indikator_program->count() != 0 ? $prog->indikator_program->count() : '1' }}">
        -
    </td>
    {{-- keuangan --}}
    <td class="text-center"
        rowspan="{{ $prog->indikator_program->count() != 0 ? $prog->indikator_program->count() : '1' }}">
        {{ number_format(($prog->sumTotalSubKeg() != 0 ? $prog->sumTotalRincian('I') / $prog->sumTotalSubKeg() : 0) *
        100, 1, ',', '') . ' %' }}
    </td>
    {{-- RP --}}
    <td class="text-center"
        rowspan="{{ $prog->indikator_program->count() != 0 ? $prog->indikator_program->count() : '1' }}">
        @currency($prog->sumTotalRincian('I'))
    </td>
    {{-- kinerja --}}
    <td class="text-center"
        rowspan="{{ $prog->indikator_program->count() != 0 ? $prog->indikator_program->count() : '1' }}">
        -
    </td>
    {{-- keuangan --}}
    <td class="text-center"
        rowspan="{{ $prog->indikator_program->count() != 0 ? $prog->indikator_program->count() : '1' }}">
        {{ number_format(($prog->sumTotalSubKeg() != 0 ? $prog->sumTotalRincian('II') / $prog->sumTotalSubKeg() : 0) *
        100, 1, ',', '') . ' %' }}
    </td>
    {{-- RP --}}
    <td class="text-center"
        rowspan="{{ $prog->indikator_program->count() != 0 ? $prog->indikator_program->count() : '1' }}">
        @currency($prog->sumTotalRincian('II'))
    </td>
    {{-- kinerja --}}
    <td class="text-center"
        rowspan="{{ $prog->indikator_program->count() != 0 ? $prog->indikator_program->count() : '1' }}">
        -
    </td>
    {{-- keuangan --}}
    <td class="text-center"
        rowspan="{{ $prog->indikator_program->count() != 0 ? $prog->indikator_program->count() : '1' }}">
        {{ number_format(($prog->sumTotalSubKeg() != 0 ? $prog->sumTotalRincian('III') / $prog->sumTotalSubKeg() : 0) *
        100, 1, ',', '') . ' %' }}
    </td>
    {{-- RP --}}
    <td class="text-center"
        rowspan="{{ $prog->indikator_program->count() != 0 ? $prog->indikator_program->count() : '1' }}">
        @currency($prog->sumTotalRincian('III'))
    </td>
    {{-- kinerja --}}
    <td class="text-center"
        rowspan="{{ $prog->indikator_program->count() != 0 ? $prog->indikator_program->count() : '1' }}">
        -
    </td>
    {{-- keuangan --}}
    <td class="text-center"
        rowspan="{{ $prog->indikator_program->count() != 0 ? $prog->indikator_program->count() : '1' }}">
        {{ number_format(($prog->sumTotalSubKeg() != 0 ? $prog->sumTotalRincian('IV') / $prog->sumTotalSubKeg() : 0) *
        100, 1, ',', '') . ' %' }}
    </td>
    {{-- RP --}}
    <td class="text-center"
        rowspan="{{ $prog->indikator_program->count() != 0 ? $prog->indikator_program->count() : '1' }}">
        @currency($prog->sumTotalRincian('IV'))
    </td>
    {{-- /. triwulan --}}
    <td class="text-center"
        rowspan="{{ $prog->indikator_program->count() != 0 ? $prog->indikator_program->count() : '1' }}">
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
    <td class="text-center" colspan="17">DATA KOSONG</td>
</tr>
@endforelse