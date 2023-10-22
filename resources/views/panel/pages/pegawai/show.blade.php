<table id="advanced_table" class="table">
    <thead>
        <tr>
            <th class="text-center">No</th>
            <th>Nama</th>
            <th>NIP</th>
            <th>Jabatan</th>
            <th>Aksi</th>
            <th></th>
        </tr>
    </thead>
    <tbody>
        @foreach ($pegawais as $pegawai)
        <tr>
            <td class="text-center">{{ $loop->iteration }}</td>
            <td>{{ $pegawai->nama }}</td>
            <td>{{ $pegawai->nip }}</td>
            <td>{{ $pegawai->jabatan }}</td>
            <td>
                <div class="list-actions d-flex justify-content-around">
                    <span data-toggle="tooltip" data-placement="top" title="Lihat Detail">
                        <a href="#"><i class="ik ik-eye"></i></a>
                    </span>
                    <span data-toggle="tooltip" data-placement="top" title="Tambah Pegawai">
                        <a href="#"><i class="ik ik-inbox"></i></a>
                    </span>
                    <span data-toggle="tooltip" data-placement="top" title="Tambah Pegawai">
                        <a href="#"><i class="ik ik-edit-2"></i></a>
                    </span>
                    <span data-toggle="tooltip" data-placement="top" title="Tambah Pegawai">
                        <a href="#"><i class="ik ik-trash-2"></i></a>
                    </span>
                </div>
            </td>
            <td></td>
        </tr>
        @endforeach
    </tbody>

</table>