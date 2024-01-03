@php
$pagu_target = 0;
$pagu_realisasi = 0;
$pagu_twi = 0;
$pagu_twii = 0;
$pagu_twiii = 0;
$pagu_twiv = 0;
@endphp

{{-- baris program --}}
@forelse ($programs as $prog)
@php
// menghitung baris row
$rows = $prog->indikator_program->count() != 0 ? $prog->indikator_program->count() : '1';

// total realisasi
$rp = $prog->realisasi_program()->orderBy('triwulan', 'ASC')->get();

// menghitung total capaian & pagu tw i-iv
$persentase_kinerja = !is_null($rp->last()) ? number_format(($rp->last()->capaian / $prog->target * 100), 1, ',', '') :
0;
$persentase_pagu = $prog->sumTotalSubKeg() != 0 ? number_format($prog->sumTotal() / $prog->sumTotalSubKeg() * 100, 1,
',', '') : 0;

// untuk menghitung total pagu masing-masing triwulan
$pagu_triwulan = 0;

// untuk looping realisasi triwulan agar dinamis
$triwulan = ['I', 'II', 'III', 'IV'];

// menambahkan total pagu program
$pagu_target += $prog->sumTotalSubKeg();
$pagu_realisasi += $prog->sumTotal();
@endphp
<tr class="program">
    <td rowspan="{{ $rows }}">
        {{ $prog->kode . ' ' . $prog->title }}
    </td>
    <td>
        {{ $prog->indikator_program->count() != 0 ? $prog->indikator_program->first()->title : '' }}
    </td>
    <td class="text-center nowrap" rowspan="{{ $rows }}">
        {{ $prog->target . ' ' . $prog->satuan }}
    </td>
    <td class="text-right nowrap" rowspan="{{ $rows }}">
        @currency($prog->sumTotalSubKeg())
    </td>

    {{-- triwulan I-IV --}}
    @foreach ($triwulan as $tw)
    {{-- kinerja --}}
    <td class="text-center nowrap" rowspan="{{ $rows }}">
        {{ $prog->countTotalCapaian($tw) . ' ' . $prog->satuan }}
    </td>
    {{-- kinerja % --}}
    <td class="text-center nowrap" rowspan="{{ $rows }}">
        {{ $rp->where('triwulan', $tw)->isNotEmpty() ? number_format($prog->countTotalCapaian($tw) /
        $prog->target * 100, 1, ',', '') : 0 }} %
    </td>
    {{-- keuangan --}}
    <td class="text-center nowrap" rowspan="{{ $rows }}">
        Rp. {{ $rp->where('triwulan', $tw)->isNotEmpty() ? number_format($pagu_triwulan += $prog->sumTotalRincian($tw),
        0, ',', '.') : 0 }}
    </td>
    {{-- keuangan % --}}
    <td class="text-center nowrap" rowspan="{{ $rows }}">
        {{ ($rp->where('triwulan', $tw)->isNotEmpty() && $prog->pagu !== 0 && $pagu_triwulan) ? number_format(
        $pagu_triwulan / $prog->sumTotalSubKeg()
        * 100, 1, ',', '') : 0 }} %
    </td>

    {{-- total triwulan --}}
    @php
    switch ($tw) {
    case 'I':
    $pagu_twi += $prog->sumTotalRincian($tw);
    break;
    case 'II':
    $pagu_twii += $prog->sumTotalRincian($tw);
    break;
    case 'III':
    $pagu_twiii += $prog->sumTotalRincian($tw);
    break;
    case 'IV':
    $pagu_twiv += $prog->sumTotalRincian($tw);
    break;
    }
    @endphp

    @endforeach

    {{-- total triwulan --}}
    {{-- total kinerja --}}
    <td class="text-center nowrap" rowspan="{{ $rows }}">
        {{ (!is_null($rp->last()) ? $rp->last()->capaian : 0) . ' ' . $prog->satuan }}
    </td>
    {{-- total kinerja % --}}
    <td class="text-center nowrap" rowspan="{{ $rows }}">
        {{ $persentase_kinerja }} %
    </td>
    {{-- total keuangan --}}
    <td class="text-center nowrap" rowspan="{{ $rows }}">
        @currency($prog->sumTotal())
    </td>
    {{-- total keuangan % --}}
    <td class="text-center nowrap" rowspan="{{ $rows }}">
        {{ $persentase_pagu }} %
    </td>
    {{-- /. total triwulan --}}

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

<tr class="header">
    <td class="text-center" colspan="3">Total Anggaran : </td>
    <td class="text-center">@currency(($pagu_target != 0) ? $pagu_target : 0)</td>
    {{-- triwulan I --}}
    <td class="text-center" colspan="2">Total Triwulan I : </td>
    <td class="text-center">@currency(($pagu_twi != 0) ? $pagu_twi : 0)</td>
    <td>{{ ($pagu_twi != 0) ? number_format($pagu_twi / $pagu_target * 100, 1, ',', '.') : 0 }} %</td>
    {{-- triwulan II --}}
    <td class="text-center" colspan="2">Total Triwulan II : </td>
    <td class="text-center">@currency(($pagu_twii != 0) ? ($pagu_twii + $pagu_twi) : 0)</td>
    <td>{{ ($pagu_twii != 0) ? number_format(($pagu_twii + $pagu_twi) / $pagu_target * 100, 1, ',', '.') : 0 }} %</td>
    {{-- triwulan III --}}
    <td class="text-center" colspan="2">Total Triwulan III : </td>
    <td class="text-center">@currency(($pagu_twiii != 0) ? ($pagu_twiii + $pagu_twii + $pagu_twi) : 0)</td>
    <td>{{ ($pagu_twiii != 0) ? number_format(($pagu_twiii + $pagu_twii + $pagu_twi) / $pagu_target * 100, 1, ',', '.') : 0 }} %</td>
    {{-- triwulan IV --}}
    <td class="text-center" colspan="2">Total Triwulan IV : </td>
    <td class="text-center">@currency(($pagu_twiv != 0) ? ($pagu_twiv + $pagu_twiii + $pagu_twii + $pagu_twi) : 0)</td>
    <td>{{ ($pagu_twiv != 0) ? number_format(($pagu_twiv + $pagu_twiii + $pagu_twii + $pagu_twi) / $pagu_target * 100, 1, ',', '.') : 0 }} %</td>

    <td class="text-center" colspan="2">Total Realisasi : </td>
    <td class="text-center">@currency($pagu_realisasi)</td>
    <td>{{ ($pagu_realisasi != 0) ? number_format($pagu_realisasi / $pagu_target * 100, 1, ',', '.') : 0 }} %</td>

    <td></td>
</tr>