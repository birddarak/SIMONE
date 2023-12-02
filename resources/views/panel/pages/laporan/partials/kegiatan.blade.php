{{-- baris kegiatan --}}
@forelse ($prog->kegiatan as $keg)
<tr class="kegiatan">
    <td rowspan="{{ $keg->indikator_kegiatan->count() != 0 ? $keg->indikator_kegiatan->count() : '1' }}">
        {{ $keg->kode . ' ' . $keg->title }}</td>
    <td>
        {{ $keg->indikator_kegiatan->count() != 0 ? $keg->indikator_kegiatan->first()->title : '-' }}
    </td>
    <td class="text-center" rowspan="{{ $keg->indikator_kegiatan->count() != 0 ? $keg->indikator_kegiatan->count() : '1' }}">
        {{ $keg->target . ' ' . $keg->satuan }}
    </td>
    <td class="text-right" rowspan="{{ $keg->indikator_kegiatan->count() != 0 ? $keg->indikator_kegiatan->count() : '1' }}">
        @currency($keg->subkegiatan->sum('pagu'))
    </td>
    {{-- triwulan --}}
    {{-- kinerja --}}
    <td class="text-center"
        rowspan="{{ $keg->indikator_kegiatan->count() != 0 ? $keg->indikator_kegiatan->count() : '1' }}">
        -
    </td>
    {{-- keuangan --}}
    <td class="text-center"
        rowspan="{{ $keg->indikator_kegiatan->count() != 0 ? $keg->indikator_kegiatan->count() : '1' }}">
        {{ number_format(($keg->subkegiatan->sum('pagu') != 0 ? $keg->sumTotalRincian('I') /
        $keg->subkegiatan->sum('pagu') : 0) * 100, 1, ',', '') . ' %' }}
    </td>
    {{-- RP --}}
    <td class="text-center"
        rowspan="{{ $keg->indikator_kegiatan->count() != 0 ? $keg->indikator_kegiatan->count() : '1' }}">
        @currency($keg->sumTotalRincian('I'))
    </td>
    {{-- kinerja --}}
    <td class="text-center"
        rowspan="{{ $keg->indikator_kegiatan->count() != 0 ? $keg->indikator_kegiatan->count() : '1' }}">
        -
    </td>
    {{-- keuangan --}}
    <td class="text-center"
        rowspan="{{ $keg->indikator_kegiatan->count() != 0 ? $keg->indikator_kegiatan->count() : '1' }}">
        {{ number_format(($keg->subkegiatan->sum('pagu') != 0 ? $keg->sumTotalRincian('II') /
        $keg->subkegiatan->sum('pagu') : 0) * 100, 1, ',', '') . ' %' }}
    </td>
    {{-- RP --}}
    <td class="text-center"
        rowspan="{{ $keg->indikator_kegiatan->count() != 0 ? $keg->indikator_kegiatan->count() : '1' }}">
        @currency($keg->sumTotalRincian('II'))
    </td>
    {{-- kinerja --}}
    <td class="text-center"
        rowspan="{{ $keg->indikator_kegiatan->count() != 0 ? $keg->indikator_kegiatan->count() : '1' }}">
        -
    </td>
    {{-- keuangan --}}
    <td class="text-center"
        rowspan="{{ $keg->indikator_kegiatan->count() != 0 ? $keg->indikator_kegiatan->count() : '1' }}">
        {{ number_format(($keg->subkegiatan->sum('pagu') != 0 ? $keg->sumTotalRincian('III') /
        $keg->subkegiatan->sum('pagu') : 0) * 100, 1, ',', '') . ' %' }}
    </td>
    {{-- RP --}}
    <td class="text-center"
        rowspan="{{ $keg->indikator_kegiatan->count() != 0 ? $keg->indikator_kegiatan->count() : '1' }}">
        @currency($keg->sumTotalRincian('III'))
    </td>
    {{-- kinerja --}}
    <td class="text-center"
        rowspan="{{ $keg->indikator_kegiatan->count() != 0 ? $keg->indikator_kegiatan->count() : '1' }}">
        -
    </td>
    {{-- keuangan --}}
    <td class="text-center"
        rowspan="{{ $keg->indikator_kegiatan->count() != 0 ? $keg->indikator_kegiatan->count() : '1' }}">
        {{ number_format(($keg->subkegiatan->sum('pagu') != 0 ? $keg->sumTotalRincian('IV') /
        $keg->subkegiatan->sum('pagu') : 0) * 100, 1, ',', '') . ' %' }}
    </td>
    {{-- RP --}}
    <td class="text-center"
        rowspan="{{ $keg->indikator_kegiatan->count() != 0 ? $keg->indikator_kegiatan->count() : '1' }}">
        @currency($keg->sumTotalRincian('IV'))
    </td>
    {{-- /. triwulan --}}
    <td class="text-center"
    rowspan="{{ $keg->indikator_kegiatan->count() != 0 ? $keg->indikator_kegiatan->count() : '1' }}">
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