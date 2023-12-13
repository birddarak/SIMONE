{{-- baris kegiatan --}}
@forelse ($prog->kegiatan as $keg)
@php
// menghitung baris row
$rows = $keg->indikator_kegiatan->count() != 0 ? $keg->indikator_kegiatan->count() : '1';

// total realisasi
$rk = $keg->realisasi_kegiatan()->orderBy('triwulan', 'ASC')->get();

// menghitung total capaian & pagu tw i-iv
$capaian_kinerja = number_format((!is_null($rk->last()) ? $rk->last()->capaian / $keg->target : 0) * 100, 1, ',', '') .
' %';
$capaian_pagu = number_format(($keg->sumTotalSubKeg() != 0 ? $keg->sumTotal() /
$keg->sumTotalSubKeg() : 0) * 100, 1, ',', '') . ' %';

// untuk menghitung total pagu masing-masing triwulan
$pagu_triwulan = 0;

// untuk td triwulan dinamis
$triwulan = ['I', 'II', 'III', 'IV'];
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
        @currency($keg->sumTotalSubKeg())
    </td>

    {{-- total triwulan --}}
    {{-- total kinerja --}}
    <td class="text-center" rowspan="{{ $rows }}">
        {{ (!is_null($rk->last()) ? $rk->last()->capaian : 0) . ' ' . $keg->satuan }}
    </td>
    {{-- total kinerja % --}}
    <td class="text-center" rowspan="{{ $rows }}">
        {{ $capaian_kinerja }}
    </td>
    {{-- total keuangan --}}
    <td class="text-center" rowspan="{{ $rows }}">
        @currency($keg->sumTotal())
    </td>
    {{-- total keuangan % --}}
    <td class="text-center" rowspan="{{ $rows }}">
        {{ $capaian_pagu }}
    </td>
    {{-- /. total triwulan --}}

    {{-- triwulan I-IV --}}
    @foreach ($triwulan as $tw)
    {{-- kinerja --}}
    <td class="text-center" rowspan="{{ $rows }}">
        {{ $keg->countTotalCapaian($tw) . ' ' . $keg->satuan }}
    </td>
    {{-- kinerja % --}}
    <td class="text-center" rowspan="{{ $rows }}">
        {{ number_format((!is_null($rk->last()) ? $keg->countTotalCapaian($tw) /
        $keg->target : 0) * 100, 1, ',', '') . ' %' }}
    </td>
    {{-- keuangan --}}
    <td class="text-center" rowspan="{{ $rows }}">
        @currency($pagu_triwulan += $keg->sumTotalRincian($tw))
    </td>
    {{-- keuangan % --}}
    <td class="text-center" rowspan="{{ $rows }}">
        {{ number_format(($keg->sumTotalSubKeg() != 0 ? ($pagu_triwulan) /
        $keg->sumTotalSubKeg() : 0) * 100, 1, ',', '') . ' %' }}
    </td>
    @endforeach

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