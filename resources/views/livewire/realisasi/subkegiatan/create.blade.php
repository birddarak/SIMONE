<tr style="background-color: rgb(218, 218, 218);" class="collapse" id="subkegiatan-{{ $subkegiatan->uuid }}"
    wire:ignore>

    <td class="p-1"></td>
    <td class="p-1">
        <div class="input-group m-0">
            <select class="form-control form-control-sm" wire:model='triwulan.{{ $subkegiatan->uuid }}'
                wire:keydown.enter='store({{ $subkegiatan }})'>
                <option>.::PILIH TRIWULAN::.</option>
                <option value="I">I</option>
                <option value="II">II</option>
                <option value="III">III</option>
                <option value="IV">IV</option>
            </select>
        </div>
    </td>
    <td class="p-1">
        <div class="input-group m-0">
            <input type="number" class="form-control" placeholder="Capaian" pattern="\d+"
                title="Input harus berupa angka" wire:model='capaian.{{ $subkegiatan->uuid }}'
                wire:keydown.enter='store({{ $subkegiatan }})'>
            <span class="btn btn-sm btn-transparent"> / {{ $subkegiatan->satuan }}</span>
        </div>
    </td>
    <td class="p-1" colspan="3"></td>
    <td class="text-center p-1">
        <button class="btn btn-primary" wire:click='store({{ $subkegiatan }})'>
            <i class="fas fa-save"></i>
        </button>
    </td>
</tr>