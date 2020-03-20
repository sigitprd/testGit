<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  
  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="{{ asset('/assets/lib/sweetalert2/css/sweetalert2.min.css') }}">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
  <link href='https://fonts.googleapis.com/css?family=Lato:400,700,300|Open+Sans:400,600,700,300' rel='stylesheet' type='text/css'>
  <link rel="stylesheet" type="text/css" href="{{ asset('/assets/css/home.css') }}">
  <link href="{{ asset('/assets/css/app-message.css') }}" rel="stylesheet">
  <link rel="icon" type="icon" href="{{ asset('/assets/pic/icon.png') }}">
  <title>Velo - Find Travel Your Buddies</title>

  <style>
        ul {
            margin: 0;
            padding: 0;
        }

        li {
            list-style: none;
        }

        .user-wrapper,
        .message-wrapper {
            border: 1px solid #dddddd;
            overflow-y: auto;

        }

        .user-wrapper {
            height: 600px;
        }

        .user {
            cursor: pointer;
            padding: 5px 0;
            position: relative;
        }

        .user:hover {
            background: #eeeeee;
        }

        .user:last-child {
            margin-bottom: 0;
        }

        .pending {
            position: absolute;
            left: 13px;
            top: 9px;
            background: #b600ff;
            margin: 0;
            border-radius: 50%;
            width: 18px;
            height: 18px;
            line-height: 18px;
            padding-left: 5px;
            color: #ffffff;
            font-size: 12px;
        }

        .media-left {
            margin: 0 10px;
        }

        .media-left img {
            width: 64px;
            border-radius: 64px;
        }

        .media-body p {
            margin: 6px 0;
        }

        .message-wrapper {
            padding: 10px;
            height: 536px;
            background: #eeeeee;
        }

        .messages .message {
            margin-bottom: 15px;
        }

        .messages .message:last-child {
            margin-bottom: 0;
        }

        .received,
        .sent {
            width: 45%;
            padding: 3px 10px;
            border-radius: 10px;
        }

        .received {
            background: #ffffff;
        }

        .sent {
            background: #3bebff;
            float: right;
            text-align: right;
        }

        .message p {
            margin: 5px 0;
        }

        .date {
            color: #777777;
            font-size: 12px;
        }

        .active {
            background: #eeeeee;
        }

        input[type=text] {
            width: 100%;
            padding: 12px 20px;
            margin: 15px 0 0 0;
            display: inline-block;
            border-radius: 4px;
            box-sizing: border-box;
            outline: none;
            border: 1px solid #cccccc;
        }

        input[type=text] {
            border: 1px solid #aaaaaa;
        }
    </style>
</head>

