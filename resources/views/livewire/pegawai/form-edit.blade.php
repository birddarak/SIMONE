<div>
    @dd($pegawai)
    <span data-toggle="tooltip" class="text-center" data-placement="top" title="Edit Pegawai">
        <button data-toggle="modal" data-target="#editModal-{{ $pegawai->uuid }}" data-placement="top"
            title="Edit Pegawai"><i class="ik ik-edit-2"></i></button>
    </span>

    <div class="modal fade" id="editModal-{{ $pegawai->uuid }}" tabindex="-1" role="dialog"
        aria-labelledby="editModalLabel-{{ $pegawai->uuid }}" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editModalLabel-{{ $pegawai->uuid }}">Edit Pegawai</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                            aria-hidden="true">&times;</span></button>
                </div>
                <div class="modal-body">

                    {{-- Form Modal --}}
                    <form id="editForm-{{ $pegawai->uuid }}" class="forms-sample" action="{{ route('pegawai.update', $pegawai->uuid) }}"
                        method="POST">
                        @csrf
                        @method('patch')
                        <div class="form-group">
                            <label for="exampleInputNama1">Nama Pegawai</label>
                            <input type="text" class="form-control" id="exampleInputNama1" placeholder="Nama Pegawai"
                                name="nama" value="{{ $pegawai->nama }}" required>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputNIP">NIP Pegawai</label>
                            <input type="text" class="form-control" id="exampleInputNIP" placeholder="NIP Pegawai"
                                name="nip" value="{{ $pegawai->nip }}" required>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputJabatan">Jabatan Pegawai</label>
                            <input type="text" class="form-control" id="exampleInputJabatan"
                                placeholder="Jabatan Pegawai" name="jabatan" value="{{ $pegawai->jabatan }}" required>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail">Email Pegawai</label>
                            <input type="email" class="form-control" id="exampleInputEmail" placeholder="Email"
                                name="email" value="{{ $pegawai->email }}" required>
                        </div>
                    </form>
                    {{-- --}}

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-primary" form="editForm-{{ $pegawai->uuid }}">Perbaharui</button>
                </div>
            </div>
        </div>
    </div>
</div>