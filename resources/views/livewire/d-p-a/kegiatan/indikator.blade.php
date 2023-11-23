@foreach ($kegiatan->indikator_kegiatan as $indikator_kegiatan)
    <tr>
        <td></td>
        <td class="p-1" colspan="4">
            <input type="text" value="{{ $indikator_kegiatan->title }}"
                wire:blur="updateIndikator('{{ $indikator_kegiatan->uuid }}', 'title', $event.target.value)"
                class="form-control">
        </td>
        <td class="text-center">
            <button class="btn btn-danger btn-icon" onclick="return confirm('Ingin menghapus Indikator Kegiatan ini?')"
            wire:click='destroyIndikator("{{ $indikator_kegiatan->uuid }}")'>
                <i class="fas fa-times fa-fw"></i>
            </button>
        </td>
        <td></td>
    </tr>
@endforeach