<body>
  <!-- the project -->

  <!-- navbar header-->
  <nav class="navbar navbar-expand-lg navbar-dark sticky-top">
    <a class="navbar-brand text-uppercase mr-4 ml-3 font-weight-bold" href="/home">Velo</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent-555" aria-controls="navbarSupportedContent-555" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span></button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent-555">

        <div class="mr-4">
          <form class="form-inline my-1" action="{{ route('search') }}">
            <div class="md-form form-sm my-0">
              <input class="form-control form-control-sm mr-sm-2 mb-0" type="text" name="search" placeholder="Search" aria-label="Search" autofocus="on" autocomplete="off">
            </div>
            <button class="btn btn-outline-warning btn-sm my-0 ml-1" type="submit"><span class="fa fa-search"></span> Search</button>
          </form>
        </div>
        <button class="btn btn-warning mt-1" data-toggle="modal" data-target="#themodal" type="button"><span class="fa fa-pencil"></span> Where do you want to go?</button>

        <div class="navbar-nav dropdown ml-auto">
        <a class="nav-link my-auto text-white" href="/home"><span class="fa fa-home"></span> Home</a>
        <a class="nav-link dropdown-toggle text-white" id="navbarDropdownMenuLink-4" data-toggle="dropdown"
        aria-haspopup="true" aria-expanded="false">
        <img src="{{ asset('/assets/pic/profilepic/'.$myaccount->photo) }}" width="40" height="40" class="rounded-circle"><h6 class="ml-2 d-inline">{{ auth()->user()->name }}</h6></a>

        <div class="dropdown-menu dropdown-menu-right dropdown-info" aria-labelledby="navbarDropdownMenuLink-4">
          <a class="dropdown-item" href="/myaccount/{{auth()->user()->id}}"><span class="fa fa-cog"></span> My account</a>
          <a class="dropdown-item" data-toggle="modal" data-target="#modal-logout"><span class="fa fa-sign-out"></span> Log out</a>
        </div>

      </div>
    </div>
  </nav>
  <!-- end navbar header -->

  <!-- content -->
  <main class="py-4">
    @yield('content')
  </main>
  <!-- end content -->

  <!-- pagination -->
  <!-- <nav aria-label="Page navigation example">
    <ul class="pagination mt-5 mx-auto  justify-content-center">
      
    </ul>
  </nav> -->
  <!-- endpagination -->

  <!-- footer -->
  <footer class="page-footer font-small py-3 mt-5">
    <div class="footer-copyright text-center text-white text-md-left ml-3">&copy;2019 Copyright VELO. All Right Reserved |
      <a oncontextmenu="return false;" href="#collapse-aboutus" class="fa fa-arrow-right icon-aboutus text-white textfooter1" data-toggle="collapse" data-target="#collapse-aboutus" aria-expanded="false" aria-controls="collapseExample"> About Us</a> |
      <a oncontextmenu="return false;" href="#collapse-contactus" class="fa fa-arrow-right icon-aboutus text-white textfooter1" data-toggle="collapse" data-target="#collapse-contactus" aria-expanded="false" aria-controls="collapseExample"> Contact Us</a>
    </div>
    <div class="collapse" id="collapse-aboutus">
      <div class="card card-body mt-3" style=" color: #dc3545">
        Velo is a PABW project made by Dàkes Project. Know More About Us<span class="fa fa-arrow-right"><a href="/about"> More about Velo</a></span>
      </div>
    </div>
    <div class="collapse" id="collapse-contactus">
      <div class="card card-body mt-3" style=" color: #dc3545">
        Found any Problem? Please contact us at
        <span class="fa fa-whatsapp mb-1"> +62 811 2233 4455</span>
        <span class="fa fa-envelope"> Velo@velomail.com</span>
      </div>
    </div>
  </footer>
  <!-- end footer -->

  <!-- backtotop -->
  <!-- <a class="top-link hide" href="" id="js-top" data-toggle="tooltip" title="Back to Top">
    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 12 6">
      <path d="M12 6H0l6-6z" /></svg>
    <span class="screen-reader-text mx-auto">Back to top</span>
  </a> -->
  <!-- end back to top -->

  <!-- modal post -->
  <div class="modal fade" id="themodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header mohead">
          <h5 class="modal-title text-white" id="exampleModalLabel">Let People Know Your Travel Plan!</h5>

          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>

        <div class="modal-body">
          <p class="modal-title mb-3 text-info"><span class="fa fa-info-circle"></span> Let your travel buddies know where you are going, when, and how long your trip will be.</p>

          <form id="tripForm" method="post" action="/home/createTrip" autocomplete="off">
            @method('post')
            @csrf
            <div class="form-group">
              <label for="recipient-name" class="form-label text-warning">Where do you want to go {{ auth()->user()->name }}?</label>
              <input required type="text" class="form-control" id="recipient-name" placeholder="e.g. Yogyakarta, Indonesia." name="destination">
            </div>

            <div class="form-group">
              <label for="recipient-name" class="form-label text-warning">When?</label>
              <input required type="date" class="form-control" id="recipient-name" name="departure_date">
            </div>

            <div class="form-group">
              <label for="recipient-name" class="form-label text-warning">How Long?</label>
              <input required type="text" class="form-control" id="recipient-name" placeholder="e.g. 5 days." name="trip_duration">
            </div>

            <div class="form-group">
              <label for="recipient-name" class="form-label text-warning">Where do you start from?</label>
              <input required type="text" class="form-control" id="recipient-name" placeholder="e.g. From Jakarta, Indonesia." name="current">
            </div>

            <div class="form-group">
              <label for="recipient-name" class="form-label text-warning">Add little note maybe?</label>
              <textarea class="form-control" id="message-text" placeholder="e.g. I will bring a big bag." name="note"></textarea>
            </div>


        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary close-btn" data-dismiss="modal">Cancel</button>
          <button type="submit" value="Submit" class="btn btn-warning">Post!</button>
          </form>
        </div>
      </div>
    </div>
  </div>
  <!-- end modal post-->

  <!-- Modal logout -->
  <div class="modal fade" id="modal-logout" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content justify-content-center">
        <div class="modal-header mohead2">
          <h5 class="modal-title text-white"><span class="fa fa-warning"></span> Warning!</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true" class="text-danger">&times;</span>
          </button>
        </div>

        <div class="modal-body">
          <p>Are you sure want to Log Out?</p>
        </div>

        <div class="modal-footer">
          <button type="button" class="btn btn-secondary close-btn" data-dismiss="modal"><span class="fa fa-close"></span> Just Enjoy</button>
          <a href="/logout" class="btn btn-warning btn-sm"><span class="fa fa-sign-out"></span> Logout</a>
        </div>
      </div>
    </div>
  </div>
  <!-- end modal logout -->

  <!-- end the project -->
