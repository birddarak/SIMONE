@foreach ($subkegiatan->indikator_subkegiatan as $indikator_subkegiatan)
<tr>
    <td></td>
    <td colspan="4">
        <input type="text" value="{{ $indikator_subkegiatan->title }}"
            wire:blur="updateIndikator('{{ $indikator_subkegiatan->uuid }}', 'title', $event.target.value)"
            class="form-control border-bottom border-primary">
    </td>
    <td>
        <div class="list-actions d-flex justify-content-around form-inline">
            <button class="btn btn-danger btn-icon ml-2 mb-2"
                onclick="return confirm('Ingin menghapus Indikator Sub Kegiatan ini?')"
                wire:click='destroyIndikator("{{ $indikator_subkegiatan->uuid }}")'><i
                    class="ik ik-trash-2"></i></button>
        </div>
    </td>
</tr>
@endforeach