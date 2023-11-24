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

@include('panel.pages.laporan.partials.subkegiatan')

@empty
@endforelse
{{-- /. baris kegiatan --}}