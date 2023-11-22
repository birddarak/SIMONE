@foreach ($kegiatan->indikator_kegiatan as $indikator_kegiatan)
<tr>
    <td></td>
    <td colspan="5">
        <input type="text" value="{{ $indikator_kegiatan->title }}"
            wire:blur="updateIndikator('{{ $indikator_kegiatan->uuid }}', 'title', $event.target.value)"
            class="form-control border-bottom border-primary">
    </td>
</tr>
@endforeach