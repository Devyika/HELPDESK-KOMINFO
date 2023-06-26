

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




    <div class="container">

        
    <section class="vh-100">
  <div class="container-fluid  h-custom">
    
    <div class="row d-flex justify-content-center align-items-center h-100">
      
      <div class="col-md-9 col-lg-6 col-xl-5">
        <img src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-login-form/draw2.webp"
          class="img-fluid" alt="Sample image">
          
            

      @if (session()->has('error'))
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    {{ session('error') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif

            <div class="card-body">
                <form method="post" action="/">
                    @csrf
                    <div class="mb-3">
                      <label for="username" class="form-label" ><i class="fa fa-user p-1"></i>Username</label>
                      <input type="text" name="username" class="form-control @error('username') is-invalid @enderror" id="username">
                      @error('username')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                      @enderror
                    </div>
                    <div class="mb-3">
                      <label for="password" class="form-label"><i class="fa fa-key p-1"></i>Password</label>
                      <input type="password" name="password" class="form-control @error('password') is-invalid @enderror" id="password">
                      @error('password')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                      @enderror
                    </div>
                    
                    <button  type="submit" class="btn btn-primary btn-user btn-block">Login</button>
                </form>
            </div>
        </div>
        </div>
                </div>

            </div>

        </div>

    </div>

      </div>
    </div>
  </div>
  <div
    class="d-flex flex-column flex-md-row text-center text-md-start justify-content-between py-4 px-4 px-xl-5 bg-primary">
    <!-- Copyright -->
    <div class="text-white mb-3 mb-md-0">
      Copyright © 2020. All rights reserved.
    </div>
    <!-- Copyright -->

    <!-- Right -->
    <div>
      <a href="#!" class="text-white me-4">
        <i class="fab fa-facebook-f"></i>
      </a>
      <a href="#!" class="text-white me-4">
        <i class="fab fa-twitter"></i>
      </a>
      <a href="#!" class="text-white me-4">
        <i class="fab fa-google"></i>
      </a>
      <a href="#!" class="text-white">
        <i class="fab fa-linkedin-in"></i>
      </a>
    </div>
    <!-- Right -->
  </div>
</section>

    <!-- Bootstrap core JavaScript-->
    <script src="{{ url('sbadmin/vendor/jquery/jquery.min.js')}}"></script>
    <script src="{{ url('sbadmin/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>

    <!-- Core plugin JavaScript-->
    <script src="{{ url('sbadmin/vendor/jquery-easing/jquery.easing.min.js')}}"></script>

    <!-- Custom scripts for all pages-->
    <script src="{{ url('sbadmin/js/sb-admin-2.min.js')}}"></script>

</body>

</html>