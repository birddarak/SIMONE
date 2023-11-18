<tr>
    <td>
        <input type="text" placeholder="KODE" class="form-control @error('kode')
                    is-invalid @enderror" wire:model="kode">

        @error('kode')
        <span class="text-danger">
            Mohon isi Kode Program
        </span>
        @enderror
    </td>
    <td>
        <input type="text" placeholder="PROGRAM" class="form-control @error('program')
                    is-invalid @enderror" wire:model='program'>

        @error('program')
        <span class="text-danger">
            Mohon isi Nama Program
        </span>
        @enderror
    </td>
    <td>
        <select class="form-control @error('pegawai_id')
                        is-invalid @enderror" wire:model="pegawai_id" style="width: 100% !important;">
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
    <td> </td>
    <td>
        <button class="btn btn-primary btn-sm btn-block" wire:click='store'>
            <i class="ik ik-save"></i>
        </button>
    </td>
</tr>