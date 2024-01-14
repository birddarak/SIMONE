<tr style="background-color: rgb(218, 218, 218);" class="collapse" id="kegiatan-{{ $kegiatan->uuid }}" wire:ignore>
    
    <td class="p-1"></td>
    <td class="p-1">
        <div class="input-group m-0">
            <select class="form-control form-control-sm" wire:model='triwulan.{{ $kegiatan->uuid }}'
                wire:keydown.enter='store({{ $kegiatan }})'>
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
                title="Input harus berupa angka" wire:model='capaian.{{ $kegiatan->uuid }}'
                wire:keydown.enter='store({{ $kegiatan }})'>
            <span class="btn btn-sm btn-transparent"> / {{ $kegiatan->satuan }}</span>
        </div>
    </td>
    <td class="p-1" colspan="3"></td>
    <td class="text-center p-1">
        <button class="btn btn-primary" wire:click='store({{ $kegiatan }})'>
            <i class="fas fa-save"></i>
        </button>
    </td>
</tr>