<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Web Laravel - Login</title>

    <!-- Custom fonts for this template-->
    <link href="{{ url('sbadmin/vendor/fontawesome-free/css/all.min.css')}}" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="{{ url('sbadmin/css/sb-admin-2.min.css')}}" rel="stylesheet">

</head>

<body class="bg-gradient-light">

    <div class="container">

        <!-- Outer Row -->
        <div class="row my-5 justify-content-center">

            <div class="col-lg-7">

                <div class="card o-hidden border-5 shadow-lg my-9">
                    <div class="card-body p-0">
                        <!-- Nested Row within Card Body -->
                        <div class="row"> 
                            <div class="col-lg">
                                <div class="p-5">
                                    <div class="text-center">
                                        <h1 class="h4 text-gray-900">lapor</h1>
                                        <p>masukkan data dengan benar!</p>
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
     
<form action="{{ route('lapors.store') }}" method="POST" enctype="multipart/form-data">
    @csrf
    
     <div class="row p-4 ">
        <div class="col-xs-12 col-sm-12 col-md-12 ">
            <div class="form-group">
                <strong>FILE</strong>
                <input type="file" name="file" class="form-control" placeholder="file">
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>TANGGAL</strong>
                <input type="date" name="tanggal" class="form-control" placeholder="tanggal ">
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>KETERANGAN</strong>
                <input type="text" name="keterangan" class="form-control" placeholder="keterangan ">
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                <button type="submit" class="btn btn-primary">Submit</button>
        </div>
    </div>
     
</form>
</div>

</div>

<!-- Bootstrap core JavaScript-->
<script src="{{ url('sbadmin/vendor/jquery/jquery.min.js')}}"></script>
<script src="{{ url('sbadmin/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>

<!-- Core plugin JavaScript-->
<script src="{{ url('sbadmin/vendor/jquery-easing/jquery.easing.min.js')}}"></script>

<!-- Custom scripts for all pages-->
<script src="{{ url('sbadmin/js/sb-admin-2.min.js')}}"></script>

</body>

</html>