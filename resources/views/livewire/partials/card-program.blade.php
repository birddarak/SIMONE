<div class="card border border-2">
    <div class="card-body">
        <table class="text-uppercase col-12">
            <tr>
                <td class="col-3">PAGU DINAS</td>
                <td>:</td>
                @php
                $pagu_program = 0;
                foreach ($programs as $program) {
                foreach ($program->kegiatan as $keg) {
                foreach ($keg->subkegiatan as $sub) {
                $pagu_program += $sub->pagu;
                }
                }
                }
                @endphp
                <td><b>@currency($pagu_program)</b></td>
            </tr>
            <tr>
                <td class="col-3">PAGU TERSERAP</td>
                <td>:</td>
                @php
                $pagu_terserap = 0;
                foreach ($programs as $program) {
                foreach ($program->kegiatan as $keg) {
                foreach ($keg->subkegiatan as $sub) {
                foreach ($sub->realisasi_subkegiatan as $rs) {
                foreach ($rs->rincian_belanja as $rb) {
                $pagu_terserap += $rb->pagu;
                }
                }
                }
                }
                }

                @endphp
                <td>
                    <b class="{{ $pagu_program >= $pagu_terserap ? 'text-success' : 'text-danger' }}">
                        @currency($pagu_terserap)
                    </b>
                </td>
            </tr>
        </table>

    </div>
</div>