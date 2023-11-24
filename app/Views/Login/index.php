<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>AdminLTE 3 | Log in (v2)</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?= base_url()?>/public/AdminLTE/plugins/fontawesome-free/css/all.min.css">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="<?= base_url()?>/public/AdminLTE/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?= base_url()?>/public/AdminLTE/dist/css/adminlte.min.css">
  <style>
    ::selection {
  background-color: gray;
}

.container {
  margin: 0 auto;
  display: flex;
  justify-content: center;
  align-items: center;
}

.form {
  width: 400px;
  height: 400px;
  background-image: linear-gradient(to bottom, #424242,#212121);
  display: flex;
  align-items: center;
  flex-direction: column;
  border-radius: 0.5rem;
}

.title {
  color: wheat;
  margin: 3rem 0;
  font-size: 2rem;
}

.input {
  margin: 0.5rem 0;
  padding: 1rem 0.5rem;
  width: 20rem;
  background-color: inherit;
  color: wheat;
  border: none;
  outline: none;
}

.username {
  border-bottom: 1px solid wheat;
  transition: all 400ms;
}

.username:hover {
  background-color: #424242;
  border: none;
  border-radius: 0.5rem;
}

.password {
  border-bottom: 1px solid wheat;
  transition: all 400ms;
}

.password:hover {
  background-color: #424242;
  border: none;
  border-radius: 0.5rem;
}

.btn {
  height: 3rem;
  width: 20rem;
  margin-top: 3rem;
  background-color: wheat;
  border-radius: 0.5rem;
  border: none;
  font-size: 1.2rem;
  transition: all 400ms;
  box-shadow: 0 0 10px  antiquewhite, 0 0 10px antiquewhite;
}

.btn:hover {
  background-color: antiquewhite;
  box-shadow: none;
}

  </style>
</head>
<body class="hold-transition login-page">
<div class="login-box">
  <!-- /.login-logo -->
    <div class="container">
        <form class="form" action="<?= base_url()?>Login/auth" method="post">
            <p class="title">Login Form</p>
            <input placeholder="Username" class="username input" type="text" name="username">
            <input placeholder="Password" class="password input" type="password" name="password">
            <button class="btn" type="submit">Login</button>
        </form>
    <!-- /.card-body -->
  </div>
  <!-- /.card -->
</div>
<!-- /.login-box -->

<!-- jQuery -->
<script src="<?= base_url()?>/public/AdminLTE/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="<?= base_url()?>/public/AdminLTE/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="<?= base_url()?>/public/AdminLTE/dist/js/adminlte.min.js"></script>
</body>
</html>
