{{-- baris sub kegiatan --}}
@forelse ($keg->subkegiatan as $sub)
@php
// menghitung baris row
$rows = $sub->indikator_subkegiatan->count() != 0 ? $sub->indikator_subkegiatan->count() : '1';

// total realisasi
$rs = $sub->realisasi_subkegiatan()->orderBy('triwulan', 'ASC')->get();

// menghitung total capaian & pagu tw i-iv
$capaian_kinerja = !is_null($rs->last()) ? number_format(($rs->last()->capaian / $sub->target * 100), 1, ',', '') .
' %' : '0%';
$capaian_pagu = number_format(($sub->pagu != 0 ? ($sub->sumTotal() /
$sub->pagu) : 0) * 100, 1, ',', '') . ' %';

// untuk menghitung total pagu masing-masing triwulan
$pagu_triwulan = 0;

// untuk td triwulan dinamis
$triwulan = ['I', 'II', 'III', 'IV'];
@endphp
<tr class="subkegiatan">
    <td class="wrap" rowspan="{{ $rows }}">
        {{ $sub->kode . ' ' . $sub->title }}</td>
    <td class="wrap">
        {{ $sub->indikator_subkegiatan->count() != 0 ? $sub->indikator_subkegiatan->first()->title : '' }}
    </td>
    <td class="text-center nowrap" rowspan="{{ $rows }}">
        {{ $sub->target . ' ' . $sub->satuan }}
    </td>
    <td class="text-right wrap" rowspan="{{ $rows }}">
        @currency($sub->pagu)
    </td>

    {{-- total triwulan --}}
    {{-- total kinerja --}}
    <td class="text-center nowrap" rowspan="{{ $rows }}">
        {{ (!is_null($rs->last()) ? $rs->last()->capaian : 0) . ' ' . $sub->satuan }}
    </td>
    {{-- total kinerja % --}}
    <td class="text-center nowrap" rowspan="{{ $rows }}">
        {{ $capaian_kinerja }}
    </td>
    {{-- total keuangan --}}
    <td class="text-center nowrap" rowspan="{{ $rows }}">
        @currency($sub->sumTotal())
    </td>
    {{-- total keuangan % --}}
    <td class="text-center nowrap" rowspan="{{ $rows }}">
        {{ $capaian_pagu }}
    </td>
    {{-- /. total triwulan --}}

    {{-- triwulan I-IV --}}
    @foreach ($triwulan as $tw)
    {{-- kinerja --}}
    <td class="text-center nowrap" rowspan="{{ $rows }}">
        {{ $sub->countTotalCapaian($tw) . ' ' . $sub->satuan }}
    </td>
    {{-- kinerja % --}}
    <td class="text-center nowrap" rowspan="{{ $rows }}">
        {{ number_format((!is_null($rs->last()) ? $sub->countTotalCapaian($tw) /
        $sub->target : 0) * 100, 1, ',', '') . ' %' }}
    </td>
    {{-- keuangan --}}
    <td class="text-center nowrap" rowspan="{{ $rows }}">
        @currency($pagu_triwulan += $sub->sumTotalRincian($tw))
    </td>
    {{-- keuangan % --}}
    <td class="text-center nowrap" rowspan="{{ $rows }}">
        {{ number_format(($sub->pagu != 0 ? ($pagu_triwulan) /
        $sub->pagu : 0) * 100, 1, ',', '') . ' %' }}
    </td>
    @endforeach

    {{-- penanggung jawab --}}
    <td class="text-center wrap" rowspan="{{ $rows }}">
        {{ $sub->pegawai->nama }}
    </td>
</tr>
@foreach ($sub->indikator_subkegiatan as $isk)
@if ($sub->indikator_subkegiatan->first()->id != $isk->id)
<tr class="subkegiatan wrap">
    <td>{{ $isk->title }}</td>
</tr>
@endif
@endforeach

@empty
@endforelse
{{-- /. baris sub kegiatan --}}