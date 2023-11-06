<div>
    <span data-toggle="tooltip" class="text-center" data-placement="top" title="Tambah Program">
        <button type="button" class="btn btn-outline-primary btn-sm mb-5" data-toggle="modal"
            data-target="#createModal"><i class="ik ik-plus ml-1"></i></button>
    </span>

    <div class="modal fade" id="createModal" tabindex="-1" role="dialog" aria-labelledby="createModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="createModalLabel">Tambah Program</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                            aria-hidden="true">&times;</span></button>
                </div>
                <div class="modal-body">

                    {{-- Form Modal --}}
                    <form id="createForm" class="forms-sample" action="{{ route('program.store') }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="exampleInputKode1">Kode</label>
                            <input type="text" class="form-control" id="exampleInputKode1" placeholder="Kode Program"
                                name="" required>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputProgram">Program</label>
                            <input type="text" class="form-control" id="exampleInputProgram" placeholder="Nama Program"
                                name="" required>
                        </div>
                        <div class="form-group">
                            <label for="">Penanggung Jawab</label>
                            <div>
                                <select class="select2" multiple="multiple" name="program_id">
                                    @forelse ($pegawais as $pegawai)
                                    <option value="{{ $pegawai->uuid }}">{{ $pegawai->nama }}</option>
                                    @empty
                                    <option value="">Pilih</option>
                                    @endforelse
                                </select>
                            </div>
                        </div>
                        {{-- anggaran, dll ???????? --}}
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
</div>