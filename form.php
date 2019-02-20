<?php
session_start();
$_SESSION['message'] = '';
// Conection to the database
$mysqli = new mysqli('localhost', 'root', 'calderon1812', 'test')
?>
<?php
if($_SERVER['REQUEST_METHOD'] == 'POST'){
  $name = $mysqli->real_escape_string($_POST['name']);
  $email = $mysqli->real_escape_string($_POST['email']);
  $location = $mysqli->real_escape_string($_POST['location']);
  $skills = $mysqli->real_escape_string($_POST['skills']);

  $sql = "INSERT INTO users (name, email, location, skills) " . "VALUES ('$name', '$email', '$location', '$skills')";

  //If the submission is sucessfully redirect to user administration
  if ($mysqli->query($sql) === true) {
    $_SESSION['message'] = 'REGISTRATION SUCCESFUL! ADDED $NAME TO THE USERS!';
    header("location: usersAdministration.php");
  }
}
?>


<link rel="stylesheet" href="form\form.css" type="text/css">
<div class="body-content">
  <div class="module">
    <h1>Create an user</h1>
    <form class="form" action="form.php" method="post" enctype="multipart/form-data" autocomplete="off">
      <div class="alert alert-error"><?= $_SESSION['message'] ?></div>
      <input type="text" placeholder="Name" name="name" required />
      <input type="email" placeholder="Email" name="email" required />
      <input type="text" placeholder="Location" name="location" required />
      <input type="text" placeholder="Skills" name="skills" required />
      <input type="submit" value="Register" name="register" class="btn btn-block btn-primary" />
    </form>
  </div>
</div>