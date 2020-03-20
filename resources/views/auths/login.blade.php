<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <link rel="icon" type="icon" href="{{ asset('/assets/pic/icon.png') }}">
  <link rel="stylesheet" type="text/css" href="{{ asset('/assets/css/login.css') }}">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
  <link href='https://fonts.googleapis.com/css?family=Lato:400,700,300|Open+Sans:400,600,700,300' rel='stylesheet' type='text/css'>

  <title>Login | Velo</title>
</head>

<body>
  <header>
    <!-- navbar -->
    <nav class="my-nav navbar navbar-dark navbar-expand-lg">
      <div class="container">
        <a class="navbar-brand font-weight-bold" href="{{ url('/') }}">VELO</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navcollapse" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
          <span class="fa fa-caret-square-o-down text-white"></span>
        </button>
        <div class="container">
          <div class="collapse navbar-collapse float-right" id="navcollapse">
            <div class="navbar-nav mr-5">
              <a class="text-decoration-none sub-nav mr-2 my-auto cool-link" href="{{ url('/about') }}"><span class="fa fa-info-circle"></span> What is Velo?</a>
              <a class="text-decoration-none sub-nav mr-2 my-auto cool-link" oncontextmenu="return false;" href="#" data-toggle="modal" data-target="#contactmodal"><span class="fa fa-phone"></span> Contact Us</a>
              <a href="{{ url('/login') }}" class="btn btn-outline-light my-auto btn-rounded font-weight-bold"><span class="fa fa-sign-in"></span> LOGIN</a>
            </div>
          </div>
        </div>
      </div>
    </nav>
    <!-- end navbar -->

     <!-- modal contact us -->
    <div class="modal fade mt-5" id="contactmodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header bg-warning rounded">
            <h5 class="modal-title text-white" id="exampleModalLabel">Found any problem? Please contact us at</h5>
            <button type="button" class="close btn-lg" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body mx-auto font-weight-bold">
            <p><span class="fa fa-phone"></span> +62 811 2233 4455</p>
            <p><span class="fa fa-envelope"></span> Velo@velomail.com</p>
          </div>
        </div>
      </div>
    </div>
    <!-- end modal contact us -->


    <!-- form -->
    <div class="carousel-inner">
      <div class="container1 d-flex mx-auto justify-content-center">

        <form class="login-form" action="{{ url('/postlogin') }}" method="post" autocomplete="off">
          @method('post')
          @csrf
          <h1>
            <p class="font-weight-bold text-uppercase text-danger text-decoration-none mb-3 text-center">VELO</p>
          </h1>
          <p class="text-white mb-5 text-center tttt-1">Welcome Back to VELO</p>

          <div class="form-group">
            <input type="email" id="Uname" name="email" autofocus="on" class="form-control rounded form-control-lg" value="{{ old('email') }}" required>
            <label class="form-control-placeholder" for="name"><span class="fa fa-user-circle"></span> Email</label>
          </div>

          <div class="form-group">
            <input type="password" name="password" class="form-control rounded form-control-lg mt-4" id="password-field" value="{{ old('password') }}" required>
            <label class="form-control-placeholder" for="name"><span class="fa fa-key"></span> Password</label>
            <span toggle="#password-field" class="fa fa-fw fa-eye-slash field-icon toggle-password"></span>
          </div>

          @if(session('error'))
          <div class="form-group mt-0 mb-0">
            <p class="mt-3 text-white text-center mt-0 mb-0">{{ session('error') }}</p>
          </div>
          @endif


          <div class="container">
            <button type="submit" value="Submit" class="btn rounded btn1 btn-danger font-weight-bold mt-3">LOGIN</button>
            <p class="mt-3 text-white text-center">New to VELO? <a href="{{ url('/register') }}" class="text-decoration-none tdn1">Join Now!</a></p>
          </div>

        </form>
      </div>
    </div>
    <!-- end form -->


  </header>



</body>

</html>


<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="{{ asset('/assets/lib/jquery-3.4.1.min.js') }}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>


<script>
  //psw visible
  $(".toggle-password").click(function() {

    $(this).toggleClass("fa-eye-slash fa-eye");
    var input = $($(this).attr("toggle"));
    if (input.attr("type") == "password") {
      input.attr("type", "text");
    } else {
      input.attr("type", "password");
    }
  });
</script>