 <!-- Page Footer-->
 @php
    $mails = explode(',',$setting->email);
    $contacts = explode(',',$setting->contact);
@endphp
 <footer class="section footer-corporate footer-corporate-2 context-dark">
    <div class="footer-corporate-inset">
        <div class="container">
            <div class="row row-40 justify-content-lg-between">
                <div class="col-sm-6 col-md-12 col-lg-3 col-xl-4">
                    <div class="oh-desktop">
                        <div class="wow slideInRight" data-wow-delay="0s">
                            <h5 class="text-spacing-100">Our Contacts</h5>
                            <ul class="footer-contacts d-inline-block d-sm-block">
                                <li>
                                    <div class="unit">
                                        <div class="unit-left"><span class="icon fa fa-phone"></span></div>
                                        <div class="unit-body">
                                            @foreach ($contacts as $contact)
                                            <a class="link-phone" href="tel:{{ $contact }}">{{ $contact }} , </a>
                                            @endforeach

                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <div class="unit">
                                        <div class="unit-left"><span class="icon fa fa-envelope"></span></div>

                                        <div class="unit-body">
                                            @foreach ($mails as $mail)
                                            <a class="link-aemail" href="mailto:{{ $mail }}">{{ $mail }} , </a>
                                            @endforeach
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <div class="unit">
                                        <div class="unit-left"><span class="icon fa fa-location-arrow"></span></div>
                                        <div class="unit-body"><a class="link-location" href="#">{{ $setting->address }}</a></div>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                {{-- <div class="col-sm-6 col-md-5 col-lg-3 col-xl-4">
                    <div class="oh-desktop">
                        <div class="wow slideInDown" data-wow-delay="0s">
                            <h5 class="text-spacing-100">Popular news</h5>
                            <!-- Post Minimal 2-->
                            <article class="post post-minimal-2">
                                <p class="post-minimal-2-title"><a href="blog-post.html">5 Facilities Every Hotel Should Have</a></p>
                                <div class="post-minimal-2-time">
                                    <time datetime="2019-05-04">May 04, 2019</time>
                                </div>
                            </article>
                            <!-- Post Minimal 2-->
                            <article class="post post-minimal-2">
                                <p class="post-minimal-2-title"><a href="blog-post.html">Making the Most of Your Stay at Resort Hotel</a></p>
                                <div class="post-minimal-2-time">
                                    <time datetime="2019-05-04">May 04, 2019</time>
                                </div>
                            </article>
                        </div>
                    </div>
                </div> --}}
                <div class="col-sm-11 col-md-7 col-lg-5 col-xl-4">
                    <div class="oh-desktop">
                        <div class="wow slideInLeft" data-wow-delay="0s">
                            <h5 class="text-spacing-100">Navigation</h5>
                            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3532.0713872152924!2d85.30944427589426!3d27.715082076178202!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x39eb18fd18df80c1%3A0xeefb7fd38e6465e5!2sNepal%20Experienced%20Adventure%20Treks%20(P)%20Ltd.!5e0!3m2!1sen!2snp!4v1698388891196!5m2!1sen!2snp" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>

                            {{-- <div class="group-md group-middle justify-content-sm-start"><a class="button button-lg button-primary button-ujarak" href="#">Get in touch</a></div> --}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div style="">
        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3532.0713872152924!2d85.30944427589426!3d27.715082076178202!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x39eb18fd18df80c1%3A0xeefb7fd38e6465e5!2sNepal%20Experienced%20Adventure%20Treks%20(P)%20Ltd.!5e0!3m2!1sen!2snp!4v1698388891196!5m2!1sen!2snp" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
    </div>
    <div class="footer-corporate-bottom-panel">
        <div class="container">
            <div class="row row-10 align-items-md-center">
                <div class="col-sm-6 col-md-4 text-sm-right text-md-center">
                    <div>
                        <ul class="list-inline list-inline-sm footer-social-list-2">
                            <li><a class="icon fa fa-facebook" href="{{ $socialmedia->facebook }}"></a></li>
                            <li><a class="icon fa fa-twitter" href="{{ $socialmedia->twitter }}"></a></li>
                            {{-- <li><a class="icon fa fa-google-plus" href="#"></a></li> --}}
                            <li><a class="icon fa fa-instagram" href="{{ $socialmedia->instagram }}"></a></li>
                        </ul>
                    </div>
                </div>
                {{-- <div class="col-sm-6 col-md-4 order-sm-first">
                    <!-- Rights-->
                    <p class="rights"><span>&copy;&nbsp;</span><span class="copyright-year"></span> <span>Resort</span>. All rights reserved
                    </p>
                </div> --}}
                {{-- <div class="col-sm-6 col-md-4 text-md-right">
                    <p class="rights"><a href="privacy-policy.html">Privacy Policy</a></p>
                </div> --}}
            </div>
        </div>
    </div>
</footer>
</div>
<!-- Global Mailform Output-->
<div class="snackbars" id="form-output-global"></div>
<!-- Javascript-->
<script src="{{ asset('public/frontend/js/core.min.js') }}"></script>
<script src="{{ asset('public/frontend/js/script.js') }}"></script>
<script src="{{ asset('public/frontend/js/bootstrap-select.min.js') }}"></script>

<!--LIVEDEMO_00 -->

<script type="text/javascript">
var _gaq = _gaq || [];
_gaq.push(['_setAccount', 'UA-7078796-5']);
_gaq.push(['_trackPageview']);
(function() {
    var ga = document.createElement('script');
    ga.type = 'text/javascript';
    ga.async = true;
    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'https://www') + '.google-analytics.com/ga.js';
    var s = document.getElementsByTagName('script')[0];
    s.parentNode.insertBefore(ga, s);
})();
</script>

<!-- Google Tag Manager --><noscript><iframe src="//www.googletagmanager.com/ns.html?id=GTM-P9FT69" height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
<script>
(function(w, d, s, l, i) {
    w[l] = w[l] || [];
    w[l].push({
        'gtm.start': new Date().getTime(),
        event: 'gtm.js'
    });
    var f = d.getElementsByTagName(s)[0],
        j = d.createElement(s),
        dl = l != 'dataLayer' ? '&l=' + l : '';
    j.async = true;
    j.src = '//www.googletagmanager.com/gtm.js?id=' + i + dl;
    f.parentNode.insertBefore(j, f);
})(window, document, 'script', 'dataLayer', 'GTM-P9FT69');
</script>
<!-- End Google Tag Manager -->
</body>

</html>
