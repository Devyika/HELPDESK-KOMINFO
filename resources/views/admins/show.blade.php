@extends('admins.layout')
   
@section('content')
    <div class="row mt-5 mb-5">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2> Tampilan Data Admin</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('admins.index') }}"> Kembali</a>
            </div>
        </div>
    </div>
     
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Username:</strong>
                {{ $admin->username }}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Password:</strong>
                {{ $admin->password }}
            </div>
        </div>
    </div>
@endsection