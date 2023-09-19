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


    <!-- book a Room-->
    <section class="section bg-default text-center">
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
                                                        <label class="ml-3 form-label" for="contact-member-8">No Of Children</label>
                                                    </div>

                                                </div>
                                            </div>
                                            <div class="form-wrap">
                                                <select class="form-input" id="departure-date" name="country" data-constraints="@Required" data-placeholder="Select Country">
                                                    <option value="" selected disabled>Select Country</option>
                                                    @foreach ($rooms as $room)
                                                    <option value="{{ $room->id }}">{{ $room->type }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="form-wrap">
                                                <textarea class="form-input" id="contact-address-8" name="message"></textarea>
                                                <label class="form-label" for="contact-email-8">Leave Message</label>
                                            </div>
                                            <button class="button button-block button-primary button-ujarak" type="submit">Check Availability</button>
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




</div>

    @endsection
