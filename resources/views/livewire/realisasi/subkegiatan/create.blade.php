<tr style="background-color: rgb(218, 218, 218);" class="collapse" id="subkegiatan-{{ $subkegiatan->uuid }}" wire:ignore>

    <td class="p-1"></td>
    <td class="p-1">
        <div class="input-group m-0">
            <select class="form-control form-control-sm" wire:model='triwulan'>
                <option>.::PILIH TRIWULAN::.</option>
                <option value="I">I</option>
                <option value="II">II</option>
                <option value="III">III</option>
                <option value="IV">IV</option>
            </select>
            @error('triwulan')
                <span class="text-danger">{{ $message }}</span>
            @enderror
            <input type="date" class="form-control" placeholder="Tanggal" wire:model='tanggal'>
            @error('tanggal')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>
    </td>
    <td class="p-1">
        <div class="input-group m-0">
            <input type="text" class="form-control" placeholder="Capaian" wire:model='capaian'>
            @error('capaian')
                <span class="text-danger">{{ $message }}</span>
            @enderror
            <span class="btn btn-sm btn-transparent"> / {{ $subkegiatan->satuan }}</span>
        </div>
    </td>
    <td class="p-1"></td>
    <td class="p-1"></td>
    <td class="p-1"></td>
    <td class="text-center p-1">
        <button class="btn btn-primary" wire:click='store("{{ $subkegiatan->uuid }}")'>
            <i class="fas fa-save"></i>
        </button>
    </td>
</tr>
