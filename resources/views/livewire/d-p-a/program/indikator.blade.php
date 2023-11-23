@foreach ($program->indikator_program as $indikator_program)
    <tr>
        <td></td>
        <td colspan="4" class="p-1">
            <input type="text" value="{{ $indikator_program->title }}"
                wire:blur="updateIndikator('{{ $indikator_program->uuid }}', 'title', $event.target.value)"
                class="form-control">
        </td>
        <td class="text-center">
            <button class="btn btn-danger btn-icon" onclick="return confirm('Ingin menghapus Indikator Program ini?')"
            wire:click='destroyIndikator("{{ $indikator_program->uuid }}")'>
                <i class="fas fa-times fa-fw"></i>
            </button>
        </td>
        <td></td>
    </tr>
@endforeach
