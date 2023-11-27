@forelse ($programs as $prog)
    {{-- @php
$jumlah_ip = $prog->indikator_program->count();
@endphp --}}
    <tr class="program">
        <td style="vertical-align: middle;"
            rowspan="{{ $prog->indikator_program->count() != 0 ? $prog->indikator_program->count() : '1' }}">
            {{ $prog->kode . ' ' . $prog->title }}
        </td>
        <td>
            {{ $prog->indikator_program->count() != 0 ? $prog->indikator_program->first()->title : '-' }}
        </td>
        <td class="text-center" style="vertical-align: middle;"
            rowspan="{{ $prog->indikator_program->count() != 0 ? $prog->indikator_program->count() : '1' }}">
            {{ $prog->target . ' ' . $prog->satuan }}
        </td>
        <td class="text-right" style="vertical-align: middle;"
            rowspan="{{ $prog->indikator_program->count() != 0 ? $prog->indikator_program->count() : '1' }}">
            @currency($prog->sumTotalSubKeg())
        </td>
        <td class="text-center"
            rowspan="{{ $prog->indikator_program->count() != 0 ? $prog->indikator_program->count() : '1' }}">
            -
        </td>
        <td class="text-center"
            rowspan="{{ $prog->indikator_program->count() != 0 ? $prog->indikator_program->count() : '1' }}">
            {{ number_format(($prog->sumTotalSubKeg() != 0 ? $prog->sumTotalRincian('I') / $prog->sumTotalSubKeg() : 0) * 100, 1, ',', '') . ' %' }}

        </td>
        <td class="text-center"
            rowspan="{{ $prog->indikator_program->count() != 0 ? $prog->indikator_program->count() : '1' }}">
            @currency($prog->sumTotalRincian('I'))
        </td>
        <td class="text-center"
            rowspan="{{ $prog->indikator_program->count() != 0 ? $prog->indikator_program->count() : '1' }}">
            -
        </td>
        <td class="text-center"
            rowspan="{{ $prog->indikator_program->count() != 0 ? $prog->indikator_program->count() : '1' }}">
            {{ number_format(($prog->sumTotalSubKeg() != 0 ? $prog->sumTotalRincian('II') / $prog->sumTotalSubKeg() : 0) * 100, 1, ',', '') . ' %' }}
        </td>
        <td class="text-center"
            rowspan="{{ $prog->indikator_program->count() != 0 ? $prog->indikator_program->count() : '1' }}">
            @currency($prog->sumTotalRincian('II'))
        </td>
        <td class="text-center"
            rowspan="{{ $prog->indikator_program->count() != 0 ? $prog->indikator_program->count() : '1' }}">
            -
        </td>
        <td class="text-center"
            rowspan="{{ $prog->indikator_program->count() != 0 ? $prog->indikator_program->count() : '1' }}">
            {{ number_format(($prog->sumTotalSubKeg() != 0 ? $prog->sumTotalRincian('III') / $prog->sumTotalSubKeg() : 0) * 100, 1, ',', '') . ' %' }}
        </td>
        <td class="text-center"
            rowspan="{{ $prog->indikator_program->count() != 0 ? $prog->indikator_program->count() : '1' }}">
            @currency($prog->sumTotalRincian('III'))
        </td>
        <td class="text-center"
            rowspan="{{ $prog->indikator_program->count() != 0 ? $prog->indikator_program->count() : '1' }}">
            -
        </td>
        <td class="text-center"
            rowspan="{{ $prog->indikator_program->count() != 0 ? $prog->indikator_program->count() : '1' }}">
            {{ number_format(($prog->sumTotalSubKeg() != 0 ? $prog->sumTotalRincian('IV') / $prog->sumTotalSubKeg() : 0) * 100, 1, ',', '') . ' %' }}
        </td>
        <td class="text-center"
            rowspan="{{ $prog->indikator_program->count() != 0 ? $prog->indikator_program->count() : '1' }}">
            @currency($prog->sumTotalRincian('IV'))
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
        <td class="text-center" colspan="12">DATA KOSONG</td>
    </tr>
@endforelse
