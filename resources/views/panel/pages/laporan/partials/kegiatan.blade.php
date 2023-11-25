{{-- baris kegiatan --}}
{{-- @php
$jumlah_ik = $keg->indikator_kegiatan->count();
@endphp --}}
@forelse ($prog->kegiatan as $keg)
    <tr class="kegiatan">
        <td style="vertical-align: middle;">
            {{ $keg->kode . ' ' . $keg->title }}</td>
        <td class="text-right" style="vertical-align: middle;">
            {{ $keg->target . ' ' . $keg->satuan }}
        </td>
        <td class="text-right" style="vertical-align: middle;">
            @currency($keg->subkegiatan->sum('pagu'))
        </td>
        <td class="text-center">
            -
        </td>
        <td class="text-center">
            {{ number_format(($keg->sumTotalRincian('I') / $keg->subkegiatan->sum('pagu')) * 100, 1, ',', '') . ' %' }}
        </td>
        <td class="text-center">
            @currency($keg->sumTotalRincian('I'))
        </td>
        <td class="text-center">
            -
        </td>
        <td class="text-center">
            {{ number_format(($keg->sumTotalRincian('II') / $keg->subkegiatan->sum('pagu')) * 100, 1, ',', '') . ' %' }}
        </td>
        <td class="text-center">
            @currency($keg->sumTotalRincian('II'))
        </td>
        <td class="text-center">
            -
        </td>
        <td class="text-center">
            {{ number_format(($keg->sumTotalRincian('III') / $keg->subkegiatan->sum('pagu')) * 100, 1, ',', '') . ' %' }}
        </td>
        <td class="text-center">
            @currency($keg->sumTotalRincian('III'))
        </td>
        <td class="text-center">
            -
        </td>
        <td class="text-center">
            {{ number_format(($keg->sumTotalRincian('IV') / $keg->subkegiatan->sum('pagu')) * 100, 1, ',', '') . ' %' }}
        </td>
        <td class="text-center">
            @currency($keg->sumTotalRincian('IV'))
        </td>
    </tr>

    @include('panel.pages.laporan.partials.subkegiatan')

@empty
@endforelse
{{-- /. baris kegiatan --}}
