<tr class="bg-form-subkegiatan collapse" id="collapse-subkegiatan" wire:ignore>
    <td class="p-1">
        <input type="text" placeholder="KODE" class="form-control @error('kode') is-invalid @enderror" wire:model="kode" wire:keydown.enter='storeSubkegiatan()'>

        @error('kode')
            <span class="text-danger">
                Mohon isi Kode Program
            </span>
        @enderror
    </td>
    <td class="p-1">
        <input type="text" placeholder="SUB KEGIATAN" class="form-control @error('subkegiatan') is-invalid @enderror"
            wire:model='subkegiatan' wire:keydown.enter='storeSubkegiatan()'>

        @error('subkegiatan')
            <span class="text-danger">
                Mohon isi Nama subkegiatan
            </span>
        @enderror
    </td>
    <td class="p-1">
        <div class="input-group m-0">
            <input type="text" placeholder="TARGET" class="form-control @error('target') is-invalid @enderror"
                wire:model='target' wire:keydown.enter='storeSubkegiatan()'>

            @error('target')
                <span class="text-danger">
                    Mohon isi Nama Target
                </span>
            @enderror
            <button class="btn btn-sm btn-transparent">
                /
            </button>
            <input type="text" placeholder="SATUAN" class="form-control @error('satuan') is-invalid @enderror"
                wire:model='satuan' wire:keydown.enter='storeSubkegiatan()'>

            @error('satuan')
                <span class="text-danger">
                    Mohon isi Nama Satuan
                </span>
            @enderror
        </div>
    </td>
    <td class="p-1">
        <select class="form-control @error('pegawai_id')
        is-invalid @enderror" wire:model="pegawai_id"
            style="width: 100% !important;" wire:keydown.enter='storeSubkegiatan()'>
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
    <td class="p-1">
        <input type="number" placeholder="PAGU" class="form-control @error('pagu') is-invalid @enderror"
            wire:model='pagu' wire:keydown.enter='storeSubkegiatan()'>

        @error('pagu')
            <span class="text-danger">
                Mohon isi Pagu
            </span>
        @enderror
    </td>
    <td class="p-1 text-center">
        <button class="btn btn-info btn-icon" wire:click='storeSubkegiatan()'>
            <i class="ik ik-save"></i>
        </button>
    </td>
    <td></td>
</tr>
