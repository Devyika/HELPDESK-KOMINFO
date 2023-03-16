@extends('pendaftarans.layout')
  
@section('content')
<div class="row mt-5 mb-5">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>Pendaftaran Website OPD</h2>
        </div>
        <div class="float-end">
            <a class="btn btn-primary" href="{{ route('pendaftarans.index') }}"> Back</a>
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
     
<form action="{{ route('pendaftarans.store') }}" method="POST" enctype="multipart/form-data">
    @csrf
    
     <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Nama Website:</strong>
                <input type="text" name="namawebsite" class="form-control" placeholder="Nama Website">
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Logo:</strong>
                <input type="file" name="image" class="form-control" placeholder="Logo">
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Alamat URL:</strong>
                <input type="text" name="url" class="form-control" placeholder="url">
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Token:</strong>
                <input type="text" name="token" class="form-control" placeholder="token">
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Status:</strong><br>
                <input type="radio" name="status" value="publish" id="status" selected> Publish
                <input type="radio" name="status"  value="no publish" id="status" selected> No Publish
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                <button type="submit" class="btn btn-primary">Submit</button>
        </div>
    </div>
     
</form>
@endsection