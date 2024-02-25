<div>
    @include('livewire.partials.card-rincian-belanja')
    <div class="table-responsive">
        @include('livewire.partials.alert')
        <table class="table custom-bordered-table">
            <thead class="thead-dark">
                <tr>
                    <th class="text-center">RINCIAN <small class="text-danger">*</small></th>
                    <th class="text-center">TANGGAL <small class="text-danger">*</small></th>
                    <th class="text-center">PAGU <small class="text-danger">*</small></th>
                    <th class="text-center">KETERANGAN</th>
                    <th class="text-center">FILE ( pdf/docx )</th>
                    <th class="text-center">AKSI</th>
                    <th class="text-center">
                        <button class="btn btn-success btn-icon btn-sm" data-toggle="collapse" href="#collapse-program"
                            role="button" aria-expanded="false" aria-controls="collapse-program">
                            <i class="fas fa-plus fa-fw"></i>
                        </button>
                    </th>
                </tr>
            </thead>
            <tbody>
                @include('livewire.realisasi.rincian-belanja.create')
                {{-- data --}}
                @forelse ($rincian_belanjas as $rincian_belanja)
                <tr class="">
                    <td class="p-1">
                        <input type="text" value="{{ $rincian_belanja->rincian }}"
                            wire:blur="update('{{ $rincian_belanja->uuid }}', 'rincian', $event.target.value)"
                            wire:keydown.enter="update('{{ $rincian_belanja->uuid }}', 'rincian', $event.target.value)"
                            class="form-control">
                    </td>
                    <td class="p-1">
                        <input type="date" value="{{ $rincian_belanja->tanggal }}"
                            wire:blur="update('{{ $rincian_belanja->uuid }}', 'tanggal', $event.target.value)"
                            wire:keydown.enter="update('{{ $rincian_belanja->uuid }}', 'tanggal', $event.target.value)"
                            class="form-control">
                    </td>
                    <td class="p-1 text-right">
                        <div class="list-actions d-flex justify-content-start form-inline">
                            <input type="number" value="{{ $rincian_belanja->pagu }}"
                                wire:blur="update('{{ $rincian_belanja->uuid }}', 'pagu', $event.target.value)"
                                wire:keydown.enter="update('{{ $rincian_belanja->uuid }}', 'pagu', $event.target.value)"
                                class="form-control">
                            <span class="ml-2">
                                <strong>(@currency($rincian_belanja->pagu))</strong>
                            </span>
                        </div>
                    </td>
                    <td class="p-1">
                        <textarea rows="3" type="text"
                            wire:blur="update('{{ $rincian_belanja->uuid }}', 'keterangan', $event.target.value)"
                            wire:keydown.enter="update('{{ $rincian_belanja->uuid }}', 'keterangan', $event.target.value)"
                            class="form-control">{{ $rincian_belanja->keterangan }}</textarea>
                    </td>
                    <td class="p-1 text-center">
                        @if ($rincian_belanja->file != '')
                        <a href="{{ url('storage') . '/' . $rincian_belanja->file }}" target="_blank">
                            <i class="ik ik-file"></i> Lihat File
                        </a>
                        @else
                        <i>Tidak Ada File</i>
                        @endif
                    </td>
                    <td class="p-1 text-center">
                        <button class="btn btn-danger btn-icon " wire:confirm='Ingin menghapus Rincian ini?'
                            wire:click='destroy("{{ $rincian_belanja->uuid }}")'><i class="ik ik-trash-2"></i></button>
                    </td>
                    <td></td>
                </tr>
                @empty
                <tr class="">
                    <td class="text-center" colspan="6">Rincian Kosong
                    </td>
                </tr>
                @endforelse

            </tbody>
        </table>
    </div>
</div>