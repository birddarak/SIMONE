<tr class="collapse bg-form-indikator-kegiatan " id="collapse-{{ $kegiatan->uuid }}-indikator" wire:ignore>
    <td></td>
    <td class="p-1" colspan="4">
        <input type="text" placeholder="INDIKATOR"
            class="form-control @error('indikator.{{ $kegiatan->uuid }}') is-invalid @enderror"
            wire:model="indikator.{{ $kegiatan->uuid }}" wire:keydown.enter='storeIndikator({{ $kegiatan }})'>

        @error('indikator.{{ $kegiatan->uuid }}')
            <span class="text-danger">
                Mohon isi Indikator Kegiatan
            </span>
        @enderror
    </td>
    <td class="p-1">
        <div class="list-actions d-flex justify-content-around form-inline">
            <button class="btn btn-info btn-icon ml-2 mb-2" wire:click='storeIndikator({{ $kegiatan }})'>
                <i class="ik ik-save"></i>
            </button>
        </div>
    </td>
    <td></td>
</tr>
