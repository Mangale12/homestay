<!DOCTYPE html>
<html lang="en" >
<head>
  <meta charset="UTF-8">
  <title>Login</title>
  <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500&display=swap" rel="stylesheet"><link rel="stylesheet" href="./style.css">
<style>
    * {
  margin: 0;
  padding: 0;
  box-sizing: border-box;
}

body {
  background: #f2f2f2;
  min-height: 100vh;
  display: flex;
  justify-content: center;
  align-items: center;
  font-family: "Roboto", sans-serif;
}

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
</head>
<body>
<!-- partial:index.partial.html -->
<div class="login-box">
  <div class="login-header">
    <h5>Sign in</h5>
  </div>
  <div class="col-md-12 p-0">
   <span>{{ session()->get('login_error') }}</span>
</div>
    <form action="{{ route('users.login') }}" method="POST">
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
            <div class="btn-container">
            <button class="btn btn-primary">Sign in</button>
            <button class="btn btn-secondary">Sign in with Google</button>
            </div>
        </div>
</div>

    </form>

<!-- partial -->

</body>
</html>
