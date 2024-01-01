{{-- pegawai --}}
<tr style="background-color: rgb(255, 180, 180);">
    <td class="p-1"></td>
    <td class="p-1">
        <input type="text" placeholder="NAMA"
            class="form-control @error('nama')
                    is-invalid @enderror" wire:model="nama" wire:keydown.enter='store()'>

        @error('nama')
            <span class="text-danger">
                Mohon isi Nama Pegawai
            </span>
        @enderror
    </td>
    <td class="p-1">
        <input type="text" placeholder="NIP"
            class="form-control @error('nip')
                    is-invalid @enderror" wire:model='nip' wire:keydown.enter='store()'>

        @error('nip')
            <span class="text-danger">
                Mohon isi NIP Pegawai
            </span>
        @enderror
    </td>
    <td class="p-1">
        <input type="text" placeholder="JABATAN"
            class="form-control @error('jabatan')
                    is-invalid @enderror" wire:model='jabatan' wire:keydown.enter='store()'>

        @error('jabatan')
            <span class="text-danger">
                Mohon isi Jabatan Pegawai
            </span>
        @enderror
    </td>
    <td class="p-1">
        <input type="text" placeholder="USERNAME" class="form-control @error('username') is-invalid @enderror"
            wire:model="username" wire:keydown.enter='store()'>

        @error('username')
            <span class="text-danger">
                Mohon isi Username Akun
            </span>
        @enderror
    </td>
    <td class="p-1">
        <input type="email" placeholder="EMAIL" class="form-control @error('email') is-invalid @enderror"
            wire:model="email" wire:keydown.enter='store()'>

        @error('email')
            <span class="text-danger">
                Mohon isi Email Akun
            </span>
        @enderror
    </td>
    <td class="p-1">
        <select class="form-control @error('rule') is-invalid @enderror" wire:model="rule"
            style="width: 100% !important" wire:keydown.enter='store()'>
            <option value="">PILIH RULE</option>
            <option value="kepala dinas">Kepala Dinas</option>
            <option value="kabid">Kabid</option>
            <option value="admin">Admin</option>
            <option value="non-admin">Non Admin</option>
        </select>

        @error('rule')
            <span class="text-danger">
                Mohon Pilih Rule Akun
            </span>
        @enderror
    </td>
    <td class="p-1">
        <button class="btn btn-primary btn-sm btn-block" wire:click='store()'>
            <i class="ik ik-save"></i>
        </button>
    </td>
</tr>
{{-- pegawai --}}
