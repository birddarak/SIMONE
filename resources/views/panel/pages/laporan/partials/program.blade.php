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
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
</tr>

@include('panel.pages.laporan.partials.kegiatan')

@empty
<tr>
    <td class="text-center" colspan="12">DATA KOSONG</td>
</tr>
@endforelse