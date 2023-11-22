<tr>
    <td></td>
    <td colspan="4">
        <input type="text" placeholder="INDIKATOR"
            class="form-control @error('indikator.{{ $kegiatan->uuid }}') is-invalid @enderror"
            wire:model="indikator.{{ $kegiatan->uuid }}">

        @error('indikator.{{ $kegiatan->uuid }}')
        <span class="text-danger">
            Mohon isi Indikator Kegiatan
        </span>
        @enderror
    </td>
    <td>
        <div class="list-actions d-flex justify-content-around form-inline">
            <button class="btn btn-info btn-icon ml-2 mb-2" wire:click='storeIndikator({{ $kegiatan }})'>
                <i class="ik ik-plus"></i>
            </button>
        </div>
    </td>
</tr>