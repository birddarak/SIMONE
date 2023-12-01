<div>
    @include('livewire.partials.filter')
    @include('livewire.partials.card-program')
    {{-- @include('livewire.partials.alert') --}}
    <div class="table-responsive">

        <table class="mb-3">
            <tr>
                <td>
                    <i class="fas fa-circle fa-fw text-form-program"></i>
                </td>
                <td>:</td>
                <td>
                    <i>
                        Form Penginputan Program (Klik Tombol + di samping kanan tulisan AKSI untuk menampilkan form)
                    </i>
                </td>
            </tr>
            <tr>
                <td>
                    <i class="fas fa-circle fa-fw text-form-indikator-program"></i>
                </td>
                <td>:</td>
                <td>
                    <i>
                        Form Penginputan indikator Program (Klik Tombol + di baris data Program dan di samping tombol
                        aksi program)
                    </i>
                </td>
            </tr>
        </table>
        <table class="table custom-bordered-table">
            <thead class="thead-dark">
                <tr>
                    <th class="text-center">KODE</th>
                    <th>PROGRAM</th>
                    <th class="text-center">TARGET</th>
                    <th>PENANGGUNG JAWAB</th>
                    <th>PAGU</th>
                    <th>
                        AKSI
                    </th>
                    <th class="text-center">
                        <button class="btn btn-success btn-icon btn-sm" data-toggle="collapse" href="#collapse-program"
                            role="button" aria-expanded="false" aria-controls="collapse-program">
                            <i class="fas fa-plus fa-fw"></i>
                        </button>
                    </th>
                </tr>
            </thead>
            <tbody>
                @include('livewire.d-p-a.program.create')

                {{-- data --}}
                @forelse ($programs as $program)
                    <tr class="@if (session()->has('message')) {!! session('message') == $program->uuid ? 'bg-success' : '' !!} @endif">
                        <td class="p-1">
                            <input type="text" value="{{ $program->kode }}"
                                wire:blur="updateProgram('{{ $program->uuid }}', 'kode', $event.target.value)"
                                wire:keydown.enter="updateProgram('{{ $program->uuid }}', 'kode', $event.target.value)"
                                class="form-control">
                        </td>
                        <td class="p-1">
                            <textarea type="text" value="{{ $program->title }}"
                                wire:blur="updateProgram('{{ $program->uuid }}', 'title', $event.target.value)"
                                wire:keydown.enter="updateProgram('{{ $program->uuid }}', 'title', $event.target.value)" class="form-control" rows="3">{{ $program->title }}</textarea>
                        </td>
                        <td class="p-1 col-2">
                            <div class="input-group m-0">
                                <input type="text" value="{{ $program->target }}"
                                    wire:blur="updateProgram('{{ $program->uuid }}', 'target', $event.target.value)"
                                    wire:keydown.enter="updateProgram('{{ $program->uuid }}', 'target', $event.target.value)"
                                    class="form-control col-3">
                                <span class="btn btn-transparent">
                                    /
                                </span>
                                <input type="text" value="{{ $program->satuan }}"
                                    wire:blur="updateProgram('{{ $program->uuid }}', 'satuan', $event.target.value)"
                                    wire:keydown.enter="updateProgram('{{ $program->uuid }}', 'satuan', $event.target.value)"
                                    class="form-control col-9">
                            </div>
                        </td>
                        <td class="p-1">
                            <select
                                wire:change="updateProgram('{{ $program->uuid }}', 'pegawai_id', $event.target.value)"
                                class="form-control" style="width: 100% !important;">
                                <option value="">PENANGGUNG JAWAB</option>
                                @forelse ($pegawais as $pegawai)
                                    <option value="{{ $pegawai->uuid }}"
                                        {{ $pegawai->id == $program->pegawai_id ? 'selected' : '' }}>
                                        {{ $pegawai->nama }}
                                    </option>
                                @empty
                                    <option value="">Kosong</option>
                                @endforelse
                            </select>
                        </td>
                        <td class="p-1 text-right">
                            @php
                                $pagu_validasi = 0;
                                foreach ($program->kegiatan as $keg) {
                                    foreach ($keg->subkegiatan as $sub) {
                                        $pagu_validasi += $sub->pagu;
                                    }
                                }
                            @endphp

                            @currency($pagu_validasi)
                        </td>
                        <td class="p-1 text-center">
                            <div class="btn-group">
                                <a href="{{ route('dpa.kegiatan', $program->uuid) }}"
                                    class="btn btn-info btn-icon mr-2">
                                    <i class="ik ik-corner-down-right"></i>
                                </a>
                                @if ($program->kegiatan->count() == 0)
                                    <button class="btn btn-danger btn-icon "
                                        onclick="return confirm('Ingin menghapus Program ini?')"
                                        wire:click='destroyProgram("{{ $program->uuid }}")'><i
                                            class="ik ik-trash-2"></i></button>
                                @endif
                            </div>
                        </td>
                        <td class="p-1 text-center">
                            <button class="btn btn-success btn-icon btn-sm" data-toggle="collapse"
                                href="#collapse-{{ $program->uuid }}-indikator" role="button" aria-expanded="false"
                                aria-controls="collapse-{{ $program->uuid }}-indikator">
                                <i class="fas fa-plus fa-fw"></i>
                            </button>
                        </td>
                    </tr>
                    @include('livewire.d-p-a.program.create-indikator')
                    @include('livewire.d-p-a.program.indikator')
                @empty
                    <tr class="">
                        <td class="text-center" colspan="7">Program Masih Kosong</td>
                    </tr>
                @endforelse
                {{-- --}}

            </tbody>
        </table>
    </div>
</div>
