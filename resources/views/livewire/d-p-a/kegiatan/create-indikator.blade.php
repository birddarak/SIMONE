<tr>
    <td></td>
    <td>
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
        <input type="text" placeholder="TARGET"
            class="form-control @error('target.{{ $kegiatan->uuid }}') is-invalid @enderror"
            wire:model='target.{{ $kegiatan->uuid }}'>

        @error('target.{{ $kegiatan->uuid }}')
        <span class="text-danger">
            Mohon isi Target
        </span>
        @enderror
    </td>
    <td>
        <input type="text" placeholder="SATUAN"
            class="form-control @error('satuan.{{ $kegiatan->uuid }}') is-invalid @enderror"
            wire:model='satuan.{{ $kegiatan->uuid }}'>

        @error('satuan.{{ $kegiatan->uuid }}')
        <span class="text-danger">
            Mohon isi Satuan
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