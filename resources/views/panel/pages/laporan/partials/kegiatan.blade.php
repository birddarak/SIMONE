{{-- baris kegiatan --}}
@forelse ($prog->kegiatan as $keg)
@php
// menghitung baris row
$rows = $keg->indikator_kegiatan->count() != 0 ? $keg->indikator_kegiatan->count() : '1';

// total realisasi
$rk = $keg->realisasi_kegiatan()->orderBy('triwulan', 'ASC')->get();

// menghitung total capaian & pagu tw i-iv
$persentase_kinerja = !is_null($rk->last()) ? number_format(($rk->last()->capaian / $keg->target * 100), 1, ',', '') :
0;
$persentase_pagu = $keg->sumTotalSubKeg() != 0 ? number_format($keg->sumTotal() / $keg->sumTotalSubKeg() * 100, 1, ',',
'')
: 0;

// untuk menghitung total pagu masing-masing triwulan
$pagu_triwulan = 0;

@endphp
<tr class="kegiatan">
    <td rowspan="{{ $rows }}">
        {{ $keg->kode . ' ' . $keg->title }}</td>
    <td>
        {{ $keg->indikator_kegiatan->count() != 0 ? $keg->indikator_kegiatan->first()->title : '' }}
    </td>
    <td class="text-center nowrap" rowspan="{{ $rows }}">
        {{ $keg->target . ' ' . $keg->satuan }}
    </td>
    <td class="text-right nowrap" rowspan="{{ $rows }}">
        @currency($keg->sumTotalSubKeg())
    </td>

    {{-- triwulan I-IV --}}
    @foreach ($triwulan as $tw)
    {{-- kinerja --}}
    <td class="text-center nowrap" rowspan="{{ $rows }}">
        {{ $keg->countTotalCapaian($tw) . ' ' . $keg->satuan }}
    </td>
    {{-- kinerja % --}}
    <td class="text-center nowrap" rowspan="{{ $rows }}">
        {{ $rk->where('triwulan', $tw)->isNotEmpty() ? number_format($keg->countTotalCapaian($tw) /
        $keg->target * 100, 1, ',', '') : 0 }} %
    </td>
    {{-- keuangan --}}
    <td class="text-center nowrap" rowspan="{{ $rows }}">
        Rp. {{ $rk->where('triwulan', $tw)->isNotEmpty() ? number_format($pagu_triwulan += $keg->sumTotalRincian($tw),
        0, ',', '.') : 0 }}
    </td>
    {{-- keuangan % --}}
    <td class="text-center nowrap" rowspan="{{ $rows }}">
        {{ ($rk->where('triwulan', $tw)->isNotEmpty() && $keg->pagu !== 0 && $pagu_triwulan) ? number_format(
        $pagu_triwulan / $keg->sumTotalSubKeg()
        * 100, 1, ',', '') : 0 }} %
    </td>
    @endforeach

    {{-- total triwulan --}}
    {{-- total kinerja --}}
    <td class="text-center nowrap" rowspan="{{ $rows }}">
        {{ (!is_null($rk->last()) ? $rk->last()->capaian : 0) . ' ' . $keg->satuan }}
    </td>
    {{-- total kinerja % --}}
    <td class="text-center nowrap" rowspan="{{ $rows }}">
        {{ $persentase_kinerja }} %
    </td>
    {{-- total keuangan --}}
    <td class="text-center nowrap" rowspan="{{ $rows }}">
        @currency($keg->sumTotal())
    </td>
    {{-- total keuangan % --}}
    <td class="text-center nowrap" rowspan="{{ $rows }}">
        {{ $persentase_pagu }} %
    </td>
    {{-- /. total triwulan --}}

    {{-- penanggung jawab --}}
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