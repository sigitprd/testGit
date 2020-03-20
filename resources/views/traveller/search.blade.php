@extends('layouts-traveller.main')

@section('title', 'Velo - Find Travel Your Buddies')

@section('content')

<!-- navigation -->
@if(!$datas->isEmpty())
  <div class="row mt-4">
    <div class="container mt-2 mb-2">
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
          <!-- <a class="navbar-brand" href="#" id="all">All</a> -->
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
              <li class="nav-item">
                <a class="navbar-brand" href="#" id="all"><h4>All</h4></a>
              </li>
              <li class="nav-item">
                <a class="nav-link category" href="#" id="people">People</a>
              </li>
              <li class="nav-item">
                <a class="nav-link category" href="#" id="start">From</a>
              </li>
              <li class="nav-item">
                <a class="nav-link category" href="#" id="destination">Destination</a>
              </li>
            </ul>
          </div>
          <form class="form-inline my-2 my-lg-0" id="settanggal">
            <!-- <label class="form-check-label mr-3">
              <input class="form-control-sm mt-1 mr-1" type="checkbox" name="tanggal-ceklis" id="tanggal-ceklis"> Set Date :
            </label>
            <label class="form-check-label mr-1">dari</label>
            <input class="form-control-sm mr-2" type="date" name="tanggal1" id="tanggal1">
            <label class="form-check-label mr-1">Sampai</label>
            <input class="form-control-sm mr-2" type="date" name="tanggal2" id="tanggal2">
            <button class="btn btn-outline-warning my-2 sm-0 mr-2" id="button-reset" type="button">Reset</button>
            <button class="btn btn-warning my-2 my-sm-0" id="button-settanggal" type="button">Set</button> -->
          </form>
        </nav>
    </div>
  </div>
@endif
<!-- endnavigation -->

<!-- content-left -->
<!-- end content-left -->

<!-- title -->
<div class="container titlee">
  <h1 id="title">All Posts</h1>
  <hr>
</div>
<!-- endtitle -->

  <!-- content -->
  <div class="row mx-auto mt-1">
    <div class="container mt-1">
        <div class="row mt-1" id="mydata">

          @if(!$datas->isEmpty())
          @foreach($datas as $data)

            <div class="col-md-4 col-sm-6 mb-5 categories">
              <div class="box8">
                <img src="{{ asset('/assets/pic/profilepic/'.$data->photo) }}">
                <h3 class="title">{{ $data->first_name }} {{ $data->last_name }}</h3>
                <div class="box-content">
                  <div class="data-trip container ulone mt-4 ml-2">

                    <!-- trip -->
                    @if($data->trip_id != null)
                    <p><span class="fa fa-map-marker"></span> From: {{ $data->current }}</p>
                    <p><span class="fa fa-plane"></span> Destination to: {{ $data->destination }}</p>
                    <p><span class="fa fa-calendar"></span> Start Travel at: {{ date('j F, Y', strtotime($data->departure_date)) }}</p>
                    <p><span class="fa fa-hourglass-start"></span> Trip Duration: {{ $data->trip_duration }}</p>
                    <p><span class="fa fa-sticky-note"></span> Note: {{ $data->note }}</p>
                    <p class="fixed-bottom ml-3"><span class="fa fa-history"></span> Created at {{ date('j F, Y H:i', strtotime($data->created_at)) }}</p>
                    @endif
                    <!-- endtrip -->

                  </div>
                  <ul class="icon ml-3 text-center">
                    <li><a href="{{ url('/trip/'.$data->id_traveller.'/detail') }}" data-toggle="tooltip" title="See My Details"><span class="fa fa-info-circle infotext"></span></a></li>
                  </ul>
                </div>
              </div>
            </div>
          
          @endforeach
          @else
            <div class="container mt-3" style="height: 768px;">
              <h1 class="mx-auto">Not Found</h1>
            </div>
          @endif

        </div>
      <!--div row mt-3-->

        <div class="" id="notfound">
        </div>
    </div>
    <!--div container mt-4-->
  </div><!-- row mxauto mt-1 -->
  <!-- end content -->

  <!-- pagination -->
  <nav aria-label="Page navigation example">
    <ul class="pagination mt-5 mx-auto  justify-content-center">
      @if($datas instanceof \Illuminate\Pagination\LengthAwarePaginator )

        {{ $datas->appends(Request::only('search'))->links() }}

      @endif
    </ul>
  </nav>
  <!-- endpagination -->

