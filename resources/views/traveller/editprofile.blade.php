@extends('layouts-traveller.main')

@section('title', 'Customize Your Profile | VELO')

@section('content')

  <!-- content -->
  <div class="container emp-profile">
    <h1>Edit Profile</h1>
    <hr>

    <div class="row">
      <div class="picture-container col-md-4">

        <div class="picture form-group">
          <form class="form-horizontal" method="post" role="form" action="{{ url('/myaccount/'.$traveller->id_traveller) }}" enctype="multipart/form-data">
            @method('patch')
            @csrf
            <img src="{{ asset('/assets/pic/profilepic/'.$traveller->photo) }}" class="picture-src" id="wizardPicturePreview" title="">
            <input type="file" id="wizard-picture" class="" name="photo" value="{{ old('photo',$traveller->photo) }}">
        </div>
        <h6 class="text-center mt-3">Choose Different Picture.</h6>
        <!-- <p>alert</p> -->
        @error('photo')
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
          {{ $message }}
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        @enderror
        <!-- <p>alert</p> -->
      </div>

      <!-- edit form column -->
      <div class="col-md-8">
        <div class="alert alert-info alert-dismissable">
          <span class="fa fa-coffee"></span> Dont write anything sensitive on bio!
        </div>
        <h3>Personal info</h3>



        <div class="form-group">
          <label class="col-lg-3 control-label"><span class="fa fa-book"></span> Bio:</label>
          <div class="col-lg-8">
            <textarea class="form-control" id="message-text" placeholder="e.g. I Love Cats." name="bio">{{ old('bio', $traveller->bio)}}</textarea>
          </div>
        </div>
        <div class="form-group">
          <label class="col-lg-3 control-label"><span class="fa fa-id-card"></span> First name:</label>
          <div class="col-lg-8">
            <input class="form-control @error('first_name') is-invalid @enderror" type="text" name="first_name" value="{{ old('first_name', $traveller->first_name) }}">
            @error('first_name') <div class="invalid-feedback">{{ $message }}</div>@enderror
          </div>
        </div>
        <div class="form-group">
          <label class="col-lg-3 control-label"><span class="fa fa-id-card"></span> Last name:</label>
          <div class="col-lg-8">
            <input class="form-control @error('last_name') is-invalid @enderror" type="text" name="last_name" value="{{ old('last_name', $traveller->last_name) }}">
            @error('last_name') <div class="invalid-feedback">{{ $message }}</div>@enderror
          </div>
        </div>
        <div class="form-group">
          <label class="col-lg-3 control-label"><span class="fa fa-calendar"></span> Date of Birth:</label>
          <div class="col-lg-8">
            <input class="form-control @error('date_of_birth') is-invalid @enderror" type="date" name="date_of_birth" value="{{ old('date_of_birth', $traveller->date_of_birth) }}">
            @error('date_of_birth') <div class="invalid-feedback">{{ $message }}</div>@enderror
          </div>
        </div>
        <div class="form-group">
          <label class="col-lg-3 control-label"><span class="fa fa-globe"></span> Country:</label>
          <div class="col-lg-8">
            <input class="form-control @error('country') is-invalid @enderror" type="text" name="country" value="{{ old('country', $traveller->country) }}">
            @error('country') <div class="invalid-feedback">{{ $message }}</div>@enderror
          </div>
        </div>
        <div class="form-group">
          <label class="col-lg-5 control-label"><span class="fa fa-location-arrow"></span> Currently Live at:</label>
          <div class="col-lg-8">
            <input class="form-control" type="text" name="currently_live_at" value="{{ old('currently_live_at', $traveller->currently_live_at) }}">
          </div>
        </div>
        <div class="form-group">
          <label class="col-lg-5 control-label"><span class="fa fa-whatsapp"></span> Phone Number (Whatsapp):</label>
          <div class="col-lg-8">
            <input class="form-control @error('phone_number') is-invalid @enderror" type="number" name="phone_number" value="{{ old('phone_number', $traveller->phone_number) }}">
            @error('phone_number') <div class="invalid-feedback">{{ $message }}</div>@enderror
          </div>
        </div>
        <div class="form-group">
          <label class="col-lg-3 control-label"><span class="fa fa-briefcase"></span> Profession:</label>
          <div class="col-lg-8">
            <input class="form-control" type="text" name="job" value="{{ old('job', $traveller->job) }}">
          </div>
        </div>

        <button type="submit" value="Submit" class="btn btn-warning"><span class="fa fa-save"></span> Save Changes</button>
        <button type="reset" class="btn btn-outline-secondary" onclick="window.history.back(-1);"><span class="fa fa-close"></span> Cancel</button>

        </form>
      </div>

    </div>
  </div>
  <!-- end content -->

@endsection