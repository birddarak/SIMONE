<tr class="bg-info text-white">
    <td>Triwulan</td>
    <td>Target & Satuan</td>
    <td>Pagu</td>
    <td>Rincian</td>
    <td>File</td>
    <td>
        <i class="fas fa-cog fa-fw"></i>
    </td>
</tr>
<tr style="background-color: rgb(218, 218, 218);">
    {{-- <td colspan="5"></td> --}}
    <td class="border ">
        <div class="input-group">
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
        <div class="input-group">
            <input type="text" class="form-control" placeholder="TARGET" wire:model='target'>
            @error('target')
            <span class="text-danger">{{ $message }}</span>
            @enderror
            /
            <input type="text" class="form-control" placeholder="SATUAN" wire:model='satuan'>
            @error('target')
            <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>
    </td>
    <td class="border">
        <div class="input-group">
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