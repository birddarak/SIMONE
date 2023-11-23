@foreach ($subkegiatan->indikator_subkegiatan as $indikator_subkegiatan)
    <tr>
        <td></td>
        <td class="p-1" colspan="4">
            <input type="text" value="{{ $indikator_subkegiatan->title }}"
                wire:blur="updateIndikator('{{ $indikator_subkegiatan->uuid }}', 'title', $event.target.value)"
                class="form-control">
        </td>
        <td class="p-1 text-center">
            <button class="btn btn-danger btn-icon"
                onclick="return confirm('Ingin menghapus Indikator Sub Kegiatan ini?')"
                wire:click='destroyIndikator("{{ $indikator_subkegiatan->uuid }}")'><i
                    class="fas fa-times fa-fw"></i></button>
        </td>
        <td></td>
    </tr>
@endforeach
