{{-- baris program --}}
@forelse ($programs as $prog)
@php
// menghitung baris row
$rows = $prog->indikator_program->count() != 0 ? $prog->indikator_program->count() : '1';

// total realisasi
$rp = $prog->realisasi_program()->orderBy('triwulan', 'ASC')->get();

// menghitung total capaian & pagu tw i-iv
$persentase_kinerja = number_format((!is_null($rp->last()) ? $rp->last()->capaian / $prog->target : 0) * 100, 1, ',',
'') .
' %';
$persentase_pagu = number_format(($prog->sumTotalSubKeg() != 0 ? $prog->sumTotal() /
$prog->sumTotalSubKeg() : 0) * 100, 1, ',', '') . ' %';

// untuk menghitung total pagu masing-masing triwulan
$pagu_triwulan = 0;

// untuk td triwulan dinamis
$triwulan = ['I', 'II', 'III', 'IV'];
@endphp
<tr class="program">
    <td rowspan="{{ $rows }}">
        {{ $prog->kode . ' ' . $prog->title }}
    </td>
    <td>
        {{ $prog->indikator_program->count() != 0 ? $prog->indikator_program->first()->title : '' }}
    </td>
    <td class="text-center" rowspan="{{ $rows }}">
        {{ $prog->target . ' ' . $prog->satuan }}
    </td>
    <td class="text-right" rowspan="{{ $rows }}">
        @currency($prog->sumTotalSubKeg())
    </td>

    {{-- total triwulan --}}
    {{-- total kinerja --}}
    <td class="text-center" rowspan="{{ $rows }}">
        {{ (!is_null($rp->last()) ? $rp->last()->capaian : 0) . ' ' . $prog->satuan }}
    </td>
    {{-- total kinerja % --}}
    <td class="text-center" rowspan="{{ $rows }}">
        {{ $persentase_kinerja }}
    </td>
    {{-- total keuangan --}}
    <td class="text-center" rowspan="{{ $rows }}">
        @currency($prog->sumTotal())
    </td>
    {{-- total keuangan % --}}
    <td class="text-center" rowspan="{{ $rows }}">
        {{ $persentase_pagu }}
    </td>
    {{-- /. total triwulan --}}

    {{-- triwulan I-IV --}}
    @foreach ($triwulan as $tw)
    {{-- kinerja --}}
    <td class="text-center" rowspan="{{ $rows }}">
        {{ $prog->countTotalCapaian($tw) . ' ' . $prog->satuan }}
    </td>
    {{-- kinerja % --}}
    <td class="text-center" rowspan="{{ $rows }}">
        {{ number_format((!is_null($rp->last()) ? $prog->countTotalCapaian($tw) /
        $prog->target : 0) * 100, 1, ',', '') . ' %' }}
    </td>
    {{-- keuangan --}}
    <td class="text-center" rowspan="{{ $rows }}">
        @currency($pagu_triwulan)
    </td>
    {{-- keuangan % --}}
    <td class="text-center" rowspan="{{ $rows }}">
        {{ number_format(($prog->sumTotalSubKeg() != 0 ? ($pagu_triwulan += $prog->sumTotalRincian($tw)) /
        $prog->sumTotalSubKeg() : 0) * 100, 1, ',', '') . ' %' }}
    </td>
    @endforeach

    {{-- penanggung jawab --}}
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
    <td class="text-center" colspan="25">DATA KOSONG</td>
</tr>
@endforelse