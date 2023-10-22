<table id="advanced_table" class="table">
    <thead>
        <tr>
            <th class="text-center">No</th>
            <th>Username</th>
            <th>Email</th>
            <th>Rule</th>
            <th>Aksi</th>
            <th></th>
        </tr>
    </thead>
    <tbody>
        @foreach ($users as $user)
        <tr>
            <td class="text-center">{{ $loop->iteration }}</td>
            <td>{{ $user->name }}</td>
            <td>{{ $user->email }}</td>
            <td>{{ $user->rule }}</td>
            <td>
                <div class="list-actions d-flex justify-content-around">
                    <a href="#"><i class="ik ik-eye"></i></a>
                    <a href="#"><i class="ik ik-printer"></i></a>
                    <a href="#"><i class="ik ik-edit-2"></i></a>
                    <a href="#"><i class="ik ik-trash-2"></i></a>
                </div>
            </td>
            <td></td>
        </tr>
        @endforeach
    </tbody>
</table>