<?php

require("connexion_bdd.php");

if (isset($_POST['usernames'], $_POST['passwords'])) {
  $usernames = htmlspecialchars($_POST['usernames']);
  $passwords = htmlspecialchars($_POST['passwords']);
  $stmt = $bdd->prepare("SELECT * FROM `authentification` WHERE `username` = ?");
  $stmt->execute(array($usernames));
  $user = $stmt->fetch();

  if ($user && password_verify($passwords, $user['password'])) {
    header("Location:http://localhost/carnetV2/public/profil.php");
  } else {
    echo "<script type='text/javascript'>alert('Username ou Mot de passe invalide');</script>";
  }
}





if (isset($_POST['first_name'], $_POST['last_name'], $_POST['email'], $_POST['username'], $_POST['password'])) {
  $firstname = htmlspecialchars($_POST['first_name']);
  $lastname = htmlspecialchars($_POST['last_name']);
  $email = htmlspecialchars($_POST['email']);
  $username = htmlspecialchars($_POST['username']);
  $password = htmlspecialchars($_POST['password']);
  $hash = password_hash($password, PASSWORD_DEFAULT);
  $req = $bdd->prepare('INSERT INTO `authentification`(`first_name`, `last_name`,`email`,`username`, `password`) VALUES (?,?,?,?,?)');
  $req->execute(array(
    $firstname,
    $lastname,
    $email,
    $username,
    $hash
  ));

  header("Location: http://localhost/carnetV2/public/");
}



?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <title>Authentification</title>
  <link rel="stylesheet" href="./style-authentification.css">

</head>

<body>
  <!-- partial:index.partial.html -->
  <html lang="en">

  <head>
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
  </head>

  <body>


    <div id="form">
      <div class="container">
        <div class="col-lg-6 col-lg-offset-3 col-md-6 col-md-offset-3 col-md-8 col-md-offset-2">
          <div id="userform">
            <ul class="nav nav-tabs nav-justified" role="tablist">
              <li class="active"><a href="#signup" role="tab" data-toggle="tab">Sign up</a></li>
              <li><a href="#login" role="tab" data-toggle="tab">Log in</a></li>
            </ul>
            <div class="tab-content">
              <div class="tab-pane fade active in" id="signup">
                <h2 class="text-uppercase text-center"> Sign Up </h2>
                <form id="signup" action="index.php" method="post">
                  <div class="row">
                    <div class="col-xs-12 col-sm-6">
                      <div class="form-group">
                        <label>First Name<span class="req">*</span> </label>
                        <input type="text" class="form-control" name="first_name" id="first_name" required data-validation-required-message="Please enter your name." autocomplete="off">
                        <p class="help-block text-danger"></p>
                      </div>
                    </div>
                    <div class="col-xs-12 col-sm-6">
                      <div class="form-group">
                        <label> Last Name<span class="req">*</span> </label>
                        <input type="text" class="form-control" name="last_name" id="last_name" required data-validation-required-message="Please enter your name." autocomplete="off">
                        <p class="help-block text-danger"></p>
                      </div>
                    </div>
                  </div>
                  <div class="form-group">
                    <label> Your Email<span class="req">*</span> </label>
                    <input type="email" class="form-control" name="email" id="email" required data-validation-required-message="Please enter your email address." autocomplete="off">
                    <p class="help-block text-danger"></p>
                  </div>
                  <div class="form-group">
                    <label> Your Username<span class="req">*</span> </label>
                    <input type="username" class="form-control" name="username" id="username" required data-validation-required-message="Please enter your email address." autocomplete="off">
                    <p class="help-block text-danger"></p>
                  </div>
                  <div class="form-group">
                    <label> Password<span class="req">*</span> </label>
                    <input type="password" class="form-control" name="password" id="password" required data-validation-required-message="Please enter your password" autocomplete="off">
                    <p class="help-block text-danger"></p>
                  </div>
                  <div class="mrgn-30-top">
                    <button type="submit" class="btn btn-larger btn-block" />
                    Sign up
                    </button>
                  </div>
                </form>
              </div>
              <div class="tab-pane fade in" id="login">
                <h2 class="text-uppercase text-center"> Log in</h2>
                <form id="login" action="" method="post">
                  <div class="form-group">
                    <label> Your Username<span class="req">*</span> </label>
                    <input type="username" class="form-control" name="usernames" id="usernames" required data-validation-required-message="Please enter your email address." autocomplete="off">
                    <p class="help-block text-danger"></p>
                  </div>
                  <div class="form-group">
                    <label> Password<span class="req">*</span> </label>
                    <input type="password" class="form-control" name="passwords" id="passwords" required data-validation-required-message="Please enter your password" autocomplete="off">
                    <p class="help-block text-danger"></p>
                  </div>
                  <div class="mrgn-30-top">
                    <button type="submit" class="btn btn-larger btn-block" />
                    Log in
                    </button>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
      <!-- /.container -->
    </div>
    <script src="//code.jquery.com/jquery-1.11.3.min.js"></script>
    <!-- Latest compiled and minified JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
  </body>
  <!-- partial -->
  <script src="./script.js"></script>


</body>

</html>