<div>
    @include('livewire.partials.filter')
    <div class="table-responsive">
        @include('livewire.partials.alert')
        <table class="table table-sm">
            <thead class="thead-dark">
                <tr>
                    <th class="text-center">KODE</th>
                    <th>PROGRAM</th>
                    <th>PENANGGUNG JAWAB</th>
                    <th>PAGU VALIDASI</th>
                    <th>RINCIAN</th>
                    <th>AKSI</th>
                </tr>
            </thead>
            <tbody>

                @include('livewire.d-p-a.program.create')

                {{-- data --}}
                @forelse ($programs as $program)
                <tr>
                    <td>
                        <input type="text" value="{{ $program->kode }}"
                            wire:blur="update('{{ $program->uuid }}', 'kode', $event.target.value)"
                            class="form-control">
                    </td>
                    <td>
                        <input type="text" value="{{ $program->title }}"
                            wire:blur="update('{{ $program->uuid }}', 'title', $event.target.value)"
                            class="form-control">
                    </td>
                    <td>
                        <select wire:change="update('{{ $program->uuid }}', 'pegawai_id', $event.target.value)"
                            class="form-control" style="width: 100% !important;">
                            <option value="">Pilih</option>
                            @forelse ($pegawais as $pegawai)
                            <option value="{{ $pegawai->uuid }}" {{ $pegawai->id == $program->pegawai_id ? 'selected' :
                                ''
                                }}>
                                {{ $pegawai->nama }}
                            </option>
                            @empty
                            <option value="">Kosong</option>
                            @endforelse
                        </select>
                    </td>
                    <td>

                        @php
                        $pagu_validasi = 0;
                        foreach ($program->kegiatan as $keg) {
                        foreach ($keg->subkegiatan as $sub) {
                        $pagu_validasi += $sub->pagu_awal;
                        }
                        }
                        @endphp

                        @currency($pagu_validasi)</td>
                    <td>

                    </td>
                    <td>
                        <div class="list-actions d-flex justify-content-around form-inline">
                            <a href="{{ route('dpa.kegiatan', $program->uuid) }}" class="btn btn-sm">
                                <i class="ik ik-corner-down-right"></i>
                            </a>
                            <button class="btn btn-sm" onclick="return confirm('Ingin menghapus Program ini?')"
                                wire:click='destroy("{{ $program->uuid }}")'><i class="ik ik-trash-2"></i></button>
                        </div>
                    </td>
                </tr>
                @empty
                <tr class="">
                    <td class="text-center" colspan="6">Program Masih Kosong</td>
                </tr>
                @endforelse
                {{-- --}}

            </tbody>
        </table>
    </div>
</div>