@extends('frontend.layouts.app')
@include('frontend.includes.nav')
@section('content')
<script src="https://www.google.com/recaptcha/api.js" async defer></script>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
<link href='https://fonts.googleapis.com/css?family=Lato:300,400' rel='stylesheet' type='text/css'><link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/meyer-reset/2.0/reset.min.css">
<style>
    html, body, div, span, applet, object, iframe,
h1, h2, h3, h4, h5, h6, p, blockquote, pre,
a, abbr, acronym, address, big, cite, code,
del, dfn, em, img, ins, kbd, q, s, samp,
small, strike, strong, sub, sup, tt, var,
b, u, i, center,
dl, dt, dd, ol, ul, li,
fieldset, form, label, legend,
table, caption, tbody, tfoot, thead, tr, th, td,
article, aside, canvas, details, embed,
figure, figcaption, footer, header, hgroup,
menu, nav, output, ruby, section, summary,
time, mark, audio, video {
  margin: 0;
  padding: 0;
  border: 0;
  font: inherit;
  font-size: 100%;
  vertical-align: baseline;
}

html {
  line-height: 1;
}

ol, ul {
  list-style: none;
}

table {
  border-collapse: collapse;
  border-spacing: 0;
}

caption, th, td {
  text-align: left;
  font-weight: normal;
  vertical-align: middle;
}

q, blockquote {
  quotes: none;
}
q:before, q:after, blockquote:before, blockquote:after {
  content: "";
  content: none;
}

a img {
  border: none;
}

article, aside, details, figcaption, figure, footer, header, hgroup, main, menu, nav, section, summary {
  display: block;
}

/* Colors */
/* ---------------------------------------- */
div, input, select, textarea {
  box-sizing: border-box;
}

body {
  font-family: 'Lucida Grande', Arial, Verdana, Helvetica, sans-serif;
  font-weight: 400;
}

a {
  text-decoration: none;
}

form {
  max-width: 445px;
  box-sizing: border-box;
  margin-left: auto;
  margin-right: auto;
  background-color: #FBFAF5;
  padding: 10px;
}

.mr3 {
  margin-right: 15px;
}

.info-text {
  text-align: left;
  width: 100%;
}

.form-group {
  margin-bottom: 15px;
  background-color: #eee;
  padding: 15px;
  border-radius: 2px;
}
.form-group .controls:not(.nested):last-child :last-of-type {
  margin-bottom: 0;
}

.form-group-buttons {
  padding: 0 10px;
  text-align: center;
}
.form-group-buttons button {
  text-align: center;
  display: inline-block;
  padding: 14px;
  border-radius: 3px;
  width: 120px;
  text-transform: uppercase;
  letter-spacing: 0.5px;
  background-color: #C1AC7E;
}
.form-group-buttons button:hover {
  box-shadow: inset 0 0 0 100vw rgba(0, 0, 0, 0.05);
}

.g-recaptcha {
  margin: auto;
}
.g-recaptcha div {
  margin: auto;
}

.heading {
  font-size: 18px;
  font-weight: 600;
  text-align: left;
  color: #A26D45;
  background-color: #ddd;
  border-radius: 3px;
  /* border-bottom: 1px solid $asphalt; */
  padding: 16px 14px;
  margin-bottom: 20px;
}

.controls {
  position: relative;
}
.controls input[type="text"],
.controls input[type="email"],
.controls input[type="number"],
.controls input[type="tel"],
.controls textarea,
.controls button,
.controls select {
  padding: 12px;
  font-size: 14px;
  border: 1px solid #c6c6c6;
  width: 100%;
  margin-bottom: 20px;
  color: #888;
  font-family: 'Lato', 'sans-serif';
  font-size: 16px;
  font-weight: 300;
  border-radius: 2px;
  transition: all 0.3s;
}
.controls input[type="text"]:focus, .controls input[type="text"]:hover,
.controls input[type="email"]:focus,
.controls input[type="email"]:hover,
.controls input[type="number"]:focus,
.controls input[type="number"]:hover,
.controls input[type="tel"]:focus,
.controls input[type="tel"]:hover,
.controls textarea:focus,
.controls textarea:hover,
.controls button:focus,
.controls button:hover,
.controls select:focus,
.controls select:hover {
  outline: none;
  border-color: #C1AC7E;
}
.controls input[type="text"]:focus + label, .controls input[type="text"]:hover + label,
.controls input[type="email"]:focus + label,
.controls input[type="email"]:hover + label,
.controls input[type="number"]:focus + label,
.controls input[type="number"]:hover + label,
.controls input[type="tel"]:focus + label,
.controls input[type="tel"]:hover + label,
.controls textarea:focus + label,
.controls textarea:hover + label,
.controls button:focus + label,
.controls button:hover + label,
.controls select:focus + label,
.controls select:hover + label {
  color: #a26d45;
  cursor: text;
}
.controls input[type="text"]:focus + label.active, .controls input[type="text"]:hover + label.active,
.controls input[type="email"]:focus + label.active,
.controls input[type="email"]:hover + label.active,
.controls input[type="number"]:focus + label.active,
.controls input[type="number"]:hover + label.active,
.controls input[type="tel"]:focus + label.active,
.controls input[type="tel"]:hover + label.active,
.controls textarea:focus + label.active,
.controls textarea:hover + label.active,
.controls button:focus + label.active,
.controls button:hover + label.active,
.controls select:focus + label.active,
.controls select:hover + label.active {
  color: #fff;
}
.controls .fa-sort {
  position: absolute;
  box-sizing: border-box;
  width: 42px;
  height: 42px;
  padding: 15px 20px;
  pointer-events: none !important;
  top: 2px;
  right: 2px;
  color: #999;
  background-color: #fff;
}
.controls select {
  -moz-appearance: none;
  -webkit-appearance: none;
  cursor: pointer;
  background-color: #fff;
}
.controls label {
  pointer-events: none !important;
  position: absolute;
  left: 8px;
  top: 0;
  transform: translateY(12px);
  width: auto;
  color: #999;
  font-size: 16px;
  display: inline-block;
  padding: 4px 10px;
  font-weight: 400;
  border-radius: 4px;
  background-color: rgba(255, 255, 255, 0);
  transition: color 0.3s, transform 0.3s, background-color 0.3s;
  /* background-color: rgba(255,255,255,1); */
}
.controls label.active {
  transform: translateY(-12px);
  color: #fff;
  background-color: #999999;
  width: auto;
}
.controls textarea {
  resize: none;
  height: 200px;
}

