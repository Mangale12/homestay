@extends("frontend.layouts.app")
@section('content')
@include('frontend.includes.nav')
  <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500&display=swap" rel="stylesheet"><link rel="stylesheet" href="./style.css">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.3/dist/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
<style>

.login-box {
  width: 400px;
  height: auto;
  border: 1px solid #eee;
  background: #fff;
  padding: 2rem;
  box-radius: 2px;
}
.login-box .login-header {
  display: flex;
  justify-content: space-between;
  align-items: center;
  padding: 2rem 0;
  position: relative;
}
.login-box .login-header::before {
  content: "";
  position: absolute;
  width: 100px;
  height: 100px;
  top: 0;
  left: 0;
  right: 0;
  transform: translate(120%, -90%);
  background: orange;
  border-radius: 50%;
}
.login-box .login-header h5 {
  font-size: 2rem;
}
.login-box .login-form .input-field {
  display: flex;
  flex-direction: column;
  gap: 0.3rem;
  margin-bottom: 1rem;
}
.login-box .login-form .input-field input {
  border: 1px solid #ccc;
  padding: 0.7rem;
  border-radius: 3px;
  background: #f2f2f2;
}
.login-box .login-form .checkbox,
.login-box .login-form .box {
  display: flex;
  align-items: center;
}
.login-box .login-form .box {
  justify-content: space-between;
}
.login-box .login-form .box a {
  color: blue;
  text-decoration: none;
}

.btn-container {
  display: flex;
  flex-direction: column;
  gap: 1rem;
  margin-top: 2rem;
}
.btn-container .btn {
  padding: 0.7rem;
  border: 1px solid #eee;
  border-radius: 2px;
  cursor: pointer;
}
.btn-container .btn-primary {
  background: #ff6c38;
  color: #fff;
}
</style>
<!-- partial:index.partial.html -->
<form action="{{ route('users.store') }}" method="POST">
    @csrf
    <div class="login-box">
        <div class="login-header">
          <h5>Sign Up</h5>

        </div>
        <div class="col-md-12 p-0">
            @include('admin.includes.message')
        </div>
        <div class="login-form">
          <div class="input-field">
            <label for="email">Full Name</label>
            <input type="text" name="name" value="{{ old('name') }}">
          </div>
          <div class="input-field">
              <label for="email">Email</label>
              <input type="email" name="email" value="{{ old('email') }}">
            </div>
           <div class="input-field">
            <label for="email">Password</label>
            <input type="password" name="password">
          </div>
          <div class="input-field">
            <label for="email">Confirm Password</label>
            <input type="password" name="confirmPassword">
          </div>

          <div class="btn-container">
            <button class="btn btn-primary" type="submit">Sign Up</button>
           <a class="btn btn-secondary" href="{{ route('users.index') }}" style="color: white"><span>Already have an account? Sign in
          </span></a>
          </div>
        </div>
      </div>
</form>

<!-- partial -->

@endsection
