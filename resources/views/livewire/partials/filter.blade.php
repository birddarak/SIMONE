<div class="row mb-4">
    <div class="col-12 col-md-3">
        <select class="form-control" wire:model='tahun_anggaran' wire:change='index()'>
            @for ($i = 2019; $i <= date('Y'); $i++) <option value="{{ $i }}">{{ $i }}</option>
                @endfor
        </select>
    </div>
    <div class="col-12 col-md-3">
        <select class="form-control" wire:model='apbd' wire:change='index()'>
            <option value="murni">MURNI</option>
            <option value="perubahan">PERUBAHAN</option>
        </select>
    </div>
    {{-- @if (Url::currentRoute() == 'dpa.index')
    @include('livewire.partials.duplicate')
    @endif --}}
</div>