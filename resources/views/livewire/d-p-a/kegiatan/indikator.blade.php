@foreach ($kegiatan->indikator_kegiatan as $indikator_kegiatan)
<tr>
    <td></td>
    <td>
        <input type="text" value="{{ $indikator_kegiatan->title }}"
            wire:blur="updateIndikator('{{ $indikator_kegiatan->uuid }}', 'title', $event.target.value)"
            class="form-control border-left border-right border-primary">
    </td>
    <td>
        <input type="text" value="{{ $indikator_kegiatan->target }}"
            wire:blur="updateIndikator('{{ $indikator_kegiatan->uuid }}', 'target', $event.target.value)"
            class="form-control border-left border-right border-primary">
    </td>
    <td>
        <input type="text" value="{{ $indikator_kegiatan->satuan }}"
            wire:blur="updateIndikator('{{ $indikator_kegiatan->uuid }}', 'satuan', $event.target.value)"
            class="form-control border-left border-right border-primary">
    </td>
    <td>
        <div class="list-actions d-flex justify-content-around form-inline">
            <button class="btn btn-danger btn-icon ml-2 mb-2"
                onclick="return confirm('Ingin menghapus Indikator Kegiatan ini?')"
                wire:click='destroyIndikator("{{ $indikator_kegiatan->uuid }}")'><i class="ik ik-trash-2"></i></button>
        </div>
    </td>
</tr>
@endforeach