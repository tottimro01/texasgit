<?php
  session_start();
  // $_SESSION["manage_language"] = null;
  if(isset($_SESSION["manage_language"]) != null){
    header('Location:index.php');
  }
?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/login.css">
    <title>Manage_Language</title>
  </head>
  <body>
    <div id="login" class="login-page">
      <div class="form">
        <!-- <form class="register-form">
          <input type="text" placeholder="name"/>
          <input type="password" placeholder="password"/>
          <input type="text" placeholder="email address"/>
          <button>create</button>
          <p class="message">Already registered? <a href="#">Sign In</a></p>
        </form> -->
        <img src="assets/img/language.png" class="mb-5" width="56" height="56">
        <!-- <form class="login-form"> -->
          <!-- <input type="text" placeholder="username"/> -->
          <input v-model="password" type="password" placeholder="password"/>
          <button v-on:click="checkLogin()" type="button">Login</button>
          <!-- <a class="message">Not registered? <a href="#">Create an account</a></p> -->
        <!-- </form> -->
      </div>
    </div>
    <script src="assets/js/vue.js"></script>
    <script src="assets/js/axios.min.js"></script>
    <script src="assets/js/login.js"></script>
  </body>
</html>