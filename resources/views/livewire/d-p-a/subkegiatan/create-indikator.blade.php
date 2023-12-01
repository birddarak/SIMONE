<tr class="bg-form-indikator-subkegiatan  collapse" id="collapse-{{ $subkegiatan->uuid }}-sk" wire:ignore>
    <td></td>
    <td class="p-1" colspan="4">
        <input type="text" placeholder="INDIKATOR"
            class="form-control @error('indikator.{{ $subkegiatan->uuid }}') is-invalid @enderror"
            wire:model="indikator.{{ $subkegiatan->uuid }}" wire:keydown.enter='storeIndikator({{ $subkegiatan }})'>

        @error('indikator.{{ $subkegiatan->uuid }}')
            <span class="text-danger">
                Mohon isi Indikator Sub Kegiatan
            </span>
        @enderror
    </td>
    <td class="p-1 text-center">
        <button class="btn btn-info btn-icon " wire:click='storeIndikator({{ $subkegiatan }})'>
            <i class="ik ik-plus"></i>
        </button>
    </td>
    <td></td>
</tr>
