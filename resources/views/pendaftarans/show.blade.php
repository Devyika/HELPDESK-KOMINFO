@extends('pendaftarans.layout')
   
@section('content')
<form>
    <div class="row mt-3 mb-3">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2 class="text-center">Data Pendaftaran</h2>
            </div>
        </div>
    </div>
     
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Nama Website:</strong><br>
                {{ $pendaftaran->namawebsite}}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Logo:</strong><br>
                <img src="/image/{{ $pendaftaran->image }}" width="100px">
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>URL:</strong><br>
                {{ $pendaftaran->url }}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Token:</strong><br>
                {{ $pendaftaran->token }}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Status:</strong><br>
                {{ $pendaftaran->status }}
            </div>
        </div>
    </div>
</form>
@endsection