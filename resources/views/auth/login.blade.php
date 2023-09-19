<!DOCTYPE html>
<html lang="en" >
<head>

  <meta charset="UTF-8">
  @include('admin.includes.authhead')
  <title>Login</title>
  <style>
    * { box-sizing:border-box; }

body {
  background: #eee;
  -webkit-font-smoothing: antialiased;
}

hgroup {
  text-align:center;
  margin-top: 4em;
}

span {
    font-size: 0.95em;
    font-weight: 600;
    letter-spacing: 0.3em;
    line-height: 24px;
    text-transform: uppercase;
}

/*------------------------------------------------------------------
[ Login Form ]*/

.log-form {
  width: 500px;
  margin: 4em auto;
  padding: 3em 2em 2em 2em;
  background: #fafafa;
  border: 1px solid #ebebeb;
  box-shadow: rgba(0,0,0,0.14902) 0px 1px 1px 0px,rgba(0,0,0,0.09804) 0px 1px 2px 0px;
}

.group {
  position: relative;
  margin-bottom: 45px;
}

.log-input {
  font-size: 18px;
  padding: 10px 10px 10px 5px;
  -webkit-appearance: none;
  display: block;
  background: #fafafa;
  color: #636363;
  width: 100%;
  border: none;
  border-radius: 0;
  border-bottom: 1px solid #757575;
}

.log-input:focus { outline: none; }

.log-form a {
    font-size: 9px;
    font-weight: 600;
    letter-spacing: 0.3em;
    line-height: 24px;
    text-transform: uppercase;
    color: #aaaaaa;
}

.left-align {
    float: left;
    text-align: left;
}

.right-align {
    float: right;
    text-align: right;
}


/*------------------------------------------------------------------
[ Button same code as contact form ]*/

input[type="text"], input[type="email"], input[type="password"], textarea, select {
    background: transparent;
    border: none;
    font-family: "Montserrat";
    font-size: 12px;
    font-weight: 400;
    letter-spacing: 0.2em;
    line-height: 24px;
    height: 42px;
    padding-left: 20px;
    padding-right: 20px;
    text-transform: none;
    width: 100%;
}

input[type="checkbox"]:not(:checked) + label, input[type="checkbox"]:checked + label {
    color: #aaaaaa;
    cursor: pointer;
    font-size: 9px;
    font-weight: 600;
    letter-spacing: 0.3em;
    padding-left: 10px;
    padding-top: 6px;
    position: relative;
    text-transform: uppercase;
}
  </style>

</head>
<body>
<!-- partial:index.partial.html -->
<section>

	<hgroup>
	    <h2>Welcome back!</h2>
		<p>Please enter your details to sign into your account</p>
	</hgroup>

	<form method="post" class="log-form" action="{{ route('login') }}">
        @include('admin.includes.message')
        @csrf
	    <div class="group log-input">
	    	<input type="text" id = "username" name = "email" placeholder = "Username">
	    </div>

	    <div class="group log-input">
	        <input type="password" id = "password" name = "password"  placeholder = "Password">
	    </div>
        <div class="group log-input">
	        <input type="submit" value="Login">
	    </div>
	</form>



</section>
<!-- partial -->

</body>
</html>
