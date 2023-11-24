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
@empty
@endforelse
{{-- /. baris sub kegiatan --}}