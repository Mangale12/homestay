@extends('frontend.layouts.app')
@include('frontend.includes.nav')
@section('content')
<section class="">
    <div class="">
        <div class="">
            <div class="container">
                <div class="">

                    <div class="">
                        @include('admin.includes.message')
                        <form method="post" action="{{ route("inquery.store") }}">
                            @csrf
                            <div class="form-group">
                              <label for="name" style="float: left;">Full Name</label>
                              <input type="text" class="form-control" id="name" placeholder="Enter Full Name">
                            </div>
                            <div class="form-group">
                                <label for="email" style="float: left;">Email</label>
                                <input type="email" class="form-control" id="email" placeholder="Enter Email">
                            </div>
                            <div class="form-group">
                                <label for="email" style="float: left;">Phone</label>
                                <input type="number" class="form-control" id="email" placeholder="Enter Number">
                            </div>
                            <div class="form-group">
                                <label for="email" style="float: left;">Arrival At</label>
                                <input type="date" class="form-control" id="email" placeholder="Enter Number">
                            </div>
                            <div class="form-group">
                              <label for="exampleInputPassword1">Country *</label>
                              <select name="country" id="country" class="form-control">
                                <option value="" selected disabled>Select Country</option>
                                <option value="cnc">jjehhee</option>
                              </select>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Adults *</label>
                                <select name="country" id="country" class="form-control">
                                  <option value="" selected disabled>Select Country</option>
                                  <option value="cnc">jjehhee</option>
                                </select>
                              </div>
                              <div class="form-group">
                                <label for="exampleInputPassword1">child *</label>
                                <select name="country" id="country" class="form-control">
                                  <option value="" selected disabled>Select Country</option>
                                  <option value="cnc">jjehhee</option>
                                </select>
                              </div>

                            <button type="submit" class="btn btn-primary">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
