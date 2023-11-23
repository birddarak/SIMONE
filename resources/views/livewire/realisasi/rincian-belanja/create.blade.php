<tr class="bg-form-program collapse" id="collapse-program">
    <td class="p-1">
        <input type="text" placeholder="RINCIAN" class="form-control @error('rincian') is-invalid @enderror"
            wire:model="rincian">

        @error('rincian')
        <span class="text-danger">
            Mohon isi Rincian
        </span>
        @enderror
    </td>
    <td class="p-1">
        <input type="date" placeholder="TANGGAL" class="form-control @error('tanggal') is-invalid @enderror"
            wire:model="tanggal">

        @error('tanggal')
        <span class="text-danger">
            Mohon isi Tanggal
        </span>
        @enderror
    </td>
    <td class="p-1">
        <input type="number" placeholder="PAGU" class="form-control @error('pagu') is-invalid @enderror"
            wire:model='pagu'>

        @error('pagu')
        <span class="text-danger">
            Mohon isi Pagu
        </span>
        @enderror
    </td>
    <td class="p-1">
        <input type="text" placeholder="KETERANGAN" class="form-control @error('keterangan') is-invalid @enderror"
            wire:model="keterangan">

        @error('keterangan')
        <span class="text-danger">
            Mohon isi Keterangan
        </span>
        @enderror
    </td>
    <td class="p-1">
        <input type="file" placeholder="FILE" class="form-control @error('file') is-invalid @enderror"
            wire:model="file">

        @error('file')
        <span class="text-danger">
            Mohon Tambahkan File
        </span>
        @enderror
    </td>
    <td class="p-1">
        <div class="list-actions d-flex justify-content-around form-inline">
            <button class="btn btn-info btn-icon" wire:click='store'>
                <i class="ik ik-save"></i>
            </button>
        </div>
    </td>
    <td class="p-1"></td>
</tr>