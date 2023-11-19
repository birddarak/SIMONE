<tr>
    <td></td>
    <td>
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
        <input type="text" placeholder="TARGET"
            class="form-control @error('target.{{ $subkegiatan->uuid }}') is-invalid @enderror"
            wire:model='target.{{ $subkegiatan->uuid }}'>

        @error('target.{{ $subkegiatan->uuid }}')
        <span class="text-danger">
            Mohon isi Target
        </span>
        @enderror
    </td>
    <td>
        <input type="text" placeholder="SATUAN"
            class="form-control @error('satuan.{{ $subkegiatan->uuid }}') is-invalid @enderror"
            wire:model='satuan.{{ $subkegiatan->uuid }}'>

        @error('satuan.{{ $subkegiatan->uuid }}')
        <span class="text-danger">
            Mohon isi Satuan
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