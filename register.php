<?php
  require_once 'db.php';
  
  if(isset($_POST['btn-register']))
  {
    $name = $_POST['name'];
    $email = $_POST['email'];

    $password = $_POST['password'];
    if ($name=="") 
    {
      echo '<script>alert("Please Enter User Name!")</script>';
    }
    elseif ($email=="") 
    {
      echo '<script>alert("Please Enter Email-id !")</script>';
    }
    elseif ($password=="") 
    {
      echo '<script>alert("Please Enter Email-id !")</script>';
    }
    else
    {
      $password = md5($password);  

      if($comman->checkuser($email))
      {
          echo '<script>alert("Error ! ! User already exists")</script>';
      }
      else
      {
        if($comman->registeruser($name,$email,$password))
        {
          $comman->redirect('index.php');
        }
        else
        {
          echo '<script>alert("Wrong Details!")</script>';
        } 
      } 
    } 
  }
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <title>Welcome to Register Panel</title>

    <meta name="viewport" content="width=device-width, initial-scale=1" />

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css"/>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <style>
      .my-wrapper {
        height: 100vh;
        width: 100vw;
        display: flex;
        align-items: center;
        justify-content: center;
      }

      .my-container {
        position: relative;
        top: -25px;
      }

      @media screen and (min-width: 550px) {
        .my-btn {
          width: 500px;
        }
      }
    </style>
  </head>
  <body>
    <div class="my-wrapper">
      <div class="my-container">
        <h2>Register</h2>
        <form name="myForm"  action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" onsubmit="return validateForm()">
          <div class="form-group">
            <label for="name">Name:</label>
            <input type="text" name="name" id="name" pattern="[a-zA-Z\s]+"  class="form-control" title="Full name must contain letters only" placeholder="Name" required>
          </div>
          <div class="form-group">
            <label for="email">Email:</label>
            <input type="email" name="email" id="email" class="form-control" placeholder="Email" required>
          </div>
          <div class="form-group">
            <label for="password">Password:</label>
            <input type="password" name="password" id="password" class="form-control" placeholder="Password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters" required>
          </div>
          <button type="submit" name="btn-register" class="btn btn-primary btn-block my-btn">Submit</button>
        </form>
        <br>
        <p>Already have an account? &nbsp;<a href="login.php">Sign in</a>.</p>    
      </div>
    </div>
  </body>
</html>
