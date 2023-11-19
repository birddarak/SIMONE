<tr>
    <td></td>
    <td>
        <input type="text" placeholder="INDIKATOR"
            class="form-control @error('indikator.{{ $program->uuid }}') is-invalid @enderror"
            wire:model="indikator.{{ $program->uuid }}">

        @error('indikator.{{ $program->uuid }}')
        <span class="text-danger">
            Mohon isi Indikator Program
        </span>
        @enderror
    </td>
    <td>
        <input type="text" placeholder="TARGET"
            class="form-control @error('target.{{ $program->uuid }}') is-invalid @enderror"
            wire:model='target.{{ $program->uuid }}'>

        @error('target.{{ $program->uuid }}')
        <span class="text-danger">
            Mohon isi Target
        </span>
        @enderror
    </td>
    <td>
        <input type="text" placeholder="SATUAN"
            class="form-control @error('satuan.{{ $program->uuid }}') is-invalid @enderror"
            wire:model='satuan.{{ $program->uuid }}'>

        @error('satuan.{{ $program->uuid }}')
        <span class="text-danger">
            Mohon isi Satuan
        </span>
        @enderror
    </td>
    <td>
        <div class="list-actions d-flex justify-content-around form-inline">
            <button class="btn btn-info btn-icon ml-2 mb-2" wire:click='storeIndikator({{ $program }})'>
                <i class="ik ik-plus"></i>
            </button>
        </div>
    </td>
</tr>