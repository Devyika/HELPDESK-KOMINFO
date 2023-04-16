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
  @include('dashboard2/header')
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  @include('dashboard2/sidebar')

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
                        Data OPD
                    </div>
                    <div class="card-body">
                        
                        <div class="pull-left mb-3">
                            <button class="btn btn-primary" onclick="input()">Tambah data</button>
                            <button class="btn btn-secondary" onclick="reload_table()">Refresh</button>
                        </div>
                        
                        <div class="table-responsive" id="area_tabel"></div>

                    </div>
                </div>
            </div>
        </div>
    </div>


    <div class="modal" tabindex="-1" id="mdl_modal_form" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div id="content_modal_form"></div>
            </div>
        </div>
    </div>

    <script>    
    $(window).on("load", function() { //otomatis aktif ketika page di refresh
		reload_table(); //fungsi untuk load table
	});

    $(function() { //otomatis aktif ketika page di jalankan
        //fungsi untuk load csrf token
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
    });

    //fungsi untuk load tabel
    window.reload_table = function() {
        var url = "{{ route('opd.data') }}";
        var param = {};
        $.ajax({
            type: "GET",
            dataType: "json",
            data: param,
            url: url,
            beforeSend: function() {
                $("#area_tabel").html("<div class='text-center pt-4 pb-4'>Mohon Tunggu...</div>");
            },
            success: function(val) {
                $("#area_tabel").html(val['data']);
            }
        });
    }

    //fungsi untuk load form input
    window.input = function() {
        $("#mdl_modal_form").modal({backdrop: 'static',keyboard: false});
        var url = "{{ route('opd.input') }}";
        var param = {};
        $.ajax({
            type: "GET",
            dataType: "json",
            data: param,
            url: url,
            beforeSend: function() {
                $("#content_modal_form").html("<div class='text-center pt-4 pb-4'>Mohon Tunggu...</div>");
            },
            success: function(val) {
                $("#content_modal_form").html(val['data']);
            }
        });
    }

    //fungsi untuk load form edit
    window.edit = function(id) {
        $("#mdl_modal_form").modal({backdrop: 'static',keyboard: false});
        var url = "{{ route('opd.edit') }}";
        var param = {id: id};
        $.ajax({
            type: "GET",
            dataType: "json",
            data: param,
            url: url,
            beforeSend: function() {
                $("#content_modal_form").html("<div class='text-center pt-4 pb-4'>Mohon Tunggu...</div>");
            },
            success: function(val) {
                $("#content_modal_form").html(val['data']);
            }
        });
    }

    //fungsi untuk insert atau update
    window.formSubmit = function(id){
        var param = $("#" + id).serialize();
        var url = $("#" + id).attr("url");
        $.ajax({
            type: "POST",
            dataType: "json",
            data: param,
            url: url,
            beforeSend: function() {
                $('#msg_'+id+'').addClass('fa fa-spinner fa-spin');
            },
            success: function(val) {
                $('#msg_'+id+'').removeClass('fa fa-spinner fa-spin');
                if (val["status"] == false) {
                    alert(val['info']);
                }else{
                    $("#" + id)[0].reset();
                    alert(val['info']);
                    reload_table();
                    $("#mdl_modal_form").modal("hide");
                    $("body").removeClass("modal-open");
                    $(".modal-backdrop").remove();
                }
            }
        });
    }

    //fungsi untuk delete dengan konfirmasi
    window.hapus = function(id){
        if (confirm("Are you sure?")) {
            var url = "opd/destroy/"+id;
            var param = {id: id};
            $.ajax({
                type: "DELETE",
                dataType: "json",
                data: param,
                url: url,
                success: function(val) {
                    if (val["status"] == true) {
                        alert(val['info']);
                        reload_table();
                    }
                }
            });
        }
        return false;
    }
    </script> 
 </div>
          </div>
        </div>
    
        <script>
    
          // event will be executed when the toggle-button is clicked
          document.getElementById("button-toggle").addEventListener("click", () => {
    
            // when the button-toggle is clicked, it will add/remove the active-sidebar class
            document.getElementById("sidebar").classList.toggle("active-sidebar");
    
            // when the button-toggle is clicked, it will add/remove the active-main-content class
            document.getElementById("main-content").classList.toggle("active-main-content");
          });
    
        </script>
      </body>
    </html>
<!-- REQUIRED SCRIPTS -->

<!-- jQuery -->
<script src="{{ asset('lte/plugins/jquery/jquery.min.js') }}"></script>
<!-- Bootstrap 4 -->
<script src="{{ asset('lte/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<!-- AdminLTE App -->
<script src="{{ asset('lte/dist/js/adminlte.min.js') }}"></script>
</body>
</html>

