<tr class=" text-dark" style="background-color: rgb(206, 203, 203);">
    <td>Triwulan</td>
    <td>Capaian & Satuan</td>
    <td>Pagu</td>
    <td>Rincian</td>
    <td>File</td>
    <td>
        <button class="btn btn-sm btn-transparent" data-toggle="collapse" href="#subkegiatan-{{ $subkegiatan->uuid }}"
            role="button" aria-expanded="false" aria-controls="subkegiatan-{{ $subkegiatan->uuid }}">
            <i class="fas fa-plus fa-fw"></i>
        </button>
    </td>
</tr>
<tr style="background-color: rgb(218, 218, 218);" class="collapse" id="subkegiatan-{{ $subkegiatan->uuid }}">
    {{-- <td colspan="5"></td> --}}
    <td class="border ">
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
            <input type="date" class="form-control" placeholder="Tanggal" wire:model='tanggal'
                value="{{ date('Y-m-d') }}">
            @error('target')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>
    </td>
    <td class="border">
        <div class="input-group m-0">
            <input type="text" class="form-control" placeholder="Capaian" wire:model='target'>
            @error('target')
                <span class="text-danger">{{ $message }}</span>
            @enderror
            /
            <input type="text" class="form-control" placeholder="Satuan" wire:model='satuan'>
            @error('target')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>
    </td>
    <td class="border">
        <div class="input-group m-0">
            <span class="btn">
                Rp.
            </span>
            <input type="number" class="form-control" wire:model='pagu'>
        </div>
        @error('pagu')
            <span class="text-danger">{{ $message }}</span>
        @enderror
    </td>
    <td class="border">
        <input type="text" class="form-control" placeholder="RINCIAN" wire:model='rincian'>
        @error('rincian')
            <span class="text-danger">{{ $message }}</span>
        @enderror
    </td>
    <td>
        <input type="file" class="form-control" placeholder="FILE" wire:model='file'>
        @error('file')
            <span class="text-danger">{{ $message }}</span>
        @enderror
    </td>
    <td class="border">
        <button class="btn btn-primary" wire:click='store("{{ $subkegiatan->uuid }}")'>
            <i class="fas fa-save"></i>
        </button>
    </td>
</tr>
