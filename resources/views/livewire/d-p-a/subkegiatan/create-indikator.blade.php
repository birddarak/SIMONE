<tr>
    <td></td>
    <td colspan="4">
        <input type="text" placeholder="INDIKATOR"
            class="form-control @error('indikator.{{ $subkegiatan->uuid }}') is-invalid @enderror"
            wire:model="indikator.{{ $subkegiatan->uuid }}">

        @error('indikator.{{ $subkegiatan->uuid }}')
        <span class="text-danger">
            Mohon isi Indikator Sub Kegiatan
        </span>
        @enderror
    </td>
    <td>
        <div class="list-actions d-flex justify-content-around form-inline">
            <button class="btn btn-info btn-icon ml-2 mb-2" wire:click='storeIndikator({{ $subkegiatan }})'>
                <i class="ik ik-plus"></i>
            </button>
        </div>
    </td>
</tr>