@extends('pendaftarans.layout')
<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta http-equiv="x-ua-compatible" content="ie=edge">

  <title>Halaman Superadmin</title>

  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="{{ asset('lte/plugins/fontawesome-free/css/all.min.css') }}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{ asset('lte/dist/css/adminlte.min.css') }}">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>
<body class="hold-transition sidebar-mini">
<div class="wrapper">

  <!-- Navbar -->
  @include('dashboard1/header')
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  @include('dashboard1/sidebar')

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            @section('content')
    <div class="row mt-5 mb-5">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>DATA WEBSITE OPD</h2>
            </div>
            <div class="pull-left">
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
        

          </div><!-- /.col -->
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
      <div class="container-fluid">
        @yield('content')
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <!-- Main Footer -->
  @include('dashboard1/footer')
</div>
<!-- ./wrapper -->

<!-- REQUIRED SCRIPTS -->

<!-- jQuery -->
<script src="{{ asset('lte/plugins/jquery/jquery.min.js') }}"></script>
<!-- Bootstrap 4 -->
<script src="{{ asset('lte/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<!-- AdminLTE App -->
<script src="{{ asset('lte/dist/js/adminlte.min.js') }}"></script>
</body>
</html>

