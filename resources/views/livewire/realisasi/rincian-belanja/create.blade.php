<tr class="bg-form-program collapse" id="collapse-program" wire:ignore>
    <td class="p-1">
        <input type="text" placeholder="RINCIAN" class="form-control @error('rincian') is-invalid @enderror"
            wire:model="rincian" wire:keydown.enter='store()'>

        @error('rincian')
            <span class="text-danger">
                Mohon isi Rincian
            </span>
        @enderror
    </td>
    <td class="p-1">
        <input type="date" placeholder="TANGGAL" class="form-control @error('tanggal') is-invalid @enderror"
            wire:model="tanggal" wire:keydown.enter='store()'>

        @error('tanggal')
            <span class="text-danger">
                Mohon isi Tanggal
            </span>
        @enderror
    </td>
    <td class="p-1">
        <input type="number" placeholder="PAGU" class="form-control @error('pagu') is-invalid @enderror"
            wire:model='pagu' pattern="\d+" title="Input harus berupa angka" wire:keydown.enter='store()'>

        @error('pagu')
            <span class="text-danger">
                Mohon isi Pagu
            </span>
        @enderror
    </td>
    <td class="p-1">
        <input type="text" placeholder="KETERANGAN" class="form-control @error('keterangan') is-invalid @enderror"
            wire:model="keterangan" wire:keydown.enter='store()'>

        @error('keterangan')
            <span class="text-danger">
                Mohon isi Keterangan
            </span>
        @enderror
    </td>
    <td class="p-1">
        <input type="file" placeholder="FILE" class="form-control"
            wire:model="file">
            <span class="ml-3 text-danger">*ukuran maksimal 5MB</span>
    </td>
    <td class="p-1">
        <div class="list-actions d-flex justify-content-around form-inline">
            <button class="btn btn-info btn-icon" wire:click='store()'>
                <i class="ik ik-save"></i>
            </button>
        </div>
    </td>
    <td class="p-1"></td>
</tr>
