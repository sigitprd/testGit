<!DOCTYPE html>
<html lang="en">
<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
  <link rel="stylesheet" type="text/css" href="{{ asset('/assets/css/landingpage.css') }}">
  <link rel="icon" type="icon" href="{{ asset('/assets/pic/icon.png') }}">
  <link href='https://fonts.googleapis.com/css?family=Lato:400,700,300|Open+Sans:400,600,700,300' rel='stylesheet' type='text/css'>
  <title>VELO | Let's Travel, let's Go!</title>
</head>

<body>

  <header>
    <!-- navbar -->
    <nav class="my-nav navbar navbar-dark navbar-expand-lg">
      <div class="container">
        <a class="navbar-brand font-weight-bold" href="/">VELO</a>
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


    <!-- carousel -->
    <div id="carouselExampleIndicators" class="carousel slide my-carousel my-carousel" data-ride="carousel">


      <div class="carousel-inner" role="listbox">

        <div class="carousel-caption text-right">
          <h1 class="ml3 text-uppercase font-weight-bold hsatu">Find Your Travel Buddies</h1>
          <h4 class="ml12 text-uppercase font-weight-bold hempat">Let's Travel, Let's Go!</h4>
          <a href="{{ url('/register') }}" class="btn btn-lg btn-outline-light glow-on" role="button" aria-pressed="true"><span class="fa fa-user-plus"></span> Join now</a>
          <a href="{{ url('/about') }}" class="btn ml-1 btn-lg btn-outline-light glow-on" role="button" aria-pressed="true"><span class="fa fa-question-circle"></span> Learn More</a>
        </div>

        <div class="carousel-item ci1 active" >

        </div>
        <div class="carousel-item ci2">

        </div>
        <div class="carousel-item ci3">

        </div>
        <div class="carousel-item ci4">

        </div>
        <div class="carousel-item ci5">

        </div>
        <div class="carousel-item ci6">

        </div>
      </div>
    </div>
    <!-- end carousel -->

  </header>

</body>
</html>



<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="{{ asset('/assets/lib/jquery-3.4.1.min.js') }}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/animejs/2.0.2/anime.min.js"></script>

<!-- script finyourtavelbuddies -->
<script>
    // Wrap every letter in a span
    var textWrapper = document.querySelector('.ml3');
    textWrapper.innerHTML = textWrapper.textContent.replace(/\S/g, "<span class='letter'>$&</span>");

    anime.timeline({loop: true})
    .add({
      targets: '.ml3 .letter',
      opacity: [0,1],
      easing: "easeInOutQuad",
      duration: 800,
      delay: (el, i) => 150 * (i+1)
    }).add({
      targets: '.ml3',
      opacity: 0,
      duration: 1000,
      easing: "easeOutExpo",
      delay: 1000
    });
  </script>
  <!-- end findyour -->

  <!-- script lettravelets -->
  <script>
        // Wrap every letter in a span
        var textWrapper = document.querySelector('.ml12');
        textWrapper.innerHTML = textWrapper.textContent.replace(/\S/g, "<span class='letter'>$&</span>");

        anime.timeline({loop: true})
        .add({
          targets: '.ml12 .letter',
          translateX: [40,0],
          translateZ: 0,
          opacity: [0,1],
          easing: "easeOutExpo",
          duration: 2800,
          delay: (el, i) => 500 + 30 * i
        }).add({
          targets: '.ml12 .letter',
          translateX: [0,-30],
          opacity: [1,0],
          easing: "easeInExpo",
          duration: 1100,
          delay: (el, i) => 100 + 30 * i
        });
      </script>
      <!-- end letstravel -->