<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="Description" content="Belajar CRUD dengan ajax di laravel">
    <meta name="Author" content="zai.web.id">
    <meta name="Keywords" content="CRUD dengan ajax di laravel" />


    <!--- Favicon --->
    <link rel="icon" href="{{ asset('favicon.ico') }}" type="image/x-icon" />

    <!--- CDN CSS bootstrap --->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

     <!--- CDN Jquery --->
     <script src="https://code.jquery.com/jquery-3.6.1.min.js" integrity="sha256-o88AwQnZB+VDvE9tvIXrMQaPlFFSUTR+nldQm1LuPXQ=" crossorigin="anonymous"></script>
     
    <!--- CDN Jquery bootstrap --->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</head>

<body>

    @stack('costum-script')
</body>
</html>

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
    </div><!-- /.col -->
    <div class="p-4" id="main-content">
          <div class="card mt-5">
            <div class="card-body">
              <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card mt-5 mb-5">
                    <div class="card-header">
                        Data Website OPD
                    </div>
                    <div class="card-body">   
                        <div class="table-responsive" id="area_tabel">
                        @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif
                
                        <table class="table table-bordered table-responsive-lg table-hover">
        <thead class="thead-dark">
            <tr>
            <th scope="col" class= "text-center">NO</th>
            <th scope="col" class= "text-center">NAMA WEBSITE</th>
            <th scope="col" class= "text-center">LOGO</th>
            <th scope="col" class= "text-center">ALAMAT URL</th>
            <th scope="col" class= "text-center">TOKEN</th>
            <th scope="col" class= "text-center">STATUS</th>
            <th scope="col" class= "text-center">AKSI</th>
        </tr>
        </thead>
        <tbody>
        @foreach ($pendaftarans as $pendaftaran)
        <tr>
            <td scope="row">{{ ++$i }}</td>
            <td>{{ $pendaftaran->namawebsite}}</td>
            <td><img src="/image/{{ $pendaftaran->image }}" width="100px"></td>
            <td>{{ $pendaftaran->url }}</td>
            <td>{{ $pendaftaran->token }}</td>
            <td>{{ $pendaftaran->status }}</td>
            <td class="text-center">
            <form action="{{ route('pendaftarans.destroy', $pendaftaran->id) }}" method="POST">

            <a class="text-secondary" data-toggle="modal" id="mediumButton" data-target="#mediumModal"
               data-attr="{{ route('pendaftarans.edit', $pendaftaran->id) }}">
               <i class="btn btn-info">Edit</i>
                </a>
            @csrf
            @method('DELETE')
            
            <button type="submit" title="delete" style="border: none; background-color:transparent;">
             <i class="btn btn-danger" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')">Delete</i>
        </button>
    </form>
            </td>
        </tr>
        @endforeach
        </tbody>
    </table>
    
    {!! $pendaftarans->links() !!}
        
<!-- small modal -->
<div class="modal fade" id="smallModal" tabindex="-1" role="dialog" aria-labelledby="smallModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-sm" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body" id="smallBody">
                    <div>
                        <!-- the result to be displayed apply here -->
                    </div>
                </div>
            </div>
        </div>
    </div>


    <!-- medium modal -->
    <div class="modal fade" id="mediumModal" tabindex="-1" role="dialog" aria-labelledby="mediumModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body" id="mediumBody">
                    <div>
                        <!-- the result to be displayed apply here -->
                    </div>
                </div>
            </div>
        </div>
    </div>


    <script>
        // display a modal (small modal)
        $(document).on('click', '#smallButton', function(event) {
            event.preventDefault();
            let href = $(this).attr('data-attr');
            $.ajax({
                url: href,
                beforeSend: function() {
                    $('#loader').show();
                },
                // return the result
                success: function(result) {
                    $('#smallModal').modal("show");
                    $('#smallBody').html(result).show();
                },
                complete: function() {
                    $('#loader').hide();
                },
                error: function(jqXHR, testStatus, error) {
                    console.log(error);
                    alert("Page " + href + " cannot open. Error:" + error);
                    $('#loader').hide();
                },
                timeout: 8000
            })
        });

        // display a modal (medium modal)
        $(document).on('click', '#mediumButton', function(event) {
            event.preventDefault();
            let href = $(this).attr('data-attr');
            $.ajax({
                url: href,
                beforeSend: function() {
                    $('#loader').show();
                },
                // return the result
                success: function(result) {
                    $('#mediumModal').modal("show");
                    $('#mediumBody').html(result).show();
                },
                complete: function() {
                    $('#loader').hide();
                },
                error: function(jqXHR, testStatus, error) {
                    console.log(error);
                    alert("Page " + href + " cannot open. Error:" + error);
                    $('#loader').hide();
                },
                timeout: 8000
            })
        });

    </script>
          
         
<!-- REQUIRED SCRIPTS -->

<!-- jQuery -->
<script src="{{ asset('lte/plugins/jquery/jquery.min.js') }}"></script>
<!-- Bootstrap 4 -->
<script src="{{ asset('lte/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<!-- AdminLTE App -->
<script src="{{ asset('lte/dist/js/adminlte.min.js') }}"></script>
</body>
</html>

