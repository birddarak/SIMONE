<tr class="" style="background-color: rgb(214, 214, 214);">
    <td class="collapse" id="collapse-{{ $pegawai->uuid }}" colspan="8">
        <div class="container">
            <div class="card card-body m-0">
                <div class="row">
                    <form action="" class="col-6">
                        <div class="form-group row">
                            <label for="" class="col-sm-3 col-form-label">Username</label>
                            <label for="" class="col-form-label">:</label>
                            <div class="col-sm-8">
                                <input type="text" value="{{ $pegawai->user->username }}"
                                    wire:blur="updateUser('{{ $pegawai->user->uuid }}', 'username', $event.target.value)" wire:keydown.enter="updateUser('{{ $pegawai->user->uuid }}', 'username', $event.target.value)"
                                    class="form-control">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="" class="col-sm-3 col-form-label">Email</label>
                            <label for="" class="col-form-label">:</label>
                            <div class="col-sm-8">
                                <input type="email" value="{{ $pegawai->user->email }}"
                                    wire:blur="updateUser('{{ $pegawai->user->uuid }}', 'email', $event.target.value)" wire:keydown.enter="updateUser('{{ $pegawai->user->uuid }}', 'email', $event.target.value)"
                                    class="form-control">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="" class="col-sm-3 col-form-label">Rule</label>
                            <label for="" class="col-form-label">:</label>
                            <div class="col-sm-8">
                                <select
                                    wire:change="updateUser('{{ $pegawai->user->uuid }}', 'rule', $event.target.value)"
                                    class="form-control" style="width: 100% !important;">
                                    <option value="">Pilih</option>
                                    <option value="kepala dinas"
                                        {{ $pegawai->user->rule == 'kepala dinas' ? 'selected' : '' }}>
                                        Kepala Dinas</option>
                                    <option value="kabid" {{ $pegawai->user->rule == 'kabid' ? 'selected' : '' }}>
                                        Kabid
                                    </option>
                                    <option value="admin" {{ $pegawai->user->rule == 'admin' ? 'selected' : '' }}>
                                        Admin
                                    </option>
                                </select>
                            </div>
                        </div>
                    </form>
                    <form action="" class="col-6">
                        <div class="form-group row">
                            <label for="" class="col-sm-4 col-form-label">Tanggal dibuat</label>
                            <label for="" class="col-form-label">:</label>
                            <div class="col-sm-7">
                                <input type="text" value="{{ $pegawai->user->created_at }}"
                                    class="form-control text-secondary" readonly>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="" class="col-sm-4 col-form-label">Tanggal diperbaharui</label>
                            <label for="" class="col-form-label">:</label>
                            <div class="col-sm-7">
                                <input type="text" value="{{ $pegawai->user->updated_at }}"
                                    class="form-control text-secondary" readonly>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </td>
</tr>
