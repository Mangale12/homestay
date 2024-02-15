@extends("frontend.layouts.app")
@section('content')
@include('frontend.includes.nav')
  <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500&display=swap" rel="stylesheet"><link rel="stylesheet" href="./style.css">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
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
<div class="login-box">
  <div class="login-header">
    <h5>Sign in</h5>
  </div>
  <div class="col-md-12 p-0">
   {{-- <span></span> --}}
   @if(session()->get('login_error'))
   <div class="alert alert-danger" role="alert">
    {{ session()->get('login_error') }}
  </div>
  @endif
  @if(session()->get('message'))
  <div class="alert alert-danger" role="alert">
    {{ session()->get('message') }}
  </div>
  @endif

</div>
    <form action="{{ route('login') }}" method="POST">
        @csrf
        <div class="login-form">
            <div class="input-field">
            <label for="email">Email or Username</label>
            <input type="email" name="email">
            </div>
            <div class="input-field">
            <label for="email">Password</label>
            <input type="password" name="password">
            </div>
            <div class="box">
            <div class="check">
                <input type="checkbox" id="rem">
                <label for="rem">Don't you have account ?</label>
            </div>
            <a href="{{ route('users.create') }}">Signup here</a>
            </div>
        </div>
</div>

    </form>

<!-- partial -->
<!-- Button trigger modal -->

  <!-- Modal -->
  <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Email Verification</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            Thank you for signing up! To complete your registration, please verify the email !!
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  @if(session("message"))
    <script>
        $(document).ready(function(){
            $('#exampleModal').modal('show');
         })
         </script>
  @endif
@endsection