<!-- <script src="http://code.jquery.com/jquery-1.9.1.js"></script> -->
<!-- <script src="http://code.jquery.com/ui/1.11.0/jquery-ui.js"></script> -->
<script src="{{ asset('/assets/lib/jquery-3.4.1.min.js') }}"></script>
<script src="{{ asset('/assets/lib/moment.js') }}"></script>
<script>

var searchdate = 0;
$(document).ready(function () {

  
  // $(function() {
  //   var $defaultDate = new Date(); 
  //   $defaultDate.setDate( $defaultDate.getDate() + 1 );
  //   $('#tanggal1').datepick({defaultDate:   $defaultDate}).val(($defaultDate.getMonth()+1) + '/' + $defaultDate.getDate() + '/' +  $defaultDate.getFullYear()); 
  //   $defaultDate.setDate( $defaultDate.getDate() + 3 );
  //   $('#tanggal2').datepick({defaultDate: $defaultDate}).val(($defaultDate.getMonth()+1) + '/' + $defaultDate.getDate() + '/' +   $defaultDate.getFullYear()); 
  // });
  // $("#button-reset").click(function () {
  //   resetFunction();
  // })

  function resetFunction(){
    
  }

  function tanggalceklisFunction(){
    
  }

  function tanggalunceklisFunction(){
    
  }

  function setTanggalFunction(){
    removeTanggalFunction();
    $('#settanggal').append("<label class=" + "form-check-label" + "> Set Date :</label><label class=" + "form-check-label" + ">From</label><input class=" + "form-control-sm" + " type=" + "date" + " name=" + "" + "max=" + "" + " id=" + "tanggal1" + "><label class=" + "form-check-label" + ">To</label><input class=" + "form-control-sm" + " type=" + "date" + " name=" + "" + "min=" + "" + " id=" + "tanggal2" + "><a href=" + "#" +" class=" + "btn" + " id=" + "button-reset" + ">Reset</a><a href=" + "#" + " class=" + "btn" + " id=" + "button-settanggal" + " type=" + "button" + ">Set</a>");
    $('.form-check-label').addClass("mr-1");
    $('#settanggal input').addClass("mr-2")
    $('#button-settanggal').addClass("btn-warning my-2 my-sm-0");
    $('#button-reset').addClass("btn-outline-warning my-2 sm-0 mr-2");
  }

  function removeTanggalFunction(){
    $('#settanggal').empty();
  }

  $('#search').val("");
  $('#search').val("{{ $search }}");

  $('#all').click(function () {
    window.location.reload();
  });

  $('#people').click(function () {
    // $('.titlee').empty().append("<h1 id=" + "title" + ">People</h1><h4 id=" + "loadingg" + ">Loading..</h4><hr>").fadeIn();
    $('#title').html("Loading...");
    removeTanggalFunction();
  });

  $('#start').click(function () {
    // $('.titlee').empty().append("<h1 id=" + "title" + ">From</h1><h4 id=" + "loadingg" + ">Loading..</h4><hr>").fadeIn();
    $('#title').html("Loading...");
    removeTanggalFunction();
  });

  $('#destination').click(function () {
    // $('.titlee').empty().append("<h1 id=" + "title" + ">Destination</h1><h4 id=" + "loadingg" + ">Loading..</h4><hr>").fadeIn();
    $('#title').html("Loading...");
    setTanggalFunction();
  });

  $('.category').click(function () {
    // var categories = "people";
    var categories = $(this).attr('id');
    var judul = $(this).html();
    var search = $('#search').val();

    // alert(categories);

    if (categories != "all") {
      $.ajaxSetup({
        headers: {
          'X-CSRF-TOKEN': $('inpt[name="__token"]').attr('value')
        }
      });

      $.ajax({
          url: "{{ route('search.people') }}",
          method: 'post',
          data: {search:search, categories:categories, cek:searchdate},
          // headers: {
          //   'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          // },

          // dataType: 'JSON',
          cache: false,
          success: function(response) {
            // swal("Success!", val, "success");
            var datas = response.datas;
            
            // window.location.href = "{{ url('/home') }}";
            var appendString = "";

            if(datas == 0){
              // $('.titlee').empty();
              // console.log("notfound");
              appendString += "<h1 class=" + "mx-auto" + ">Not Found</h1>";
              $('#mydata').empty().fadeOut();
              $('#notfound').empty();
              $('#notfound').addClass("container mt-3").css({"height":"768px"}).append(appendString).fadeOut(1).fadeIn();
              //  $('#notfound').html();
              // exit;
            }else{
              $('#notfound').empty();
              // $('#notfound').empty().removeAttr("style").removeClass("container");
              // console.log(response);
              $('#mydata').empty();
              
              $.each(datas, function(key, val) {
                var strdate1 = new Date(val.departure_date);
                var departure_date = moment(strdate1).format('DD MMM, YYYY');
                var strdate2 = new Date(val.created_at);
                var created_at = moment(strdate2).format('DD MMM, YYYY HH:mm');

                // console.log(datas);
                if( val.trip_id === null ){
                  appendString += "<div class=" + "1" + "><div class=" + "box8" + "><img src=" + "http://localhost:8000/assets/pic/profilepic/" + val.photo + " class=" + "fotoo" + "><h3 class=" + "title" + ">" + val.first_name + " " + val.last_name +"</h3><div class=" + "box-content" + "><ul class=" + "10" + "><li><a href=" + "http://localhost:8000/trip/" + val.id_traveller + "/detail" + " data-toggle=" + "tooltip" + " title=" + "" + "><span class=" + "12" + "></span></a></li></ul></div></div></div>";
                } else{
                  appendString += "<div class=" + "1" + "><div class=" + "box8" + "><img src=" + "http://localhost:8000/assets/pic/profilepic/" + val.photo + " class=" + "fotoo" + "><h3 class=" + "title" + ">" + val.first_name + " " + val.last_name +"</h3><div class=" + "box-content" + "><div class=" + "2" + "><p><span class=" + "3" + "></span> From: " + val.current + "</p><p><span class=" + "4" + "></span> Destination to: " + val.destination + "</p><p><span class=" + "5" + "></span> Start Travel at: " + departure_date + "</p><p><span class=" + "6" + "></span> Trip Duration: " + val.trip_duration + "</p><p><span class=" + "7" + "></span> Note: " + val.note + "</p><p class=" + "8" + "><span class=" + "9" + "></span> Created at " + created_at + "</p></div><ul class=" + "10" + "><li><a href=" + "http://localhost:8000/trip/" + val.id_traveller + "/detail" + " data-toggle=" + "tooltip" + " title=" + "" + "><span class=" + "12" + "></span></a></li></ul></div></div></div>";
                }


              });

              $('#mydata').fadeOut(3).append(appendString);
              $(".1").addClass("col-md-4 col-sm-6 mb-5 categories");
              $(".2").addClass("container ulone mt-4 ml-2");
              $(".3").addClass("fa fa-map-marker");
              $(".4").addClass("fa fa-plane");
              $(".5").addClass("fa fa-calendar");
              $(".6").addClass("fa fa-hourglass-start");
              $(".7").addClass("fa fa-sticky-note");
              $(".8").addClass("fixed-bottom ml-3");
              $(".9").addClass("fa fa-history");
              $(".10").addClass("icon ml-3 text-center");
              $(".10 a").attr("title", function () {
                return "See My Details";
              });
              // $(".11").attr("title", "See My Details");
              $(".12").addClass("fa fa-info-circle infotext");
              $('#mydata').fadeIn();
              // $('#mydata').load();
              // $('#categories').replaceWith(datas);
              //  $('#categories').load(html(response));
            }
            // $('#1').removeAttr('id');

            $('#title').html(judul)
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
    }

  });
  
});

// $("#button-reset").on('click', function () {
//     console.log("bitch");
// });

$(document).on('click','#button-reset',function(e) {
  //handler code here
  searchdate = 0;
  $('#tanggal1').val(null);
  $('#tanggal2').val(null);
  // console.log("bitch");
});
$(document).on('click','#button-settanggal',function(e) {
  //handler code here
  searchdate = 1;
  $('#title').html("Loading...");

  // var categories = "people";
    var categories = "destination";
    var judul = "Destination";
    var search = $('#search').val();
    var from = $('#tanggal1').val();
    var to = $('#tanggal2').val();

    // alert(categories);

    if (categories != "all" && from != null && to != null) {
      $.ajaxSetup({
        headers: {
          'X-CSRF-TOKEN': $('inpt[name="__token"]').attr('value')
        }
      });

      $.ajax({
          url: "{{ route('search.people') }}",
          method: 'post',
          data: {search:search, categories:categories, from:from, to:to, cek:searchdate},
          // headers: {
          //   'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          // },

          // dataType: 'JSON',
          cache: false,
          success: function(response) {
            // swal("Success!", val, "success");
            var datas = response.datas;
            
            // window.location.href = "{{ url('/home') }}";
            var appendString = "";

            if(datas == 0){
              // $('.titlee').empty();
              // console.log("notfound");
              appendString += "<h1 class=" + "mx-auto" + ">Not Found</h1>";
              $('#mydata').empty().fadeOut();
              $('#notfound').empty();
              $('#notfound').addClass("container mt-3").css({"height":"768px"}).append(appendString).fadeOut(1).fadeIn();
              //  $('#notfound').html();
              // exit;
            }else{
              $('#notfound').empty();
              // $('#notfound').empty().removeAttr("style").removeClass("container");
              // console.log(response);
              $('#mydata').empty();
              
              $.each(datas, function(key, val) {
                var strdate1 = new Date(val.departure_date);
                var departure_date = moment(strdate1).format('DD MMM, YYYY');
                var strdate2 = new Date(val.created_at);
                var created_at = moment(strdate2).format('DD MMM, YYYY HH:mm');

                // console.log(datas);
                if( val.trip_id === null ){
                  appendString += "<div class=" + "1" + "><div class=" + "box8" + "><img src=" + "http://localhost:8000/assets/pic/profilepic/" + val.photo + " class=" + "fotoo" + "><h3 class=" + "title" + ">" + val.first_name + " " + val.last_name +"</h3><div class=" + "box-content" + "><ul class=" + "10" + "><li><a href=" + "http://localhost:8000/trip/" + val.id_traveller + "/detail" + " data-toggle=" + "tooltip" + " title=" + "" + "><span class=" + "12" + "></span></a></li></ul></div></div></div>";
                } else{
                  appendString += "<div class=" + "1" + "><div class=" + "box8" + "><img src=" + "http://localhost:8000/assets/pic/profilepic/" + val.photo + " class=" + "fotoo" + "><h3 class=" + "title" + ">" + val.first_name + " " + val.last_name +"</h3><div class=" + "box-content" + "><div class=" + "2" + "><p><span class=" + "3" + "></span> From: " + val.current + "</p><p><span class=" + "4" + "></span> Destination to: " + val.destination + "</p><p><span class=" + "5" + "></span> Start Travel at: " + departure_date + "</p><p><span class=" + "6" + "></span> Trip Duration: " + val.trip_duration + "</p><p><span class=" + "7" + "></span> Note: " + val.note + "</p><p class=" + "8" + "><span class=" + "9" + "></span> Created at " + created_at + "</p></div><ul class=" + "10" + "><li><a href=" + "http://localhost:8000/trip/" + val.id_traveller + "/detail" + " data-toggle=" + "tooltip" + " title=" + "" + "><span class=" + "12" + "></span></a></li></ul></div></div></div>";
                }


              });

              $('#mydata').fadeOut(3).append(appendString);
              $(".1").addClass("col-md-4 col-sm-6 mb-5 categories");
              $(".2").addClass("container ulone mt-4 ml-2");
              $(".3").addClass("fa fa-map-marker");
              $(".4").addClass("fa fa-plane");
              $(".5").addClass("fa fa-calendar");
              $(".6").addClass("fa fa-hourglass-start");
              $(".7").addClass("fa fa-sticky-note");
              $(".8").addClass("fixed-bottom ml-3");
              $(".9").addClass("fa fa-history");
              $(".10").addClass("icon ml-3 text-center");
              $(".10 a").attr("title", function () {
                return "See My Details";
              });
              // $(".11").attr("title", "See My Details");
              $(".12").addClass("fa fa-info-circle infotext");
              $('#mydata').fadeIn();
              // $('#mydata').load();
              // $('#categories').replaceWith(datas);
              //  $('#categories').load(html(response));
            }
            // $('#1').removeAttr('id');

            $('#title').html(judul)
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
    } else{     //endif
      Swal.fire("Invalid!", "Invalid Your Input!", "error");
    } 

    searchdate = false;
});
</script>
@endsection