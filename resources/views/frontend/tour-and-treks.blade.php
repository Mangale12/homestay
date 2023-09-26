@extends('frontend.layouts.app')
@section('content')
@include('frontend.includes.nav')
<!-- Breadcrumbs -->
<section class="breadcrumbs-custom-inset">
    <div class="breadcrumbs-custom context-dark bg-overlay-60">
        <div class="container">
            <h2 class="breadcrumbs-custom-title">Tour & Trek</h2>
            <ul class="breadcrumbs-custom-path">
                <li><a href="index.html">Home</a></li>
                {{-- <li><a href="#">Pages</a></li> --}}
                <li class="active">Tour & Trek</li>
            </ul>
        </div>
        <div class="box-position" style="background-image: url(images/bg-breadcrumbs.jpg);"></div>
    </div>
</section>
<!-- Privacy Policy-->
<section class="section section-xl bg-default text-left">
    <div class="container">
        <h2>Tour & Trek</h2>
        <!-- Terms list-->
        <dl class="list-terms">
            <dt class="heading-5">Welcome to Nepal Bed and Breakfast Home Stay with Tamang family.</dt>
            <dd style="text-align: justify;">Chandra, Pabitra and family welcome you to our warm and friendly family homestay located in Rani Ban (Queens Forest), 4.6 kms from Thamel.  Beautiful and peaceful, with plenty of fresh air, our home is very close to the forest, with scenic views of the surrounding hills.  Nepal’s most famous, historical Swayambhunath (Monkey)Temple is just 1.5 km walk from our home.

                Collectively we have 40+ years of experience in Nepali tourism and would be honoured to  provide information and organise treks to all the main trekking areas in the country. We can also organise visits to famous national parks such as Chitwan to see Elephants and the one-horned rhinoceros.

                We have all modern amenities in our multi-bedroom home, including Air conditioning, western bathrooms, comfortable beds, 24 hour free Wi-Fi, and multichannel colour television.

                Our small courtyard garden offers you different types of seasonal fruits and vegetables, grown in the roof top garden, and hygienically prepared, home cooked, delicious, organic breakfasts, lunches, and dinners.

                You will experience what is like to live with a real Nepali family, and we will do our best to make your stay a truly memorable, once in a life-time experience.
                We have Airport pickup and drop off service at very reasonable cost on request.</dd>


            <dt class="heading-5">Our Services and Specialities</dt>
            <dd>
                <ul>
                    <li>Free trek and tour information</li>
                    <li>Long and short treks</li>
                    <li>Day hikes</li>
                    <li>Culture treks and tours</li>
                    <li>Hire a guide and/or porters</li>
                    <li>Expeditions</li>
                    <li>Peak climbing</li>
                    <li>Rock climbing</li>
                    <li>Trekking and climbing permit arrangements</li>
                    <li>Trekking Information Management Service (TIMS) card arrangements</li>
                    <li>White water rafting</li>
                    <li>Canyoning </li>
                     <li>Kayaking </li>
                    <li>Mountain biking and tours</li>
                    <li>Motor bike tours to any distination Including Tibet</li>
                    <li>Sightseeing tours all over Nepal</li>
                    <li>Vehicle rental </li>
                    <li>Jungle safari by jeep, elephant</li>
                    <li>Air ticketing for domestic and international</li>
                   <li>Mountain flight</li>
                    <li>Heli-flight sightseeing</li>
                    <li>Paragliding</li>
                    <li>Fly with ultra-light aircraft</li>
                   <li>Yoga and meditation courses</li>
                   <li>Bungy jumping</li>
                    <li>Hotel bookings</li>
                    <li>Travel advice / trip planning</li>
                    <li>Bus ticket booking</li>
                    <li>Sacred site tours</li>
                    <li>Tibet tours</li>
                    <li>Bhutan tours</li>
                    <li>India tours</li>
                    <li>Tours and treks to Sikkim and Dajeeling</li>
                    <li>Tours to major destinations in Nepal</li>
                    <li>Hidden (off the beaten track) Nepal treks</li>
                    <li>Nepali food cooking course</li>
                    <li>Cable car ride</li>
                    <li>Voluntering in Nepal</li>
                </ul>
            </dd>
            <dt class="heading-5">For more information about Trekking Visit</dt>
            <dd><a href="https://neatadventure.com">Nepal Experienced Adventure Treks (P) LTD.</a>
                <p>G.P.O.Box 11961</p>
                <p>Home: 00977-1-4891100</p>
                <p>Fax: 00977-1-4890801</p>
                <p><a href="tel">Mobile: 00977-98510-33611 OR 00977-9803571207 OR 00977-97510-33611</a></p>
                <p>Email:info@neatadventure.com</p>




            </dd>
            {{-- <dt class="heading-5">Information We Collect</dt>
            <dd>Our store collects data to operate effectively and provide you the best experiences with our services. You provide some of this data directly, such as when you create a personal account. We get some of it by recording how you interact
                with our services by, for example, using technologies like cookies, and receiving error reports or usage data from software running on your device. We also obtain data from third parties (including other companies). For example,
                we supplement the data we collect by purchasing demographic data from other companies. We also use services from other companies to help us determine a location based on your IP address in order to customize certain services to
                your location. The data we collect depends on the services and features you use.</dd>
            <dt class="heading-5">How We Use Your Information</dt>
            <dd>Our web site uses the data we collect for three basic purposes: to operate our business and provide (including improving and personalizing) the services we offer, to send communications, including promotional communications, and to
                display advertising. In carrying out these purposes, we combine data we collect through the various web site services you use to give you a more seamless, consistent and personalized experience. However, to enhance privacy, we
                have built in technological and procedural safeguards designed to prevent certain data combinations. For example, we store data we collect from you when you are unauthenticated (not signed in) separately from any account information
                that directly identifies you, such as your name, email address or phone number.</dd>
            <dt class="heading-5">Sharing Your Information</dt>
            <dd>We share your personal data with your consent or as necessary to complete any transaction or provide any service you have requested or authorized. For example, we share your content with third parties when you tell us to do so. When
                you provide payment data to make a purchase, we will share payment data with banks and other entities that process payment transactions or provide other financial services, and for fraud prevention and credit risk reduction. In
                addition, we share personal data among our controlled affiliates and subsidiaries. We also share personal data with vendors or agents working on our behalf for the purposes described in this statement. For example, companies we've
                hired to provide customer service support or assist in protecting and securing our systems and services may need access to personal data in order to provide those functions. In such cases, these companies must abide by our data
                privacy and security requirements and are not allowed to use personal data they receive from us for any other purpose. We may also disclose personal data as part of a corporate transaction such as a merger or sale of assets.</dd>
        </dl><a class="privacy-link" href="mailto:#">privacy@demolink.org</a> --}}
    </div>
</section>
@endsection
