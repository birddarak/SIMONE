<tr style="background-color: rgb(237, 237, 237);" class="collapse" id="collapse-{{ $rs->uuid }}">
    <td class="text-right">
        <i class="ik ik-corner-down-right fa-2x"></i>
    </td>
    <td colspan="">
        <input type="text" class="form-control" placeholder="Deskripsi Rincian...">
    </td>
    <td>
        <div class="input-group m-0">
            <span class="btn">
                Rp.
            </span>
            <input type="number" class="form-control" placeholder="Pagu">
        </div>
        @error('pagu')
        <span class="text-danger">{{ $message }}</span>
        @enderror
    </td>
    <td>
        <input type="date" class="form-control" placeholder="Tanggal" wire:model='tanggal' value="{{ date('Y-m-d') }}">
    </td>
    <td>
        <input type="file" class="form-control" placeholder="FILE">
        @error('file')
        <span class="text-danger">{{ $message }}</span>
        @enderror
    </td>
    <td>
        <button class="btn btn-sm btn-transaparent" wire:click='destroy("{{ $rs->uuid }}")'>
            <i class="ik ik-trash text-danger"></i>
        </button>
    </td>
</tr>