@extends('superadmins.layout')
     
@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Laravel 8 CRUD with Image Upload Example from scratch - ItSolutionStuff.com</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-success" href="{{ route('superadmins.create') }}"> Create New SuperAdmin</a>
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
            <th>No</th>
            <th>Username</th>
            <th>Password</th>
            <th width="280px">Action</th>
        </tr>
        @foreach ($superadmins as $superadmin)
        <tr>
            <td>{{ ++$i }}</td>
            <td>{{ $superadmin->username }}</td>
            <td>{{ $superadmin->password }}</td>
            <td>
                <form action="{{ route('superadmins.destroy',$superadmin->id) }}" method="POST">
     
                    <a class="btn btn-info" href="{{ route('superadmins.show',$superadmin->id) }}">Show</a>
      
                    <a class="btn btn-primary" href="{{ route('superadmins.edit',$superadmin->id) }}">Edit</a>
     
                    @csrf
                    @method('DELETE')
        
                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </table>
    
    {!! $superadmins->links() !!}
        
@endsectiona