<tr wire:ignore class="bg-form-indikator-program  collapse" id="collapse-{{ $program->uuid }}-indikator">
    <td></td>
    <td colspan="4" class="p-1">
        <input type="text" placeholder="INDIKATOR"
            class="form-control @error('indikator.{{ $program->uuid }}') is-invalid @enderror"
            wire:model="indikator.{{ $program->uuid }}" wire:keydown.enter='storeIndikator({{ $program }})'>

        @error('indikator.{{ $program->uuid }}')
            <span class="text-danger">
                Mohon isi Indikator Program
            </span>
        @enderror
    </td>
    <td class="p-1">
        <div class="list-actions d-flex justify-content-around form-inline">
            <button class="btn btn-info btn-icon " wire:click='storeIndikator({{ $program }})'>
                <i class="ik ik-save"></i>
            </button>
        </div>
    </td>
    <td></td>
</tr>
