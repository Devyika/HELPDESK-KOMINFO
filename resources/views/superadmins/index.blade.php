@extends('superadmins.layout')
     
@section('content')
    <div class="row mt-5 mb-5">
        <div class="col-lg-12 margin-tb">
            <div class="float-left">
                <h2>Data SuperAdmin</h2>
            </div>
            <div class="pull-right">
<<<<<<< HEAD
                <a class="btn btn-success" href="{{ route('superadmins.create') }}"> Tambah Data</a>
=======
                <a class="btn btn-success" href="{{ route('superadmins.create') }}"> Create New SuperAdmin</a>
>>>>>>> origin/eliya
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
            <th width="20px"class="text-center">No</th>
            <th width="280px"class="text-center">Username</th>
            <th width="280px"class="text-center">Password</th>
            <th width="280px"class="text-center">Action</th>
        </tr>
        @foreach ($superadmins as $superadmin)
        <tr>
            <td>{{ ++$i }}</td>
            <td>{{ $superadmin->username }}</td>
            <td>{{ $superadmin->password }}</td>
            <td>
                <form action="{{ route('superadmins.destroy',$superadmin->id) }}" method="POST">
     
                    <a class="btn btn-info btn-sm" href="{{ route('superadmins.show',$superadmin->id) }}">Show</a>
      
                    <a class="btn btn-primary btn-sm" href="{{ route('superadmins.edit',$superadmin->id) }}">Edit</a>
     
                    @csrf
                    @method('DELETE')
        
                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </table>
    
    {!! $superadmins->links() !!}
        
