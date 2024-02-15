@extends('frontend.layouts.app')
@section('content')
<div class="ie-panel"><a href="https://windows.microsoft.com/en-US/internet-explorer/"><img src="images/ie8-panel/warning_bar_0000_us.jpg" height="42" width="820" alt="You are using an outdated browser. For a faster, safer browsing experience, upgrade for free today."></a></div>
{{-- <div class="preloader">
    <div class="preloader-body">
        <div class="cssload-container"><span></span><span></span><span></span><span></span>
        </div>
    </div>
</div> --}}
<div class="page">
    <!-- Page Header-->
   @include('frontend.includes.nav')
    <!-- Swiper-->

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.12.1/css/bootstrap-select.css" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.12.1/js/bootstrap-select.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <!-- book a Room-->
    <section class="section bg-default text-center" >
        <div class="parallax-container" data-parallax-img="{{ asset('public/frontend/images/bg-forms-3.jpg') }}">
            <div class="parallax-content section-xl section-lg-0">
                <div class="container">
                    <div class="row justify-content-center justify-content-md-end justify-content-lg-between align-items-lg-end">
                        <div class="col-lg-5 col-xl-6">
                            <div class="d-none d-lg-block wow fadeInRight"></div>
                        </div>
                        <div class="col-sm-8 col-md-8 col-lg-8">
                            <div class="section-inset-custom-6">
                                <div class="oh-desktop">
                                    <div class="box-form wow slideInLeft">
                                        <h4 class="box-form-title">Book a room</h4>
                                        @include('admin.includes.message')
                                        <form class="rd-form "  method="post" action="{{ route('inquery.store') }}">
                                            @csrf
                                            <div class="form-wrap">
                                                <input class="form-input" id="contact-name-8" type="text" name="name" value="{{ old('name') }}" data-constraints="@Required">
                                                <label class="form-label" for="contact-name-8">Full Name</label>
                                            </div>
                                            <div class="form-wrap">
                                                <input class="form-input" id="contact-phone-8" type="text" name="phone" value="{{ old('phone') }}" data-constraints="@Numeric">
                                                <label class="form-label" for="contact-phone-8">Phone</label>
                                            </div>
                                            <div class="form-wrap">
                                                <input class="form-input" id="contact-email-8" type="text" name="email" value="{{ old('email') }}" data-constraints="@Required">
                                                <label class="form-label" for="contact-email-8">E-mail</label>
                                            </div>

                                            <div class="form-wrap">
                                                <input class="form-input" id="Arrival_date" type="text" name="arrival_date" value="{{ old('arrival_date') }}" data-constraints="@Required" onfocus="this.type = 'date'" onblur="this.type='text'">

                                                <label class="form-label" for="Arrival_date">Arrival Date</label>

                                            </div>
                                            <div class="form-wrap">
                                                <input class="form-input" id="departure_date" type="text" name="departure_date" value="{{ old('departure_date') }}" data-constraints="@Required" onfocus="this.type = 'date'" onblur="this.type='text'">

                                                <label class="form-label" for="departure_date">Departure Date</label>

                                            </div>

                                            <div class="form-wrap">
                                                <select class="form-input" id="Pick-up" name="pickup" data-constraints="@Required" data-placeholder="Airport Pickup">
                                                    <option value="" selected disabled>Pickup Airport</option>
                                                    <option value="1">Yes</option>
                                                    <option value="0">No</option>
                                                </select>
                                            </div>
                                            <div class="form-wrap">
                                                <select class="form-input" id="departure-date" name="room_type" data-constraints="@Required" data-placeholder="Room Type">
                                                    <option value="" selected disabled>Select Room Type</option>
                                                    @foreach ($rooms as $room)
                                                    <option value="{{ $room->id }}">{{ $room->type }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="form-wrap">
                                                <div class="row row-10 row-gutter-10">
                                                    <div class="col-md-6">
                                                        <input class="form-input" id="contact-member-8" type="number" name="adults" value="{{ old('adults') }}" data-constraints="@Numeric">
                                                        <label class="ml-3 form-label" for="contact-member-8">No of Member</label>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <input class="form-input" id="contact-children-8" type="number" name="children" value="{{ old('children') }}">
                                                        <label class="ml-3 form-label" for="contact-children-8">No Of Children</label>
                                                    </div>

                                                </div>
                                            </div>
                                            <style>
                                                .dropdown{
                                                    width: 100% !important;
                                                    margin-top: 1%;
                                                }
                                            </style>
                                            <div class="form-wrap">
                                                <select class="form-input selectpicker" id="departure-date" name="country" data-constraints="@Required" data-placeholder="Select Country" data-live-search="true" data-live-search-style="startsWith">
                                                    <option value="" selected disabled>Select Country</option>
                                                    @foreach ($countries as $country)
                                                    <option value="{{ $country->id }}">{{ $country->name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="form-wrap">
                                                <textarea class="form-input" id="contact-address-8" name="message"></textarea>
                                                <label class="form-label" for="contact-email-8">Leave Message</label>
                                            </div>
                                            <button class="button book-button button-block button-primary button-ujarak" type="submit">Submit</button>
                                            <input type="hidden" value="{{ Session::get('book_message') ? '1' : '0' }}" id="book-status">
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Latest projects-->

<!-- Button trigger modal -->
{{-- <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalCenter">
    Launch demo modal
  </button> --}}

  <!-- Modal -->
  {{-- <style>
    .modal{
        top:20%;
    }
  </style> --}}
  <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalCenterTitle">Thank You for Your Enquiry</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <div class="container">
                <h1>Thank You for Your Enquiry!</h1>
                <p style="font-size: 2rem;">We appreciate your interest in our hotel. Our team will review your enquiry, and we will contact you soon.</p>
                <div class="thank-you-message">Thank you</div>
                {{-- <div><span></span></div> --}}
            </div>

        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          {{-- <button type="button" class="btn btn-primary">Save changes</button> --}}
        </div>
      </div>
    </div>
  </div>


</div>

    <script>

        $(document).ready(function(){
            $('.selectpicker').selectpicker();
            var book_status = $('#book-status').val();
            if(book_status == 1){
                $('#exampleModalCenter').modal('show');
            }
        })
    </script>
    @endsection
