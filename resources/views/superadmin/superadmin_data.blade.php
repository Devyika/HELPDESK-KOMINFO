<table class="table table-striped table-bordered">
<thead class="thead-dark">
        <tr>
            <th scope="col">NO</th>
            <th scope="col">USERNAME</th>
            <th scope="col">PASSWORD</th>
            <th scope="col">AKSI</th>
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
                <td><button class="btn btn-info" onclick="edit({{ $v->id }})">Edit</button> <button class="btn btn-danger" onclick="hapus({{ $v->id }})">Hapus</button></td>
            </tr>
            @endforeach
        @else
            <tr>
                <td colspan="6" class="text-center">Data tidak ada...</td>
            </tr>
        @endif
    </tbody>
</table>