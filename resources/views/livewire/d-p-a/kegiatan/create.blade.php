<tr class="bg-form-kegiatan collapse" id="collapse-kegiatan" wire:ignore>
    <td class="p-1">
        <input type="text" placeholder="KODE" class="form-control @error('kode') is-invalid @enderror" wire:model="kode" wire:keydown.enter='storeKegiatan()'>

        @error('kode')
            <span class="text-danger">
                Mohon isi Kode Kegiatan
            </span>
        @enderror
    </td>
    <td class="p-1">
        <input type="text" placeholder="KEGIATAN" class="form-control @error('kegiatan') is-invalid @enderror"
            wire:model='kegiatan' wire:keydown.enter='storeKegiatan()'>

        @error('kegiatan')
            <span class="text-danger">
                Mohon isi Nama Kegiatan
            </span>
        @enderror
    </td>
    <td class="p-1">
        <div class="input-group m-0">
            <input type="text" placeholder="TARGET" class="form-control @error('target') is-invalid @enderror"
                wire:model='target' pattern="\d+" title="Input harus berupa angka" wire:keydown.enter='storeKegiatan()'>

            @error('target')
                <span class="text-danger">
                    Mohon isi Nama Target
                </span>
            @enderror
            <div class="btn btn-transparent">
                /
            </div>
            <input type="text" placeholder="SATUAN" class="form-control @error('satuan') is-invalid @enderror"
                wire:model='satuan' wire:keydown.enter='storeKegiatan()'>

            @error('satuan')
                <span class="text-danger">
                    Mohon isi Nama Satuan
                </span>
            @enderror
        </div>
    </td>
    <td class="p-1">
        <select class="form-control @error('pegawai_id') is-invalid @enderror" wire:model="pegawai_id"
            style="width: 100% !important;" wire:keydown.enter='storeKegiatan()'>
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
    <td class="p-1"> </td>
    <td class="p-1 text-center">
        <button class="btn btn-info btn-icon ml-2 mb-2" wire:click='storeKegiatan()'>
            <i class="ik ik-save"></i>
        </button>
    </td>
    <td></td>
</tr>
