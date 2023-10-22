<span data-toggle="tooltip" data-placement="top" title="Tambah Pegawai">
    <button type="button" class="btn mb-5" data-toggle="modal" data-target="#createModal"><i
            class="ik ik-plus"></i></button>
</span>

<div class="modal fade" id="createModal" tabindex="-1" role="dialog" aria-labelledby="createModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="createModalLabel">Tambah Pegawai</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                        aria-hidden="true">&times;</span></button>
            </div>
            <div class="modal-body">

                {{-- Form Modal --}}
                <form id="createForm" class="forms-sample" action="{{ route('pegawai.store') }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="exampleInputNama1">Nama Pegawai</label>
                        <input type="text" class="form-control" id="exampleInputNama1" placeholder="Nama Pegawai"
                            required>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputNIP">NIP Pegawai</label>
                        <input type="text" class="form-control" id="exampleInputNIP" placeholder="NIP Pegawai" required>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputJabatan">Jabatan Pegawai</label>
                        <input type="text" class="form-control" id="exampleInputJabatan" placeholder="Jabatan Pegawai"
                            required>
                    </div>
                </form>
                {{-- --}}

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                <button type="submit" class="btn btn-primary" form="createForm">Tambahkan</button>
            </div>
        </div>
    </div>
</div>