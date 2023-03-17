@extends('admins.layout')
     
@section('content')
    <div class="row mt-5 mb-5">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>DATA ADMIN</h2>
            </div>
            <div class="float-end">
                <a class="btn btn-success" href="{{ route('admins.create') }}"> Tambah Data</a>
            </div>
        </div>
    </div>
    
    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif
     
    <table class="table table-bordered">
        <tr>
            <th width="20px" class="text-center">No</th>
            <th width="200px" class="text-center">Username</th>
            <th width="200px" class="text-center">Password</th>
            <th width="280px" class="text-center">Action</th>
        </tr>
        @foreach ($admins as $admin)
        <tr>
            <td>{{ ++$i }}</td>
            <td>{{ $admin->username }}</td>
            <td>{{ $admin->password }}</td>
            <td>
                <form action="{{ route('admins.destroy',$admin->id) }}" method="POST">
     
                    <a class="btn btn-info btn-sm" href="{{ route('admins.show',$admin->id) }}">Show</a>
      
                    <a class="btn btn-primary btn-sm" href="{{ route('admins.edit',$admin->id) }}">Edit</a>
     
                    @csrf
                    @method('DELETE')
        
                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </table>
    
    {!! $admins->links() !!}
        
