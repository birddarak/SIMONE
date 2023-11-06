<div>
    <span data-toggle="tooltip" class="text-center" data-placement="top" title="Tambah User">
        <button type="button" class="btn btn-outline-primary btn-sm mb-5" data-toggle="modal"
            data-target="#createModal"><i class="ik ik-plus ml-1"></i></button>
    </span>

    <div class="modal fade" id="createModal" tabindex="-1" role="dialog" aria-labelledby="createModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="createModalLabel">Tambah User</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                            aria-hidden="true">&times;</span></button>
                </div>
                <div class="modal-body">

                    {{-- Form Modal --}}
                    <form id="createForm" class="forms-sample" action="{{ route('user.store') }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="exampleInputUsername1">Username</label>
                            <input type="text" class="form-control" id="exampleInputUsername1" placeholder="Nama User"
                                name="username" required>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail">Email User</label>
                            <input type="email" class="form-control" id="exampleInputEmail" placeholder="Masukkan Email"
                                name="email" required>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Password</label>
                            <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Masukkan Password" name="password1" required>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword2">Konfirmasi Password</label>
                            <input type="password" class="form-control" id="exampleInputPassword2" placeholder="Konfirmasi Password" name="password2" required>
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
</div>