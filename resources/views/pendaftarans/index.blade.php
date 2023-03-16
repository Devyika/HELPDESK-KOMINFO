@extends('pendaftarans.layout')
     
@section('content')
    <<div class="row mt-5 mb-5">
        <div class="col-lg-12 margin-tb">
            <div class="float-left">
                <h2>DATA WEBISTE OPD</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-success" href="{{ route('pendaftarans.create') }}"> Tambah Data</a>
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
            <th width="280px"class="text-center">Nama Website</th>
            <th width="300px"class="text-center">Logo</th>
            <th width="280px"class="text-center">Alamat URL</th>
            <th width="280px"class="text-center">Token</th>
            <th width="280px"class="text-center">Status</th>
            <th width="800px"class="text-center">Action</th>
        </tr>
        @foreach ($pendaftarans as $pendaftaran)
        <tr>
            <td class="text-center">{{ ++$i }}</td>
            <td>{{ $pendaftaran->namawebsite}}</td>
            <td><img src="/image/{{ $pendaftaran->image }}" width="100px"></td>
            <td>{{ $pendaftaran->url }}</td>
            <td>{{ $pendaftaran->token }}</td>
            <td>{{ $pendaftaran->status }}</td>
            <td class="text-center">
                <form action="{{ route('pendaftarans.destroy',$pendaftaran->id) }}" method="POST">
     
                    <a class="btn btn-info btn-sm" href="{{ route('pendaftarans.show',$pendaftaran->id) }}">Show</a>
      
                    <a class="btn btn-primary btn-sm" href="{{ route('pendaftarans.edit',$pendaftaran->id) }}">Edit</a>
     
                    @csrf
                    @method('DELETE')
        
                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </table>
    
    {!! $pendaftarans->links() !!}
        
@endsection