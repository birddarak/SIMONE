@forelse ($programs as $prog)
    {{-- @php
$jumlah_ip = $prog->indikator_program->count();
@endphp --}}
    <tr class="program">
        <td style="vertical-align: middle;">
            {{ $prog->kode . ' ' . $prog->title }}
        </td>
        <td class="text-right" style="vertical-align: middle;">
            {{ $prog->target . ' ' . $prog->satuan }}
        </td>
        <td class="text-right" style="vertical-align: middle;">
            @currency($prog->sumTotalSubKeg())
        </td>
        <td class="text-center">
            -
        </td>
        <td class="text-center">
            {{ number_format(($prog->sumTotalSubKeg() != 0 ? $prog->sumTotalRincian('I') / $prog->sumTotalSubKeg() : 0) * 100, 1, ',', '') . ' %' }}

        </td>
        <td class="text-center">
            @currency($prog->sumTotalRincian('I'))
        </td>
        <td class="text-center">
            -
        </td>
        <td class="text-center">
            {{ number_format(($prog->sumTotalSubKeg() != 0 ? $prog->sumTotalRincian('II') / $prog->sumTotalSubKeg() : 0) * 100, 1, ',', '') . ' %' }}
        </td>
        <td class="text-center">
            @currency($prog->sumTotalRincian('II'))
        </td>
        <td class="text-center">
            -
        </td>
        <td class="text-center">
            {{ number_format(($prog->sumTotalSubKeg() != 0 ? $prog->sumTotalRincian('III') / $prog->sumTotalSubKeg() : 0) * 100, 1, ',', '') . ' %' }}
        </td>
        <td class="text-center">
            @currency($prog->sumTotalRincian('III'))
        </td>
        <td class="text-center">
            -
        </td>
        <td class="text-center">
            {{ number_format(($prog->sumTotalSubKeg() != 0 ? $prog->sumTotalRincian('IV') / $prog->sumTotalSubKeg() : 0) * 100, 1, ',', '') . ' %' }}
        </td>
        <td class="text-center">
            @currency($prog->sumTotalRincian('IV'))
        </td>
    </tr>

    @include('panel.pages.laporan.partials.kegiatan')

@empty
    <tr>
        <td class="text-center" colspan="12">DATA KOSONG</td>
    </tr>
@endforelse
