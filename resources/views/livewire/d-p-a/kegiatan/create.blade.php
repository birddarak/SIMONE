<tr>
    <td>
        <input type="text" placeholder="KODE" class="form-control @error('kode') is-invalid @enderror"
            wire:model="kode">

        @error('kode')
        <span class="text-danger">
            Mohon isi Kode Kegiatan
        </span>
        @enderror
    </td>
    <td>
        <input type="text" placeholder="KEGIATAN" class="form-control @error('kegiatan') is-invalid @enderror"
            wire:model='kegiatan'>

        @error('kegiatan')
        <span class="text-danger">
            Mohon isi Nama Kegiatan
        </span>
        @enderror
    </td>
    <td>
        <select class="form-control @error('pegawai_id') is-invalid @enderror" wire:model="pegawai_id"
            style="width: 100% !important;">
            <option value="">Pilih</option>
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
    <td> </td>
    <td>
        <div class="list-actions d-flex justify-content-around form-inline">
            <button class="btn btn-success btn-icon ml-2 mb-2" wire:click='storeKegiatan'>
                <i class="ik ik-plus"></i>
            </button>
        </div>
    </td>
</tr>