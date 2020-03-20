@extends('layouts-traveller.main')

@section('title', auth()->user()->name.' | VELO')

@section('content')

<div class="container emp-profile">

  <div class="row">
    <div class="col-md-4">
      <div class="profile-img">
        <img src="{{ asset('/assets/pic/profilepic/'.$traveller->photo) }}"/>

      </div>
    </div>
    <div class="col-md-6">
      <div class="profile-head text-capitalize mt-3">
        <h5>
          {{ $traveller->first_name }} {{ $traveller->last_name }}
        </h5>
        <h6>
          {{ $traveller->job }}
        </h6>
        <ul class="nav nav-tabs" id="myTab" role="tablist">
          <li class="nav-item">
            <a class="nav-link active" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="true">Timeline</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="false">About Me</a>
          </li>
        </ul>
      </div>


      <div class="col-md-12">
        <div class="tab-content profile-tab" id="myTabContent">
          <div class="tab-pane fade" id="home" role="tabpanel" aria-labelledby="home-tab" style="max-width: 500px;">
            <div class="container text-center mt-3 mb-3">
              <a href="{{ url('/myaccount/'.auth()->user()->id.'/editprofile') }}" class="btn btn-outline-primary d-block btn-sm px-auto mx-auto"><span class="fa fa-edit"></span> Customize Your Profile</a>
            </div>
            <div class="row">
              <div class="col-md-6">
                <label><span class="fa fa-book"></span> Bio</label>
              </div>
              <div class="col-md-6">
                @if(!empty($traveller->bio))
                <p>{{ $traveller->bio }}</p>
                @else
                <p>Empty</p>
                @endif
              </div>
            </div>
            <div class="row">
              <div class="col-md-6">
                <label><span class="fa fa-id-card"></span> Name</label>
              </div>
              <div class="col-md-6">
                <p>{{ $traveller->first_name }} {{ $traveller->last_name }}</p>
              </div>
            </div>
            <div class="row">
              <div class="col-md-6">
                <label><span class="fa fa-calendar"></span> Age</label>
              </div>
              <div class="col-md-6">
                <p>{{ $traveller->age }} Years Old.</p>
                <p>Born {{ date('j F, Y', strtotime($traveller->date_of_birth)) }}</p>
              </div>
            </div>
            <div class="row">
              <div class="col-md-6">
                <label><span class="fa fa-venus-mars"></span> Gender</label>
              </div>
              <div class="col-md-6">
                <p>{{ $traveller->gender }}</p>
              </div>
            </div>
            <div class="row">
              <div class="col-md-6">
                <label><span class="fa fa-envelope"></span> Email</label>
              </div>
              <div class="col-md-6">
                <p>{{ auth()->user()->email }}</p>
              </div>
            </div>
            <div class="row">
              <div class="col-md-6">
                <label><span class="fa fa-globe"></span> Country</label>
              </div>
              <div class="col-md-6">
                <p>{{ $traveller->country }}</p>
              </div>
            </div>
            <div class="row">
              <div class="col-md-6">
                <label><span class="fa fa-location-arrow"></span> Currently Live at</label>
              </div>
              <div class="col-md-6">
                <p>{{ $traveller->currently_live_at }}, {{ $traveller->country }}</p>
              </div>
            </div>
            <div class="row">
              <div class="col-md-6">
                <label><span class="fa fa-whatsapp"></span> Phone (Whatsapp)</label>
              </div>
              <div class="col-md-6">
                <p><a href="{{ url('/chat/me/'.$traveller->id_traveller) }}">+{{ $traveller->phone_number }}</a></p>
              </div>
            </div>
            <div class="row">
              <div class="col-md-6">
                <label><span class="fa fa-briefcase"></span> Profession</label>
              </div>
              <div class="col-md-6">
                <p>{{ $traveller->job }}</p>
              </div>
            </div>
          </div>

          <div class="tab-pane fade show active" id="profile" role="tabpanel" aria-labelledby="profile-tab">

            <div class="row">
              @if(session('status'))
              <div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>{{session('status')}}</strong>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              @endif
              <div class="col-md-12">
                <p>{{ auth()->user()->name }} Posts.</p>
              </div>
            </div>

            <div class="row">
              <!-- card  -->
              @foreach($trips as $trip)
              <div class="card card-custom mt-3 rounded border-0">
                <div class="card-body" style="overflow-y: auto">

                  <a class="fa fa-ellipsis-v text-primary" id="navbarDropdownMenuLink-4" data-toggle="dropdown"
                  aria-haspopup="true" aria-expanded="false" style="cursor: pointer;"></a>
                  <div class="dropdown-menu dropdown-menu-right dropdown-info" aria-labelledby="navbarDropdownMenuLink-4">
                    <a class="dropdown-item edit" href="#" id="{{ $trip->trip_id }}" data-toggle="modal" data-target="#themodaledit"><span class="fa fa-pencil"></span> Edit</a>
                    <hr class="mb-2 mt-2">
                    <form id="tripDeleteForm">
                      <button type="button" id="{{ $trip->trip_id }}" value="Submit" class="dropdown-item delete"><span class="fa fa-trash"></span> Delete</button>
                    </form>
                  </div>
                  <h4 class="card-title">Trip to {{ $trip->destination }}</h4>
                  <div class="row mt-4">
                    <div class="col-md-6">
                      <label><span class="fa fa-map-marker"></span> Current</label>
                    </div>
                    <div class="col-md-6">
                      <p>{{ $trip->current }}</p>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-6">
                      <label><span class="fa fa-plane"></span> Want Travel to</label>
                    </div>
                    <div class="col-md-6">
                      <p>{{ $trip->destination }}</p>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-6">
                      <label><span class="fa fa-calendar"></span> Start Travel at</label>
                    </div>
                    <div class="col-md-6">
                      <p>{{ date('j F, Y', strtotime($trip->departure_date)) }}</p>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-6">
                      <label><span class="fa fa-hourglass-start"></span> Trip Duration</label>
                    </div>
                    <div class="col-md-6">
                      <p>{{ $trip->trip_duration }}.</p>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-6">
                      <label><span class="fa fa-sticky-note"></span> Note</label>
                    </div>
                    <div class="col-md-6">
                      <p>{{ $trip->note }}</p>
                    </div>
                  </div>
                </div>
                <div class="card-footer">
                  <p>Created at {{ date('j F, Y', strtotime($trip->created_at)) }}</p>
                </div>

              </div>
              @endforeach

              </div>

            </div>
          </div>
        </div>

      </div>

    </div>


  </div>
  
  <!-- modal editpost -->
  <div class="modal fade" id="themodaledit" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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

          <form id="tripEditForm" method="post" action="" autocomplete="off">
            @method('patch')
            @csrf
            <div class="form-group">
              <label for="recipient-name" class="form-label text-warning">Where do you want to go {{ auth()->user()->name }}?</label>
              <input required type="text" class="form-control" id="destination" placeholder="e.g. Yogyakarta, Indonesia." name="destination">
            </div>

            <div class="form-group">
              <label for="recipient-name" class="form-label text-warning">When?</label>
              <input required type="date" class="form-control" id="departure_date" name="departure_date">
            </div>

            <div class="form-group">
              <label for="recipient-name" class="form-label text-warning">How Long?</label>
              <input required type="text" class="form-control" id="trip_duration" placeholder="e.g. 5 days." name="trip_duration">
            </div>

            <div class="form-group">
              <label for="recipient-name" class="form-label text-warning">Where do you start from?</label>
              <input required type="text" class="form-control" id="current" placeholder="e.g. From Jakarta, Indonesia." name="current">
            </div>

            <div class="form-group">
              <label for="recipient-name" class="form-label text-warning">Add little note maybe?</label>
              <textarea class="form-control" id="note" placeholder="e.g. I will bring a big bag." name="note"></textarea>
            </div>


        </div>
        <div class="modal-footer">
          <button type="submit" value="Submit" class="btn btn-warning">Update!</button>
          <button type="button" class="btn btn-secondary close-btn" data-dismiss="modal">Cancel</button>
          </form>
        </div>
      </div>
    </div>
  </div>
  <!-- end modal editpost-->
  
  
  <!-- <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script> -->
  <script src="{{ asset('/assets/lib/jquery-3.4.1.min.js') }}"></script>
  <script src="{{ asset('/assets/lib/sweetalert2/js/sweetalert2.min.js') }}"></script>
  <script type="text/javascript">
    $(document).on('click', '.edit', function () {

      var id = $(this).attr('id');
      $('#destination').val('');
      $('#departure_date').val('');
      $('#trip_duration').val('');
      $('#current').val('');
      $('#note').val('');
      
      $.ajax({
          url: "/trips/"+id+"/edit",
          success: function(response) {

            $('#destination').val(response.destination);
            $('#departure_date').val(response.departure_date);
            $('#trip_duration').val(response.trip_duration);
            $('#current').val(response.current);
            $('#note').val(response.note);

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
    

      $('#tripEditForm').on('submit', function(e) {
        e.preventDefault();

        var current = $(this).val();
        var destination = $(this).val();
        var departure_date = $(this).val();
        var trip_duration = $(this).val();
        var note = $(this).val();

        $.ajaxSetup({
            headers: {
              'X-CSRF-TOKEN': $('input[name="__token"]').attr('value')
            }
        });

        $.ajax({
            url: "/trips/"+id+"/update",
            method: 'patch',
            data: $('#tripEditForm').serialize(),
            cache: false,

            success: function(response) {

              $(function () {
                $('#themodaledit').modal('toggle');
                location.reload();
              });

            },

            error: function(xhr) {
              res = xhr.responseJSON;
              if ($.isEmptyObject(res) == false) {
                $.each(res.errors, function(key, val) {
                  Swal.fire("Invalid!", val, "error");
                });
              }
            }
        });
    });
  });

  $(document).on('click', '.delete', function (){

      var id = $(this).attr('id');

      Swal.fire({
        title: 'Are you sure?',
        text: "You won't be able to revert this!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes, delete it!'
      }).then((result) => {

        if (result.value) {
          
          $.ajaxSetup({
              headers: {
                'X-CSRF-TOKEN': $('#tripEditForm input[name="__token"]').attr('value')
              }
          });

          $.ajax({
              url: "/trips/"+id+"/delete",
              method: 'delete',
              data: $('#tripEditForm').serialize(),
              cache: false,

              success: function(response) {
                Swal.fire('Deleted!', 'Your file has been deleted.', 'success').then(function(){
                  location.reload();
                });
              },

              error: function(xhr) {
                res = xhr.responseJSON;
                if ($.isEmptyObject(res) == false) {
                  $.each(res.errors, function(key, val) {
                    Swal.fire("Invalid!", val, "error");
                  });
                }
              }
          });
        }
      })
  });
</script>
@endsection