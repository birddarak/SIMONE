@foreach ($program->indikator_program as $indikator_program)
<tr>
    <td></td>
    <td>
        <input type="text" value="{{ $indikator_program->title }}"
            wire:blur="updateIndikator('{{ $indikator_program->uuid }}', 'title', $event.target.value)"
            class="form-control border-left border-right border-primary">
    </td>
    <td>
        <input type="text" value="{{ $indikator_program->target }}"
            wire:blur="updateIndikator('{{ $indikator_program->uuid }}', 'target', $event.target.value)"
            class="form-control border-left border-right border-primary">
    </td>
    <td>
        <input type="text" value="{{ $indikator_program->satuan }}"
            wire:blur="updateIndikator('{{ $indikator_program->uuid }}', 'satuan', $event.target.value)"
            class="form-control border-left border-right border-primary">
    </td>
    <td>
        <div class="list-actions d-flex justify-content-around form-inline">
            <button class="btn btn-danger btn-icon ml-2 mb-2"
                onclick="return confirm('Ingin menghapus Indikator Program ini?')"
                wire:click='destroyIndikator("{{ $indikator_program->uuid }}")'><i class="ik ik-trash-2"></i></button>
        </div>
    </td>
</tr>
@endforeach