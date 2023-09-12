<div class="floating-icons" style="">
    <ul>
        <li>
            <a href="javascript:" onclick="openWeather()">
                <img src="{{asset('frontend/assets/images/cloudy.png')}}" alt="Weather" title="Weather"
                    class="img-fluid weather">
            </a>
        </li>
        <li>
            <a href="javascript:" onclick="openPatro()">
                <img src="{{asset('frontend/assets/images/calendar.png')}}" alt="Patro" title="Patro"
                    class="img-fluid calendar">
            </a>
        </li>
        <li>
            <a href="javascript:" onclick="openForex()">
                <img src="{{asset('frontend/assets/images/forex.png')}}" alt="Patro" title="Forex"
                    class="img-fluid forex">
            </a>
        </li>
        <li>
            <a href="javascript:" onclick="openHoroscope()">
                <img src="{{asset('frontend/assets/images/rashifal.png')}}" alt="Rashifal" title="Forex"
                    class="img-fluid rashifal">
            </a>
        </li>
        <li>
            <a href="javascript:" onclick="openGold()">
                <img src="{{asset('frontend/assets/images/gold.png')}}" alt="Patro" title="Gold/Silver"
                    class="img-fluid goldsilver">
            </a>
        <!--</li>-->
        <!--<li>-->
        <!--    <a href="javascript:">-->
        <!--        <img src="{{asset('frontend/assets/images/unicode.png')}}" alt="Patro" title="Unicode"-->
        <!--            class="img-fluid nepalitype">-->
        <!--    </a>-->
        <!--</li>-->
    </ul>
</div>



<div id="weather" class="weather-nav">
    <a href="javascript:void(0)" class="closebtn" onclick="closeWeather()">&times;</a>
    <iframe
        src="https://www.ashesh.com.np/weather/widget.php?title=Nepal Weather Observation&header_color=00a2e2&api=8221y0m285"
        frameborder="0" scrolling="no" marginwidth="0" marginheight="0"
        style="border:none; overflow:hidden; width:100%; height:383px; border-radius:5px;" allowtransparency="true">
    </iframe><span style="font-size:10px;color:gray;display:block">© <a href="http://www.ashesh.com.np/weather/"
            title="Nepal Weather Today" target="_top" style="text-decoration:none;font-size:10px;color:gray">Nepal
            Weather Today</a></span>
</div>

<div id="patro" class="patro-nav">
    <a href="javascript:void(0)" class="closebtn" onclick="closePatro()">&times;</a>
    <iframe
        src="https://www.ashesh.com.np/panchang/widget.php?header_title=Nepali Panchang&header_color=e6e5e2&api=8221y2m241"
        frameborder="0" scrolling="no" marginwidth="0" marginheight="0"
        style="border:none; overflow:hidden; width:100%; height:365px; border-radius:5px;" allowtransparency="true">
    </iframe><br><span style="text-align:left">© <a href="https://www.ashesh.com.np/panchang/" title="Panchang"
            target="_top" style="text-decoration:none;">Panchang</a></span>
</div>


<div id="forex" class="forex-nav">
    <a href="javascript:void(0)" class="closebtn" onclick="closeForex()">&times;</a>
    <iframe
        src="https://www.ashesh.com.np/forex/widget2.php?api=8221y7m237&header_color=38b45e&background_color=faf8ee&header_title=Nepal%20Exchange%20Rates"
        frameborder="0" scrolling="no" marginwidth="0" marginheight="0"
        style="border:none; overflow:hidden; width:100%; height:383px; border-radius:5px;" allowtransparency="true">
    </iframe><br><span style="text-align:left">© <a href="https://www.ashesh.com.np/forex/"
            title="Forex Nepal for Nepalese Rupee" target="_top" style="text-decoration:none;">Forex Nepal</a></span>
</div>

<div id="horoscope" class="horoscope-nav">
    <a href="javascript:void(0)" class="closebtn" onclick="closeHoroscope()">&times;</a>
    <iframe
        src="https://www.ashesh.com.np/rashifal/widget.php?header_title=Nepali Rashifal&header_color=f0b03f&api=8221y1m311"
        frameborder="0" scrolling="yes" marginwidth="0" marginheight="0"
        style="border:none; overflow:hidden; width:100%; height:365px; border-radius:5px;" allowtransparency="true">
    </iframe><br><span style="color:gray; font-size:8px; text-align:left">© <a
            href="https://www.ashesh.com.np/rashifal/" title="Nepali horoscope" target="_top"
            style="text-decoration:none; color:gray;">Nepali horoscope</a></span>
</div>

<div id="gold" class="gold-nav">
    <a href="javascript:void(0)" class="closebtn" onclick="closeGold()">&times;</a>
    <iframe src="https://www.ashesh.com.np/gold/widget.php?api=8221y5m385&header_color=0077e5" frameborder="0"
        scrolling="no" marginwidth="0" marginheight="0"
        style="border:none; overflow:hidden; width:100%; height:265px; border-radius:5px;" allowtransparency="true">
    </iframe><br><span style="text-align:left">© <a href="https://www.ashesh.com.np/gold/" title="Gold Rates Nepal"
            target="_top" style="text-decoration:none;">Gold Rates Nepal</a></span>
</div>
