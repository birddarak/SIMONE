{{-- Button Duplicate --}}
<div class="col-12 col-md-3">
    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#duplicateModal">Duplikat Semua
        Program</button>
</div>

{{-- Modal Duplicate --}}
<div class="modal fade" id="duplicateModal" tabindex="-1" role="dialog" aria-labelledby="duplicateModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-body">
                <form id="duplicate" wire:submit='duplicateData()'>
                    {{-- tahun dan apbd sekarang --}}
                    <div class="card card-body border border-secondary rounded">
                        <p class="text-center mb-4">Program yang ingin di Duplikat</p>
                        <div class="input-group mb-2 mr-sm-2">
                            <div class="input-group-prepend">
                                <div class="btn btn-secondary">TAHUN</div>
                            </div>
                            <select class="form-control" wire:model='tahun_apbd.tahun_awal' required>
                                <option value="">PILIH</option>
                                @for ($i = 2019; $i <= date('Y'); $i++) <option value="{{ $i }}">{{ $i }}</option>
                                    @endfor
                            </select>
                        </div>
                        <div class="input-group mb-2 mr-sm-2">
                            <div class="input-group-prepend">
                                <div class="btn btn-secondary">APBD</div>
                            </div>
                            <select class="form-control" wire:model='tahun_apbd.apbd_awal' required>
                                <option value="">PILIH</option>
                                <option value="murni">MURNI</option>
                                <option value="perubahan">PERUBAHAN
                                </option>
                            </select>
                        </div>
                    </div>

                    <h1 class="text-center">
                        <i class="ik ik-chevrons-down"></i>
                    </h1>

                    {{-- tahun dan apbd tujuan --}}
                    <div class="card card-body border border-primary rounded">
                        <p class="text-center mb-4">Tujuan Duplikat Program</p>

                        <div class="input-group mb-2 mr-sm-2">
                            <div class="input-group-prepend">
                                <div class="btn btn-primary">TAHUN</div>
                            </div>
                            <select class="form-control" wire:model="tahun_apbd.tahun_tujuan" required>
                                <option value="">PILIH</option>
                                @for ($i = 2019; $i <= date('Y'); $i++) <option value="{{ $i }}">{{ $i }}
                                    </option>
                                    @endfor
                            </select>
                        </div>
                        <div class="input-group mb-2 mr-sm-2">
                            <div class="input-group-prepend">
                                <div class="btn btn-primary">APBD</div>
                            </div>
                            <select class="form-control" wire:model="tahun_apbd.apbd_tujuan" required>
                                <option value="">PILIH</option>
                                <option value="murni">MURNI</option>
                                <option value="perubahan">PERUBAHAN</option>
                            </select>
                        </div>
                    </div>
                </form>

                <div class="text-right">
                    <i class="ik ik-info text-primary"></i>
                    <i>
                        menduplikasi semua program sesuai tahun dan apbd yang dipilih
                    </i>
                </div>

            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                <button type="submit" form="duplicate" class="btn btn-primary">Duplikat</button>
            </div>
        </div>
    </div>
</div>