button {
  cursor: pointer;
  background-color: #a26d45;
  border: none;
  color: #fff;
}
button:hover {
  background-color: #b3794d;
}

.clear:after {
  content: "";
  display: table;
  clear: both;
}

.grid:after {
  /* Or @extend clearfix */
  content: "";
  display: table;
  clear: both;
}

[class*='col-'] {
  float: left;
  padding-right: 10px;
}
.grid [class*='col-']:last-of-type {
  padding-right: 0;
}

.col-2-3 {
  width: 66.66%;
}

.col-1-3 {
  width: 33.33%;
}

.col-1-2 {
  width: 50%;
}

.col-1-4 {
  width: 25%;
}

/*@media (max-width: 768px) {
  [class*='col-'] {
    width: 100%;
    padding-right: 0px;
  }
}
*/
.col-1-8 {
  width: 12.5%;
}
</style>
<form action="">

    <!-- Booking Details Section -->
    <section class="form-group">
      <h2 class="heading">Booking Details</h2>

      <!-- Check-in Month -->
      <div class="controls">
        <i class="fa fa-sort"></i>
        <select class="floatLabel" name="country">
          <option value="blank" selected disabled></option>
          <option value="01">January</option>
          <option value="02">February</option>
          <option value="03">March</option>
          <option value="04">April</option>
          <option value="05">May</option>
          <option value="06">June</option>
          <option value="07">July</option>
          <option value="08">August</option>
          <option value="09">September</option>
          <option value="10">October</option>
          <option value="11">November</option>
          <option value="12">December</option>
        </select>
        <label for=""><i class="fa fa-calendar-o"></i>&nbsp;&nbsp;Check-in Month</label>
      </div>

      <!-- Check-in Day -->
      <div class="controls">
        <i class="fa fa-sort"></i>
        <select class="floatLabel">
          <option value="blank" selected disabled></option>
          <option value="01">1</option>
          <option value="02">2</option>
          <option value="03">3</option>
          <option value="04">4</option>
          <option value="05">5</option>
          <option value="06">6</option>
          <option value="07">7</option>
          <option value="08">8</option>
          <option value="09">9</option>
          <option value="10">10</option>
          <option value="11">11</option>
          <option value="12">12</option>
          <option value="13">13</option>
          <option value="14">14</option>
          <option value="15">15</option>
          <option value="16">16</option>
          <option value="17">17</option>
          <option value="18">18</option>
          <option value="19">19</option>
          <option value="20">20</option>
          <option value="21">21</option>
          <option value="22">22</option>
          <option value="23">23</option>
          <option value="24">24</option>
          <option value="25">25</option>
          <option value="26">26</option>
          <option value="27">27</option>
          <option value="28">28</option>
          <option value="29">29</option>
          <option value="30">30</option>
          <option value="31">31</option>
        </select>
        <label for="fruit"><i class="fa fa-calendar"></i>&nbsp;&nbsp;Check-in Day</label>
      </div>

      <!-- Num of Days -->
      <div class="controls">
        <i class="fa fa-sort"></i>
        <select class="floatLabel">
          <option value="blank" selected disabled></option>
          <option value="01">1</option>
          <option value="02">2</option>
          <option value="03">3</option>
          <option value="04">4</option>
          <option value="05">5</option>
          <option value="06">6</option>
          <option value="07">7</option>
          <option value="08">8</option>
          <option value="09">9</option>
          <option value="10">10</option>
          <option value="11">11+</option>
        </select>
        <label for="fruit"><i class="fa fa-calendar-minus-o"></i>&nbsp;&nbsp;Number of Days</label>
      </div>

      <!-- Num of Guests -->
      <div class="controls">
        <i class="fa fa-sort"></i>
        <select class="floatLabel">
          <option name="1" value="blank" selected disabled></option>
          <option name="1" value="01">1</option>
          <option name="1" value="02">2</option>
          <option name="1" value="03">3</option>
        </select>
        <label for="fruit"><i class="fa fa-users"></i>&nbsp;&nbsp;Number of Guests</label>
      </div>
