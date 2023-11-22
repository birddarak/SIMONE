@foreach ($program->indikator_program as $indikator_program)
<tr>
    <td></td>
    <td colspan="5">
        <input type="text" value="{{ $indikator_program->title }}"
            wire:blur="updateIndikator('{{ $indikator_program->uuid }}', 'title', $event.target.value)"
            class="form-control border-bottom border-primary">
    </td>
</tr>
@endforeach