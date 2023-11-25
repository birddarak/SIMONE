{{-- baris sub kegiatan --}}
{{-- @php
$jumlah_ik = $keg->indikator_kegiatan->count();
@endphp --}}
@forelse ($keg->subkegiatan as $sub)
    <tr class="subkegiatan">
        <td style="vertical-align: middle;">
            {{ $sub->kode . ' ' . $sub->title }}</td>
        <td class="text-right" style="vertical-align: middle;">
            {{ $sub->target . ' ' . $sub->satuan }}
        </td>
        <td class="text-right" class="text-right" style="vertical-align: middle;">
            @currency($sub->pagu)

        </td>
        <td class="text-center">
            {{ $sub->countTotalCapaian('I') . ' ' . $sub->satuan }}
        </td>
        <td class="text-center">
            {{ number_format(($sub->sumTotalRincian('I') / $sub->pagu) * 100, 1, ',', '') . ' %' }}
        </td>
        <td class="text-center">
            @currency($sub->sumTotalRincian('I'))
        </td>
        <td class="text-center">
            {{ $sub->countTotalCapaian('II') . ' ' . $sub->satuan }}
        </td>
        <td class="text-center">
            {{ number_format(($sub->sumTotalRincian('II') / $sub->pagu) * 100, 1, ',', '') . ' %' }}
        </td>
        <td class="text-center">
            @currency($sub->sumTotalRincian('II'))
        </td>
        <td class="text-center">
            {{ $sub->countTotalCapaian('III') . ' ' . $sub->satuan }}
        </td>
        <td class="text-center">
            {{ number_format(($sub->sumTotalRincian('III') / $sub->pagu) * 100, 1, ',', '') . ' %' }}
        </td>
        <td class="text-center">
            @currency($sub->sumTotalRincian('III'))
        </td>
        <td class="text-center">
            {{ $sub->countTotalCapaian('IV') . ' ' . $sub->satuan }}
        </td>
        <td class="text-center">
            {{ number_format(($sub->sumTotalRincian('IV') / $sub->pagu) * 100, 1, ',', '') . ' %' }}
        </td>
        <td class="text-center">
            @currency($sub->sumTotalRincian('IV'))
        </td>
    </tr>
@empty
@endforelse
{{-- /. baris sub kegiatan --}}