<select name="" id="">
  <option value="">nanaahha</option>
  <option value="">nanaahha</option>

</select>
      <!-- Num of Rooms -->
      <div class="controls">
        <i class="fa fa-sort"></i>
        <select class="floatLabel">
          <option value="blank" selected disabled></option>
          <option value="01">1</option>
          <option value="02">2</option>
          <option value="03">3</option>
          <option value="04">4</option>
          <option value="05">5</option>
          <option value="06">6</option>
          <option value="07">7</option>
          <option value="08">8</option>
          <option value="09">9</option>
          <option value="10">10</option>
          <option value="11">11+</option>
        </select>
        <label for="fruit"><i class="fa fa-building-o"></i>&nbsp;&nbsp;Number of Rooms</label>
      </div>

    </section>

    <!-- Contact Information Section -->
    <section class="form-group">
      <h2 class="heading">Contact Information</h2>

      <!-- Name Field -->
      <div class="controls">
        <input type="text" id="name" class="floatLabel" name="name">
        <label for="name">Name</label>
      </div>

      <!-- Street Field -->
      <div class="controls">
        <input type="text" id="street" class="floatLabel" name="street">
        <label for="street">Street</label>
      </div>

      <!-- Address Fields—City, State, Zip -->
      <div class="grid">

        <!-- City Field -->
        <div class="col-1-2 col-1-2-sm">
          <div class="controls nested">
            <input type="text" id="city" class="floatLabel" name="city">
            <label for="city">City</label>
          </div>
        </div>

        <!-- State Field -->
        <div class="col-1-4">
          <div class="controls nested">
            <input type="text" id="state" class="floatLabel" name="state">
            <label for="state">State</label>
          </div>
        </div>

        <!-- Zip Code Field -->
        <div class="col-1-4">
          <div class="controls nested">
            <input type="text" id="zip-code" class="floatLabel" name="zip-code">
            <label for="zip-code">Zip Code</label>
          </div>
        </div>

      </div>

      <!-- Email Field -->
      <div class="controls">
        <input type="text" id="email" class="floatLabel" name="email">
        <label for="email">Email</label>
      </div>

      <!-- Phone Field -->
      <div class="controls">
        <input type="tel" id="phone" class="floatLabel" name="phone">
        <label for="phone">Phone</label>
      </div>

    </section>

    <!-- Questions/Comments Section -->
    <section class="form-group">
      <h2 class='heading'>Questions or Comments</h2>
      <div class="grid">
        <p class="info-text">Please add any questions or comments below</p>
        <br>

        <!-- Questions/Comments Field -->
        <div class="controls">
          <textarea name="comments" class="floatLabel" id="comments"></textarea>
          <label for="comments">Questions/Comments</label>
        </div>
      </div>
    </section>

    <!-- CAPTCHA Spam Protection -->
    <section class="form-group">
      <h2 class='heading'>CAPTCHA Spam Protection</h2>
      <!-- Google ReCAPTCHA -->
      <div class="g-recaptcha" data-sitekey="your_site_key"></div>
    </section>

    <section class="form-group-buttons">
        <button type="submit" value="Submit" class="btn-submit mr3"><i class="fa fa-send"></i>&nbsp;&nbsp;Submit</button>
        <button type="reset" value="Reset" class="btn-reset"><i class="fa fa-times"></i>&nbsp;&nbsp;Reset</button>
    </section>

  </form>
  <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
<script src='https://raw.githubusercontent.com/andiio/selectToAutocomplete/master/jquery-ui-autocomplete.js'></script>
<script src='https://raw.githubusercontent.com/andiio/selectToAutocomplete/master/jquery.select-to-autocomplete.js'></script>
<script src='https://raw.githubusercontent.com/andiio/selectToAutocomplete/master/jquery.select-to-autocomplete.min.js'></script><script  src="./script.js"></script>
<script>
    (function($){
	function floatLabel(inputType){
		$(inputType).each(function(){
			var $this = $(this);
			// on focus add cladd active to label
			$this.focus(function(){
				$this.next().addClass("active");
			});
			//on blur check field and remove class if needed
			$this.blur(function(){
				if($this.val() === '' || $this.val() === 'blank'){
					$this.next().removeClass();
				}
			});
		});
	}
	// just add a class of "floatLabel to the input field!"
	floatLabel(".floatLabel");
})(jQuery);
</script>
@endsection
