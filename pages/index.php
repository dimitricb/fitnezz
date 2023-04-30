<?php

require "dbBroker.php";
require "model/trainer.php";


session_start();

if(isset($_POST['username']) && isset($_POST['password'])){

$uname=$_POST['username'];
$upass=$_POST['password'];

$trainer=new Trainer(null,$uname,$upass);
//$odg=$trainer->logInTrainer($trainer,$conn);
$odg=Trainer::logInTrainer($trainer,$conn);

if($odg){
  echo `<script> console.log("You have successfully joined!"); </script>`;

  $_SESSION['trainerid']=$trainer->trainerid;
  header('Location:home.php');
  exit();
}else{
  echo `<script> console.log("Incorrect username or password."); </script>`;
}



}


?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Login Form</title>
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ"
      crossorigin="anonymous"
    />
    <style>
      * {
        padding: 0;
        margin: 0;
        box-sizing: border-box;
      }
      body {
        background: rgb(219, 226, 226);
      }
      .row {
        background: white;
        border-radius: 30px;
        box-shadow: 12px 12px 22px grey;
      }
      img {
        border-top-left-radius: 30px;
        border-bottom-left-radius: 30px;
      }
      .btn1 {
        border: none;
        outline: none;
        height: 50px;
        width: 100%;
        background-color: black;
        color: white;
        border-radius: 4px;
        font-weight: bold;
      }

      .btn1:hover {
        background: white;
        border: 1px solid;
        color: black;
      }
      
    </style>

    <!-- <?php include 'css/css.html'; ?>     -->
  </head>

  <body>
    <section class="Form my-4 mx-5">
      <div class="container">
        <div class="row g-0">
          <div class="col-lg-5">
            <img src="images/login-image.webp" class="img-fluid" alt="" />
          </div>
          <div class="col-lg-7 px-5 pt-5">
            <h1 class="font-weight-bold py-3">Fitnezz</h1>
            <h4>Sign into your account</h4>

            <form method="POST" action="#">
              <div class="form-row">
                <div class="col-lg-7">
                  <input type="username" placeholder="Username" name="username" class="form-control my-3 p-3" required/>
                </div>
              </div>
              <div class="form-row">
                <div class="col-lg-7">
                  <input
                    type="password" placeholder="********" name="password" class="form-control my-3 p-3"
                  required/>
                </div>
              </div>
              <div class="form-row">
                <div class="col-lg-7">
                  <button type="submit" name="login" class="btn1 mt-3 mb-3">Login</button>
                </div>
              </div>

              <a href="#">Forgot password?</a>
              <p>Don't have an account? <a href="#">Register here</a></p>
            </form>
          </div>
        </div>
      </div>
    </section>

    <script
      src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe"
      crossorigin="anonymous"
    ></script>
  </body>
</html>
