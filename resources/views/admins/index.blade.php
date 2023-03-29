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

  <title>Halaman Admin</title>

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
            @extends('admins.layout')
            </div><!-- /.col -->
            @section('content')
    <div class="row mt-3 mb-3">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>DATA ADMIN</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-success text-light" data-toggle="modal" id="mediumButton" data-target="#mediumModal"
                data-attr="{{ route('admins.create') }}" title="Tambah Data"> <i class="fas fa-plus-circle"></i>
                </a>
            </div>
        </div>
    </div>
    
    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif
     
    <table class="table table-bordered table-responsive-lg table-hover">
        <thead class="thead-dark">
            <tr>
            <th scope="col" class= "text-center">No</th>
            <th scope="col" class= "text-center">Username</th>
            <th scope="col" class= "text-center">Password</th>
            <th scope="col" class= "text-center">Action</th>
        </thead>
        <tbody>
        @foreach ($admins as $admin)
        <tr>
            <td scope="row">{{ ++$i }}</td>
            <td>{{ $admin->username}}</td>
            <td>{{ $admin->password }}</td>
            <td class="text-center">
            <form action="{{ route('admins.destroy', $admin->id) }}" method="POST">

            <a data-toggle="modal" id="smallButton" data-target="#smallModal"
             data-attr="{{ route('admins.show', $admin->id) }}" title="show">
             <i class="btn btn-sm btn-info">Show</i>
            </a>

            <a class="text-secondary" data-toggle="modal" id="mediumButton" data-target="#mediumModal"
               data-attr="{{ route('admins.edit', $admin->id) }}">
               <i class="btn btn-sm btn-warning">Edit</i>
                </a>
            @csrf
            @method('DELETE')

            <button type="submit" title="delete" style="border: none; background-color:transparent;">
             <i class="btn btn-sm btn-danger" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')">Delete</i>
        </button>
    </form>
            </td>
        </tr>
        @endforeach
        </tbody>
    </table>
    {!! $admins->links() !!}

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
  @endsection
  
<!-- REQUIRED SCRIPTS -->

<!-- jQuery -->
<script src="{{ asset('lte/plugins/jquery/jquery.min.js') }}"></script>
<!-- Bootstrap 4 -->
<script src="{{ asset('lte/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<!-- AdminLTE App -->
<script src="{{ asset('lte/dist/js/adminlte.min.js') }}"></script>
</body>
</html>