@extends('layouts-traveller.main')

@if($traveller->user_id == auth()->user()->id)
@section('title', auth()->user()->name.' | VELO')
@else
@section('title', $traveller->first_name.' '.$traveller->last_name.' | VELO')
@endif

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
                  @if($traveller->user_id == auth()->user()->id)
                  <a href="{{ url('/myaccount/'.auth()->user()->id.'/editprofile') }}" class="btn btn-outline-primary d-block btn-sm px-auto mx-auto"><span class="fa fa-edit"></span> Customize Your Profile</a>
                  @else
                  <a href="#" class="btn btn-outline-primary d-block btn-sm px-auto mx-auto" data-toggle="modal" data-target="#modalmessage"><span class="fa fa-edit"></span> Send a message</a>
                  @endif
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
                    <p>{{ $traveller->email }}</p>
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
                    <p>{{ $traveller->first_name }} {{ $traveller->last_name }} Posts.</p>
                  </div>
                </div>

                <div class="row">
                  <!-- card  -->
                  @if(!$trips->isEmpty())
                  @foreach($trips as $trip)
                  <div class="card card-custom mt-3 rounded border-0">
                    <div class="card-body" style="overflow-y: auto">
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
                  @else
                  <!-- end card -->
                  <!-- card -->
                <div class="card card-custom mt-3 rounded border-0">

                  <div class="card-body" style="overflow-y: hidden;">
                    <h4 class="card-title">Nothing a Posts.</h4>

                    <div class="row mt-4">
                      <div class="col-md-6">
                        <label><span class=""></span></label>
                      </div>
                      <div class="col-md-6">
                        <p></p>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-6">
                        <!-- <label><span class="fa fa-plane"></span> Want Travel to</label> -->
                      </div>
                      <div class="col-md-6">
                        <!-- <p>Yogyakarta, Indonesia.</p> -->
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-6">
                        <!-- <label><span class="fa fa-calendar"></span> Date</label> -->
                      </div>
                      <div class="col-md-6">
                        <!-- <p>January 1, 2020.</p> -->
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-6">
                        <!-- <label><span class="fa fa-hourglass-start"></span> Trip Duration</label> -->
                      </div>
                      <div class="col-md-6">
                        <!-- <p>5 days.</p> -->
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-6">
                        <label><span class=""></span></label>
                      </div>
                      <div class="col-md-6">
                        <p>-</p>
                      </div>
                    </div>
                  </div>
                  <div class="card-footer" style="background: inherit; border-color: inherit;">
                    <p></p>
                  </div>

                </div>
                <!-- end card -->
                @endif
                
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>



  <!-- modal message -->
  <div class="modal fade" id="modalmessage" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header mohead">
          <h5 class="modal-title text-white" id="exampleModalLabel">Send a message to {{ $traveller->first_name }} {{ $traveller->last_name }}!</h5>

          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>

        <div class="modal-body">
          <p class="modal-title mb-3 text-info"><span class="fa fa-info-circle"></span> Say something good to {{ $traveller->first_name }}.</p>
          <form id="sendForm" method="post" action="{{ url('/message/send')}}" autocomplete="off">
            @method('post')
            @csrf
            <div class="form-group">
              <textarea required type="text" class="form-control" name="message"></textarea>
            </div>

          
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary close-btn" data-dismiss="modal">Cancel</button>
            <button type="submit" value="Submit" class="btn btn-warning">Send!</button>
          </div>
        </form>
      </div>
    </div>
  </div>
  <!-- end modal message-->

<!-- sendmessage post -->
<!-- <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script> -->
<script src="{{ asset('/assets/lib/jquery-3.4.1.min.js') }}"></script>
<script src="{{ asset('/assets/lib/sweetalert2/js/sweetalert2.min.js') }}"></script>
<script>
  // $('textarea[name="message"]').val('');
  $('#sendForm').on('submit', function(e) {
      e.preventDefault();

      // $('textarea[name="message"]').val('');

      $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

      var receiver_id = '{{ $traveller->user_id }}';
      var my_id = "{{ Auth::id() }}";
      var message = $('textarea[name="message"]').val();
      var datastr = "receiver_id=" + receiver_id + "&message=" + message;
      // console.log(message);

      $.ajax({
          url: '{{ url('/message/send/'.$traveller->user_id) }}',
          method: 'post',
          data: datastr,

          // dataType: 'JSON',
          cache: false,
          success: function(response) {
            // swal("Success!", val, "success");
            // console.log(response);
            res = response.responseJSON;
            
            $(function () {
               $('#modalmessage').modal('toggle');
            });
            // window.location.href = "{{ url('/home') }}";
          },
          error: function(xhr) {
            console.log(xhr.responseJSON);
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
</script>
<!-- end a -->
@endsection