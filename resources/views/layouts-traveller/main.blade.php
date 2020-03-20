<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  
  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="{{ asset('/assets/lib/sweetalert2/css/sweetalert2.min.css') }}">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
  <link href='https://fonts.googleapis.com/css?family=Lato:400,700,300|Open+Sans:400,600,700,300' rel='stylesheet' type='text/css'>
  <link rel="stylesheet" type="text/css" href="{{ asset('/assets/css/home.css') }}">
  <link rel="stylesheet" type="text/css" href="{{ asset('/assets/css/myaccount.css') }}">
  <link rel="stylesheet" type="text/css" href="{{ asset('/assets/css/editprofile.css') }}">
  <link rel="stylesheet" type="text/css" href="{{ asset('/assets/css/message.css') }}">
  <link rel="stylesheet" type="text/css" href="{{ asset('/assets/css/dark-mode.css') }}">
  <link rel="icon" type="icon" href="{{ asset('/assets/pic/icon.png') }}">
  <title>@yield('title')</title>
</head>

<body>
  <!-- the project -->

  <!-- navbar header-->
  <nav class="navbar navbar-expand-lg navbar-dark sticky-top">
    <a class="navbar-brand text-uppercase mr-4 ml-3 font-weight-bold" href="/home">Velo</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent-555" aria-controls="navbarSupportedContent-555" aria-expanded="false" aria-label="Toggle navigation">
      <span class="fa fa-caret-square-o-down text-white"></span></button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent-555">

        <div class="mr-4">
          <form class="form-inline" action="{{ route('search') }}">
            <div class="form-sm my-0">
              <input class="form-control form-control-sm mr-sm-2 mb-0" type="text" id="search" name="search" placeholder="Search" aria-label="Search" autocomplete="off" value="{{ old('search') }}">
            </div>
            <button class="btn btn-outline-warning btn-sm my-0 ml-1" type="submit"><span class="fa fa-search"></span> Search</button>
          </form>
        </div>
        <button class="btn btn-warning mt-1" data-toggle="modal" data-target="#themodal" type="button"><span class="fa fa-pencil"></span> Where do you want to go?</button>

        <div class="navbar-nav dropdown ml-auto">
        <a id="pending-message" class="nav-link my-auto text-white" href="{{ url('/messages') }}">
          <span class="fa fa-comments"></span>
          @foreach($notifs as $notif => $value)
            @if($value->is_read == 0)
              <span class="pending"></span>
            @endif
          @endforeach
        </a>
        <a class="nav-link my-auto text-white" href="{{ url('/home') }}"><span class="fa fa-home"></span> Home</a>
        <a class="nav-link dropdown-toggle text-white" id="navbarDropdownMenuLink-4" data-toggle="dropdown"
        aria-haspopup="true" aria-expanded="false">
        <img src="{{ asset('/assets/pic/profilepic/'.$myaccount->photo) }}" width="40" height="40" class="rounded-circle"><h6 class="ml-2 d-inline">{{ auth()->user()->name }}</h6></a>

        <div class="dropdown-menu dropdown-menu-right dropdown-info" aria-labelledby="navbarDropdownMenuLink-4">
          <a class="dropdown-item" href="{{ url('/myaccount/'.auth()->user()->id) }}"><span class="fa fa-cog"></span> My account</a>
          <a class="dropdown-item" data-toggle="modal" data-target="#modal-logout"><span class="fa fa-sign-out"></span> Log out</a>
        </div>

      </div>
    </div>
  </nav>
  <!-- end navbar header -->

  <!-- content -->
  @yield('content')

  <!-- footer -->
  <footer class="page-footer font-small py-3 mt-5">
    <div class="footer-copyright text-center text-white text-md-left ml-3">
      <p>&copy;2019 Copyright VELO. All Right Reserved</p>
      <a oncontextmenu="return false;" href="#collapse-aboutus" class="fa fa-arrow-right icon-aboutus text-white textfooter1" data-toggle="collapse" data-target="#collapse-aboutus" aria-expanded="false" aria-controls="collapseExample"> About Us</a> |
      <a oncontextmenu="return false;" href="#collapse-contactus" class="fa fa-arrow-right icon-aboutus text-white textfooter1" data-toggle="collapse" data-target="#collapse-contactus" aria-expanded="false" aria-controls="collapseExample"> Contact Us</a> |
      <div class="custom-control custom-switch d-inline">
            <input type="checkbox" class="custom-control-input" id="darkSwitch">
            <label class="custom-control-label" for="darkSwitch">Dark Mode</label>
      </div>
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
  <a class="top-link hide" href="" id="js-top" data-toggle="tooltip" title="Back to Top">
    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 12 6">
      <path d="M12 6H0l6-6z" /></svg>
    <span class="screen-reader-text mx-auto">Back to top</span>
  </a>
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

          <form id="tripForm" method="post" action="{{ url('/home/createTrip') }}" autocomplete="off">
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
          <button type="submit" value="Submit" class="btn btn-warning">Post!</button>
          <button type="button" class="btn btn-secondary close-btn" data-dismiss="modal">Cancel</button>
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
          <a href="{{ url('/logout') }}" class="btn btn-warning btn-sm"><span class="fa fa-sign-out"></span> Logout</a>
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
<script src="{{ asset('/assets/js/dark-mode-switch.min.js') }}"></script>
<script src="{{ asset('/assets/lib/pusher.min.js') }}"></script>
<!-- <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script> -->
<script src="{{ asset('/assets/lib/jquery-3.4.1.min.js') }}"></script>
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
          url: "{{ url('/home/createTrip') }}",
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