</body>

</html>

<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<!-- <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script> -->
<script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
<script src="{{ asset('/assets/lib/sweetalert2/js/sweetalert2.min.js') }}"></script>
<!-- <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>  -->
<!-- <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script> -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
<!-- -->


<!--back to top-->
<script type="text/javascript">
  $('#tripForm').on('submit', function(e) {
      e.preventDefault();

      var current = $(this).val();
      var destination = $(this).val();
      var departure_date = $(this).val();
      var trip_duration = $(this).val();
      var note = $(this).val();

      $.ajaxSetup({
          headers: {
            'X-CSRF-TOKEN': $('inpt[name="__token"]').attr('value')
          }
      });

      $.ajax({
          url: '/home/createTrip',
          method: 'post',
          data: $('form').serialize(),
          // headers: {
          //   'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          // },

          // dataType: 'JSON',
          cache: false,
          success: function(response) {
            // swal("Success!", val, "success");
            res = response.responseJSON;
            console.log(res);
            window.location.href = "{{ url('/home') }}";
          },
          error: function(xhr) {
            var res = '';
            res = xhr.responseJSON;
            if ($.isEmptyObject(res) == false) {
              $.each(res.errors, function(key, val) {
                Swal.fire("Invalid!", val, "error");
              });
            }
          }
      });
  });
  

  // Set a variable for our button element.
  const scrollToTopButton = document.getElementById('js-top');

  // Let's set up a function that shows our scroll-to-top button if we scroll beyond the height of the initial window.
  const scrollFunc = () => {
    // Get the current scroll value
    let y = window.scrollY;

    // If the scroll value is greater than the window height, let's add a class to the scroll-to-top button to show it!
    if (y > 0) {
      scrollToTopButton.className = "top-link show";
    } else {
      scrollToTopButton.className = "top-link hide";
    }
  };

  window.addEventListener("scroll", scrollFunc);

  const scrollToTop = () => {
    // Let's set a variable for the number of pixels we are from the top of the document.
    const c = document.documentElement.scrollTop || document.body.scrollTop;

    // If that number is greater than 0, we'll scroll back to 0, or the top of the document.
    // We'll also animate that scroll with requestAnimationFrame:
    // https://developer.mozilla.org/en-US/docs/Web/API/window/requestAnimationFrame
    if (c > 0) {
      window.requestAnimationFrame(scrollToTop);
      // ScrollTo takes an x and a y coordinate.
      // Increase the '10' value to get a smoother/slower scroll!
      window.scrollTo(0, c - c / 10);
    }
  };

  // When the button is clicked, run our ScrolltoTop function above!
  scrollToTopButton.onclick = function(e) {
    e.preventDefault();
    scrollToTop();
  }
</script>
<!--end back to top script and style -->

<!-- tooltip js -->
<script>
  $(document).ready(function() {
    $('[data-toggle="tooltip"]').tooltip();
  });
</script>
<!--  -->

<!-- arrow footer about us -->
<script>
  $(".icon-aboutus").click(function() {
    $(this).toggleClass("fa-arrow-right fa-arrow-down");
  });
</script>
<!-- end a -->

<!-- click message -->
<script type="text/javascript">
  
</script>