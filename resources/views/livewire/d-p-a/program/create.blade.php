<tr class="bg-form-program collapse" id="collapse-program" wire:ignore>
    <td class="p-1">
        <input type="text" placeholder="KODE" class="form-control @error('kode') is-invalid @enderror" wire:model="kode" wire:keydown.enter='storeProgram()'>

        @error('kode')
            <span class="text-danger">
                Mohon isi Kode Program
            </span>
        @enderror
    </td>
    <td class="p-1">
        <input type="text" placeholder="PROGRAM" class="form-control @error('program') is-invalid @enderror"
            wire:model='program' wire:keydown.enter='storeProgram()'>

        @error('program')
            <span class="text-danger">
                Mohon isi Nama Program
            </span>
        @enderror
    </td>
    <td class="p-1">
        <div class="input-group m-0">
            <input type="text" placeholder="TARGET" class="form-control @error('target') is-invalid @enderror"
                wire:model='target' wire:keydown.enter='storeProgram()'>

            @error('target')
                <span class="text-danger">
                    Mohon isi Nama Target
                </span>
            @enderror
            /
            <input type="text" placeholder="SATUAN" class="form-control @error('satuan') is-invalid @enderror"
                wire:model='satuan' wire:keydown.enter='storeProgram()'>

            @error('satuan')
                <span class="text-danger">
                    Mohon isi Nama Satuan
                </span>
            @enderror
        </div>
    </td>
    <td class="p-1">
        <select class="form-control @error('pegawai_id') is-invalid @enderror" wire:model="pegawai_id"
            style="width: 100% !important;" wire:keydown.enter='storeProgram()'>
            <option value="">PENANGGUNG JAWAB</option>
            @forelse ($pegawais as $pegawai)
                <option value="{{ $pegawai->uuid }}">{{ $pegawai->nama }}</option>
            @empty
                <option value="">Kosong</option>
            @endforelse
        </select>
        @error('pegawai_id')
            <span class="text-danger">
                Mohon isi Penanggung Jawab
            </span>
        @enderror
    </td>
    <td class="p-1"></td>
    <td class="p-1">
        <div class="list-actions d-flex justify-content-around form-inline">
            <button class="btn btn-info btn-icon" wire:click='storeProgram()'>
                <i class="ik ik-save"></i>
            </button>
        </div>
    </td>
    <td class="p-1"></td>
</tr>
