@extends('pendaftarans.layout')
     
@section('content')
    <div class="row mt-3 mb-3">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2 class="text-center">Edit Data</h2>
            </div>
        </div>
    </div>
     
    @if ($errors->any())
        <div class="alert alert-danger">
            <strong>Whoops!</strong> Input Gagal.<br><br>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    
    <form action="{{ route('lapors.update',$lapor->id) }}" method="POST" enctype="multipart/form-data"> 
        @csrf
        @method('PUT')
     
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>FILE:</strong>
                    <input type="file" name="file" class="form-control" placeholder="file">
                    <img src="/file/{{ $lapor->file }}" width="100px">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>TANGGAL:</strong>
                    <input type="date" name="tanggal" value="{{ $lapor->tanggal }}" class="form-control" placeholder="tanggal">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>KETERANGAN:</strong>
                    <input type="text" name="keterangan" value="{{ $lapor->keterangan }}" class="form-control" placeholder="keterangan">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12 text-center">
              <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </div>
     
    </form>
@endsection