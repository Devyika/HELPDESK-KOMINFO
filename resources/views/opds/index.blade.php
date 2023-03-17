@extends('opds.layout')
     
@section('content')
    <div class="row mt-5 mb-5">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Data OPD</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-success" href="{{ route('opds.create') }}">Tambah Data </a>
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
            <th width="150px" class="text-center">Username</th>
            <th width="150px" class="text-center">Password</th>
            <th width="400px" class="text-center">Asal Instansi</th>
            <th width="800px"class="text-center">Action</th>
            
        </tr>
        @foreach ($opds as $opd)
        <tr>
            <td>{{ ++$i }}</td>
            <td>{{ $opd->username }}</td>
            <td>{{ $opd->password }}</td>
            <td>{{ $opd->asal }}</td>
            <td>
                <form action="{{ route('opds.destroy',$opd->id) }}" method="POST">
     
                    <a class="btn btn-info btn-sm" href="{{ route('opds.show',$opd->id) }}">Show</a>
      
                    <a class="btn btn-primary btn-sm" href="{{ route('opds.edit',$opd->id) }}">Edit</a>
     
                    @csrf
                    @method('DELETE')
        
                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </table>
    
    {!! $opds->links() !!}
        
@endsection