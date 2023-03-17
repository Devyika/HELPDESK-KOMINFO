@extends('pendaftarans.layout')
   
@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2> Tampilan Data Pendaftaran</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('pendaftarans.index') }}"> Kembali</a>
            </div>
        </div>
    </div>
     
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Nama Website:</strong>
                {{ $pendaftaran->namawebsite}}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Logo:</strong>
                <img src="/image/{{ $pendaftaran->image }}" width="300px">
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>URL:</strong>
                {{ $pendaftaran->url }}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Token:</strong>
                {{ $pendaftaran->token }}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Status:</strong>
                {{ $pendaftaran->status }}
            </div>
        </div>
    </div>
@endsection