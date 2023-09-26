@extends('frontend.layouts.app')
@section('content')
@include('frontend.includes.nav')
<!-- Breadcrumbs -->
<section class="breadcrumbs-custom-inset">
    <div class="breadcrumbs-custom context-dark bg-overlay-60">
        <div class="container">
            <h2 class="breadcrumbs-custom-title">Contact Us</h2>
            <ul class="breadcrumbs-custom-path">
                <li><a href="index.html">Home</a></li>
                <li class="active">Contact Us</li>
            </ul>
        </div>
        <div class="box-position" style="background-image: url(images/bg-breadcrumbs.jpg);"></div>
    </div>
</section>
<!-- Contact information-->
<section class="section section-sm section-first bg-default">
    <div class="container">
        <div class="row row-30 justify-content-center">
            <div class="col-sm-8 col-md-6 col-lg-4">
                <article class="box-contacts">
                    <div class="box-contacts-body">
                        <div class="box-contacts-icon fl-bigmug-line-cellphone55"></div>
                        <div class="box-contacts-decor"></div>
                        <p class="box-contacts-link"><a href="tel:#">{{ $setting->contact }}</a></p>
                        {{-- <p class="box-contacts-link"><a href="tel:#">+1 323-888-4554</a></p> --}}
                    </div>
                </article>
            </div>
            <div class="col-sm-8 col-md-6 col-lg-4">
                <article class="box-contacts">
                    <div class="box-contacts-body">
                        <div class="box-contacts-icon fl-bigmug-line-up104"></div>
                        <div class="box-contacts-decor"></div>
                        <p class="box-contacts-link"><a href="#">{{ $setting->address }}</a></p>
                    </div>
                </article>
            </div>
            <div class="col-sm-8 col-md-6 col-lg-4">
                <article class="box-contacts">
                    <div class="box-contacts-body">
                        <div class="box-contacts-icon fl-bigmug-line-chat55"></div>
                        <div class="box-contacts-decor"></div>
                        <p class="box-contacts-link"><a href="mailto:#">{{ $setting->email }}</a></p>
                        {{-- <p class="box-contacts-link"><a href="mailto:#">info@demolink.org</a></p> --}}
                    </div>
                </article>
            </div>
        </div>
    </div>
</section>

<!-- Contact Form and Gmap-->
<section class="section section-sm section-last bg-default text-md-left">
    <div class="container">
        <div class="row row-50">
            <div class="col-lg-6 section-map-small">
                <!--Please, add the data attribute data-key="YOUR_API_KEY" in order to insert your own API key for the Google map.-->
                <!--Please note that YOUR_API_KEY should replaced with your key.-->
                <!--Example: <div class="google-map-container" data-key="YOUR_API_KEY">-->
                <div class="google-map-container" data-center="9870 St Vincent Place, Glasgow, DC 45 Fr 45." data-zoom="5" data-icon="images/gmap_marker.png" data-icon-active="images/gmap_marker_active.png" data-styles="[{&quot;featureType&quot;:&quot;landscape&quot;,&quot;stylers&quot;:[{&quot;saturation&quot;:-100},{&quot;lightness&quot;:60}]},{&quot;featureType&quot;:&quot;road.local&quot;,&quot;stylers&quot;:[{&quot;saturation&quot;:-100},{&quot;lightness&quot;:40},{&quot;visibility&quot;:&quot;on&quot;}]},{&quot;featureType&quot;:&quot;transit&quot;,&quot;stylers&quot;:[{&quot;saturation&quot;:-100},{&quot;visibility&quot;:&quot;simplified&quot;}]},{&quot;featureType&quot;:&quot;administrative.province&quot;,&quot;stylers&quot;:[{&quot;visibility&quot;:&quot;off&quot;}]},{&quot;featureType&quot;:&quot;water&quot;,&quot;stylers&quot;:[{&quot;visibility&quot;:&quot;on&quot;},{&quot;lightness&quot;:30}]},{&quot;featureType&quot;:&quot;road.highway&quot;,&quot;elementType&quot;:&quot;geometry.fill&quot;,&quot;stylers&quot;:[{&quot;color&quot;:&quot;#ef8c25&quot;},{&quot;lightness&quot;:40}]},{&quot;featureType&quot;:&quot;road.highway&quot;,&quot;elementType&quot;:&quot;geometry.stroke&quot;,&quot;stylers&quot;:[{&quot;visibility&quot;:&quot;off&quot;}]},{&quot;featureType&quot;:&quot;poi.park&quot;,&quot;elementType&quot;:&quot;geometry.fill&quot;,&quot;stylers&quot;:[{&quot;color&quot;:&quot;#b6c54c&quot;},{&quot;lightness&quot;:40},{&quot;saturation&quot;:-40}]},{}]">
                    {!! $socialmedia->map !!}
                    {{-- <div class="google-map">
                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3532.04442572977!2d85.30706867589433!3d27.715914576177664!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x39eb18fcc4508ec9%3A0x91e0da10e449680!2sFamily%20Adventure%20Treks%20and%20Expedition%20P.Ltd!5e0!3m2!1sen!2snp!4v1694701453212!5m2!1sen!2snp" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>

                    </div> --}}
                    {{-- <ul class="google-map-markers">
                        <li data-location="9870 St Vincent Place, Glasgow, DC 45 Fr 45." data-description="9870 St Vincent Place, Glasgow"></li>
                    </ul> --}}
                </div>
            </div>
            {{-- <div class="col-lg-6">
                <h4 class="text-spacing-50">Get in Touch</h4>
                <form class="rd-form rd-mailform" data-form-output="form-output-global" data-form-type="contact" method="post" action="bat/rd-mailform.php">
                    <div class="row row-14 gutters-14">
                        <div class="col-sm-6">
                            <div class="form-wrap">
                                <input class="form-input" id="contact-first-name" type="text" name="name" data-constraints="@Required">
                                <label class="form-label" for="contact-first-name">First Name</label>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-wrap">
                                <input class="form-input" id="contact-last-name" type="text" name="name" data-constraints="@Required">
                                <label class="form-label" for="contact-last-name">Last Name</label>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-wrap">
                                <input class="form-input" id="contact-email" type="email" name="email" data-constraints="@Email @Required">
                                <label class="form-label" for="contact-email">E-mail</label>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-wrap">
                                <label class="form-label" for="contact-message">Message</label>
                                <textarea class="form-input" id="contact-message" name="message" data-constraints="@Required"></textarea>
                            </div>
                        </div>
                    </div>
                    <button class="button button-primary" type="submit">Send Message</button>
                </form>
            </div> --}}
        </div>
    </div>
</section>
@endsection
