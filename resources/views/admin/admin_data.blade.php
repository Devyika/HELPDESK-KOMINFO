<table class="table table-striped table-bordered">
<thead class="thead-dark">
        <tr>
            <th scope="col" class="text-center">NO</th>
            <th scope="col" class="text-center">USERNAME</th>
            <th scope="col" class="text-center">PASSWORD</th>
            <th scope="col" class="text-center">ROLE</th>
            <th scope="col" class="text-center">AKSI</th>
        </tr>
    </thead>
    <tbody>
        @if(count($data) > 0)
            <?php $no=1; ?>
            @foreach($data as $v)
            <tr>
                <td>{{ $no++ }}</td>
                <td>{{ $v->username }}</td>
                <td>{{ $v->password }}</td>
                <td>{{ $v->role_id }}</td>
                <td><button class="btn btn-info" onclick="edit({{ $v->id_user }})"><i class="fas fa-edit"></i></button> <button class="btn btn-danger" onclick="hapus({{ $v->id_user }})"><i class="fas fa-trash"></i></button></td>
            </tr>
            @endforeach
        @else
            <tr>
                <td colspan="6" class="text-center">Data tidak ada...</td>
            </tr>
        @endif
    </tbody>
</table>