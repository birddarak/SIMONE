<tr style="background-color: rgb(218, 218, 218);" class="collapse" id="program-{{ $program->uuid }}" wire:ignore>
    <td class="p-1"></td>
    <td class="p-1">
        <div class="input-group m-0">
            <select class="form-control form-control-sm" wire:model='triwulan' wire:keydown.enter='store("{{ $program->uuid }}")'>
                <option>.::PILIH TRIWULAN::.</option>
                <option value="I">I</option>
                <option value="II">II</option>
                <option value="III">III</option>
                <option value="IV">IV</option>
            </select>
            @error('triwulan')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>
    </td>
    <td class="p-1">
        <div class="input-group m-0">
            <input type="number" class="form-control" placeholder="Capaian" wire:model='capaian' wire:keydown.enter='store("{{ $program->uuid }}")'>
            @error('capaian')
                <span class="text-danger">{{ $message }}</span>
            @enderror
            <span class="btn btn-sm btn-transparent"> / {{ $program->satuan }}</span>
        </div>
    </td>
    <td class="p-1" colspan="3"></td>
    <td class="text-center p-1">
        <button class="btn btn-primary" wire:click='store("{{ $program->uuid }}")'>
            <i class="fas fa-save"></i>
        </button>
    </td>
</tr>
