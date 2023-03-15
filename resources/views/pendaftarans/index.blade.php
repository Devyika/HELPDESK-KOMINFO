@extends('pendaftarans.layout')
     
@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Laravel 8 CRUD with Image Upload Example from scratch - ItSolutionStuff.com</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-success" href="{{ route('pendaftarans.create') }}"> Create New Pendaftaran</a>
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
            <th>Nama Website</th>
            <th>Logo</th>
            <th>Alamat URL</th>
            <th>Token</th>
            <th>Status</th>
            <th width="280px">Action</th>
        </tr>
        @foreach ($pendaftarans as $pendaftaran)
        <tr>
            <td>{{ ++$i }}</td>
            <td>{{ $pendaftaran->namawebsite}}</td>
            <td><img src="/image/{{ $pendaftaran->image }}" width="100px"></td>
            <td>{{ $pendaftaran->url }}</td>
            <td>{{ $pendaftaran->token }}</td>
            <td>{{ $pendaftaran->status }}</td>
            <td>
                <form action="{{ route('pendaftarans.destroy',$pendaftaran->id) }}" method="POST">
     
                    <a class="btn btn-info" href="{{ route('pendaftarans.show',$pendaftaran->id) }}">Show</a>
      
                    <a class="btn btn-primary" href="{{ route('pendaftarans.edit',$pendaftaran->id) }}">Edit</a>
     
                    @csrf
                    @method('DELETE')
        
                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </table>
    
    {!! $pendaftarans->links() !!}
        
@endsection