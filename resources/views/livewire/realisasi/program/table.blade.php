<div>
    @include('livewire.partials.filter')
    @include('livewire.partials.card-program')
    <div class="table-responsive">
        <table class="table custom-bordered-table">
            <thead class="thead-dark">
                <tr>
                    <th class="text-center">KODE</th>
                    <th class="text-center">PROGRAM</th>
                    <th class="text-center">TARGET</th>
                    <th class="text-center">PAGU</th>
                    <th class="text-center">PAGU TERSERAP</th>
                    <th class="text-center">PENANGGUNG JAWAB</th>
                    <th class="text-center">AKSI</th>
                </tr>
            </thead>
            <tbody>

                {{-- data --}}
                @forelse ($programs as $program)
                <tr style="background-color: #FFD966">
                    <th>
                        {{ $program->kode }}
                    </th>
                    <th class="col-2">
                        {{ $program->title }}
                    </th>
                    <th class="text-center">
                        {{ $program->target . ' ' . $program->satuan }}
                    </th>
                    <th class="text-right">
                        <b>
                            @currency($program->sumTotalSubKeg())
                        </b>
                    </th>
                    <th class="text-right">
                        <b
                            class="{{ $program->sumTotalSubKeg() < $program->sumTotal() ? 'text-danger' : 'text-dark' }}">
                            @currency($program->sumTotal())
                        </b>
                    </th>
                    <th class="text-center">
                        {{ $program->pegawai->nama }}
                    </th>
                    <th class="text-center p-1">
                        <div class="btn-group">
                            <a href="{{ route('realisasi.kegiatan', $program->uuid) }}"
                                class="btn btn-info btn-icon ml-2 mb-2">
                                <i class="ik ik-corner-down-right"></i>
                            </a>
                        </div>
                        <div class="btn-group">
                            @if (auth()->user()->rule != 'kabid')
                            @if ($program->realisasi_program->count() < 4) <button
                                class="btn btn-sm btn-success btn-icon mb-2" data-toggle="collapse"
                                href="#program-{{ $program->uuid }}" role="button" aria-expanded="false"
                                aria-controls="program-{{ $program->uuid }}">
                                <i class="fas fa-plus fa-fw"></i>
                                </button>
                                @endif
                                @endif
                        </div>
                    </th>
                </tr>
                @if (auth()->user()->rule != 'kabid')
                @if ($program->realisasi_program->count() < 4) {{-- tombol create --}}
                    @include('livewire.realisasi.program.create') {{-- /. tombol create --}} @endif @endif {{-- tampilan
                    realisasi --}} @include('livewire.realisasi.program.realisasi') {{-- /. tampilan realisasi --}}
                    @empty <tr class="">
                    <td class="text-center" colspan="7">Program Masih Kosong, Mohon Tambahkan dimenu DPA</td>
                    </tr>
                    @endforelse
                    {{-- --}}

            </tbody>
        </table>
    </div>
</div>