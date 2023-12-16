{{-- baris sub kegiatan --}}
@forelse ($keg->subkegiatan as $sub)
@php
// menghitung baris row
$rows = $sub->indikator_subkegiatan->count() != 0 ? $sub->indikator_subkegiatan->count() : '1';

// total realisasi
$rs = $sub->realisasi_subkegiatan()->orderBy('triwulan', 'ASC')->get();

// menghitung total capaian & pagu tw i-iv
$persentase_kinerja = !is_null($rs->last()) ? number_format(($rs->last()->capaian / $sub->target * 100), 1, ',', '') :
0;
$persentase_pagu = $sub->pagu != 0 ? number_format($sub->sumTotal() / $sub->pagu * 100, 1, ',', '') : 0;

// untuk menghitung total pagu masing-masing triwulan
$pagu_triwulan = 0;

@endphp
<tr class="subkegiatan">
    <td rowspan="{{ $rows }}">
        {{ $sub->kode . ' ' . $sub->title }}</td>
    <td>
        {{ $sub->indikator_subkegiatan->count() != 0 ? $sub->indikator_subkegiatan->first()->title : '' }}
    </td>
    <td class="text-center nowrap" rowspan="{{ $rows }}">
        {{ $sub->target . ' ' . $sub->satuan }}
    </td>
    <td class="text-right nowrap" rowspan="{{ $rows }}">
        @currency($sub->pagu)
    </td>

    {{-- triwulan I-IV --}}
    @foreach ($triwulan as $tw)
    {{-- kinerja --}}
    <td class="text-center nowrap" rowspan="{{ $rows }}">
        {{ $sub->countTotalCapaian($tw) . ' ' . $sub->satuan }}
    </td>
    {{-- kinerja % --}}
    <td class="text-center nowrap" rowspan="{{ $rows }}">
        {{ $rs->where('triwulan', $tw)->isNotEmpty() ? number_format($sub->countTotalCapaian($tw) /
        $sub->target * 100, 1, ',', '') : 0 }} %
    </td>
    {{-- keuangan --}}
    <td class="text-center nowrap" rowspan="{{ $rows }}">
        Rp. {{ $rs->where('triwulan', $tw)->isNotEmpty() ? number_format($pagu_triwulan += $sub->sumTotalRincian($tw),
        0, ',', '.') : 0 }}
    </td>
    {{-- keuangan % --}}
    <td class="text-center nowrap" rowspan="{{ $rows }}">
        {{ ($rs->where('triwulan', $tw)->isNotEmpty() && $sub->pagu !== 0 && $pagu_triwulan) ? number_format(
        $pagu_triwulan / $sub->pagu
        * 100, 1, ',', '') : 0 }} %
    </td>
    @endforeach

    {{-- total triwulan --}}
    {{-- total kinerja --}}
    <td class="text-center nowrap" rowspan="{{ $rows }}">
        {{ (!is_null($rs->last()) ? $rs->last()->capaian : 0) . ' ' . $sub->satuan }}
    </td>
    {{-- total kinerja % --}}
    <td class="text-center nowrap" rowspan="{{ $rows }}">
        {{ $persentase_kinerja }} %
    </td>
    {{-- total keuangan --}}
    <td class="text-center nowrap" rowspan="{{ $rows }}">
        @currency($sub->sumTotal())
    </td>
    {{-- total keuangan % --}}
    <td class="text-center nowrap" rowspan="{{ $rows }}">
        {{ $persentase_pagu }} %
    </td>
    {{-- /. total triwulan --}}

    {{-- penanggung jawab --}}
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