<!-- editprofile -->
<script>
  $(document).ready(function() {
    // Prepare the preview for profile picture
    $("#wizard-picture").change(function() {
      readURL(this);
    });
  });

  function readURL(input) {
    if (input.files && input.files[0]) {
      var reader = new FileReader();

      reader.onload = function(e) {
        $('#wizardPicturePreview').attr('src', e.target.result).fadeIn('slow');
      }
      reader.readAsDataURL(input.files[0]);
    }
  }
</script>

<!-- dark mode -->
<script>
function myFunction() {
   var element = document.body;
   element.classList.toggle("dark-mode");
   var value = $('#dark-mode').html();
   if(value == ' Dark Mode'){
     $('#dark-mode').html('');
     $('#dark-mode').html(' Light Mode');
   } else if(value == ' Light Mode'){
     $('#dark-mode').html('');
     $('#dark-mode').html(' Dark Mode');
   }
}
</script>
<!-- end dark mdoe -->

<!-- pusher -->
<script src="{{ asset('/assets/lib/pusher.min.js') }}"></script>
<!-- <script src="https://js.pusher.com/5.0/pusher.min.js"></script> -->
<!-- <script src="{{ asset('/assets/lib/jquery-3.4.1.min.js') }}"></script> -->

<!-- myscript messages -->
<script type="text/javascript">
    var receiver_id = '';
    var my_id = "{{ Auth::id() }}";
    $(document).ready(function () {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        // Enable pusher logging - don't include this in production
        Pusher.logToConsole = true;

        var pusher = new Pusher('7efa1a62ae6bb9682e64', {
          cluster: 'ap1',
          forceTLS: true
        });

        var channel = pusher.subscribe('my-channel');
        channel.bind('my-event', function(data) {
          // alert(JSON.stringify(data));
            if(my_id == data.from){
                $('#' + data.to).click();
            }else if(my_id == data.to){
                if(receiver_id == data.from){
                    //if receiver is selected, reload the selected user ...
                    $('#' + data.from).click();
                }else{
                    //if receiver is not selected, add notification for that user ...
                    var pending = parseInt($('#' + data.from).find('.pending').html());

                    if(pending){
                        $('#' + data.from).find('.pending').html();
                        $('#pending-message').find('.pending').html();
                    }else{
                        $('#' + data.from).append('<span class="pending"></span>');
                        $('#pending-message').append('<span class="pending"></span>');
                    }
                }
            }
        });


        $('.user').click(function () {
            $('.user').removeClass('active-message');
            $(this).addClass('active-message');

            receiver_id = $(this).attr('id');
            $(this).find('.pending').remove();
            // alert(receiver_id);
            $.ajax({
                method: "get",
                url : "messages/" + receiver_id, //access route get
                data: "",
                cache: false,
                success: function (data) {
                    // $(this).find('.pending').remove();
                    $('#messages').html(data);
                    scrollToBottomFunc();
                }
            });
        });

        $(document).on('keyup', '.input-text input', function(e) {
            var message = $(this).val();

            // check if enter key is pressed and message is not null also receiver is selected
            if (e.keyCode == 13 && message != '' && receiver_id != '') {
                // alert(message);
                $(this).val(''); // while pressed enter text box will be empty

                var datastr = "receiver_id=" + receiver_id + "&message=" + message;
                
                $.ajax({
                    type: "post",
                    url: "messages", // need to create this post route
                    data: datastr,
                    cache: false,
                    success: function(data) {
                        console.log(data);
                    },
                    error: function(jqXHR, status, err) {
                        console.log(jqXHR);
                    },
                    complete: function name(params) {
                        scrollToBottomFunc();
                    }
                });
            }
        });
    });

    // make a function to scroll down auto
    function scrollToBottomFunc() {
        $('.message-wrapper').animate({
            scrollTop: $('.message-wrapper').get(0).scrollHeight
        },50);
    }
</script>