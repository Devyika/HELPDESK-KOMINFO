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
    
    <form action="{{ route('pendaftarans.update',$pendaftaran->id) }}" method="POST" enctype="multipart/form-data"> 
        @csrf
        @method('PUT')
     
         <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>NAMA WEBSITE:</strong>
                    <input type="text" name="namawebsite" value="{{ $pendaftaran->namawebsite }}" class="form-control" placeholder="Nama website">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>LOGO WEBSITE :</strong>
                    <input type="file" name="image" class="form-control" placeholder="image">
                    <img src="/image/{{ $pendaftaran->image }}" width="100px">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>ALAMAT URL :</strong>
                    <input type="text" name="url" value="{{ $pendaftaran->url }}" class="form-control" placeholder="url">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>ID GOOGLE ANALYTIC :</strong>
                    <input type="text" name="token" value="{{ $pendaftaran->token }}" class="form-control" placeholder="id google analytic">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>FILE JSON :</strong>
                    <input type="file" name="file" class="form-control" placeholder="json">
                    <img src="/file/{{ $pendaftaran->file }}" width="100px">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>STATUS :</strong><br>
                    <input type="radio" name="status" value="Publish" id="status" readonly> Publish
                    <input type="radio" name="status"  value="Private" id="status" readonly> Private
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12 text-center">
              <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </div>
     
    </form>
@endsection