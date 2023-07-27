<!-- Including Required module -->
<?php  include './connection.php' ?>
<!-- Sign Up function -->
<?php

  if(!$result_for_fetch_data){
    echo 'Error in Fetching Data';
  }
  
  //TODO: Signup code
  if(isset($_POST['signUp'])){
    $displayName = $_POST['displayName'];
    $email = $_POST['email'];
    $password = $_POST['password__signUp'];
    $confirm__password = $_POST['confirm_password__signUp'];

    if($password === $confirm__password && strlen($password) > 5){


      while($ROW = mysqli_fetch_assoc($result_for_fetch_data)){
        $fetched_email = $ROW['email'];

        if($email === $fetched_email){
          ?>
            <script>alert(`User exist.`)</script>  
            <script>window.location.href = "/loginpage";</script>      
          <?php
          exit;
        }
      }
      $query = "INSERT INTO users(displayName, email, password) ";
      $query .= " VALUES ( '$displayName', '$email', '$password')";

      $result = mysqli_query($connect, $query);
      if(!$result){
        echo 'Error in query..👽👽';
      }
    }else{
  ?>
    <script>alert(`Password should be at least 6 letter long and password and confirm password must be same`)</script>
  <?php }} ?>

<?php
  if(isset($_POST['signIn'])){
    $email = $_POST['email_signIn'];
    $password = $_POST['password__signIn'];

    while($ROW = mysqli_fetch_assoc($result_for_fetch_data)){
      $fetched_email = $ROW['email'];
      $fetched_password = $ROW['password'];

      if($email === $fetched_email){
        if($password === $fetched_password){
          header("Location: /loginpage/data.php");
        }else{
          ?>
          <script>alert('Wrong Password')</script>
          <script>window.location.href = "/loginpage";</script>
          <?php
          exit;
        }
      }
    }
    ?>
    <script>alert("User not exist.")</script>
    <script>window.location.href = "/loginpage";</script>
    <?php
    exit;
  }
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Basic pages</title>
    <link rel="stylesheet" href="style.css" />
  </head>
  <body>
    <div class="container">
      <!-- SignIn Form -->
      <form action="#" class="form__signIn form" method='post'>
        <h1 class="heading">Already have an account?</h1>
        <div class="input__box">
          <input required type="email" name="email_signIn" id="email_signIn" />
          <label for="email_signIn">E-Mail</label>
        </div>
        <div class="input__box">
          <input
            required
            type="password"
            name="password__signIn"
            id="password__signIn"
          />
          <label for="password__signIn">Password</label>
        </div>

        <input type="submit" value="Sign In" name="signIn" />
      </form>
      
      
      <!-- Signup Form -->
      <form action="#" class="form__signUp form" method="POST">
        <h1 class="heading">Don't have an account?</h1>
        <div class="input__box">
          <input required type="text" name="displayName" id="displayName" />
          <label for="displayName">Name</label>
        </div>
        <div class="input__box">
          <input required type="email" name="email" id="email" />
          <label for="email">E-Mail</label>
        </div>
        <div class="input__box">
          <input
            required
            type="password"
            name="password__signUp"
            id="password__signUp"
          />
          <label for="password__signUp">Password</label>
        </div>
        <div class="input__box">
          <input
            required
            type="password"
            name="confirm_password__signUp"
            id="confirm_password__signUp"
          />
          <label for="confirm_password__signUp">Confirm Password</label>
        </div>

        <input type="submit" value="Sign Up" name="signUp" />
      </form>
    </div>
  </body>
</html>
