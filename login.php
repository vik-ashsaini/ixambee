<?php
  	require_once 'db.php';
  	
	if(isset($_POST['btn-login']))
  	{
    	$email = $_POST['email'];
    	$password = $_POST['password'];
      	$password = md5($password);  

    	if($comman->loginuser($email,$password))
    	{
      		$comman->redirect('index.php');
    	}
    	else
    	{
    		echo '<script>alert("Wrong Details !")</script>';
    	} 
  	}
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <title>Welcome to Login Panel</title>

    <meta name="viewport" content="width=device-width, initial-scale=1" />

    <link
      rel="stylesheet"
      href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css"
    />
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
        <h2>Sign In</h2>
        <form name="myForm" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" >
          <div class="form-group">
            <label for="email">Email:</label>
            <input type="email" name="email"  id="email" class="form-control" placeholder="Email" required/>
          </div>
          <div class="form-group">
            <label for="password">Password:</label>
            <input type="password" name="password" id="password" class="form-control" placeholder="Password" required />
          </div>
          <button type="submit" name="btn-login" class="btn btn-primary btn-block my-btn">Sign In</button>
        </form>
        <br />
        <p>Not have an account? &nbsp;<a href="register.php" class="text-center">Sign Up</a></p>
      </div>
    </div>
  </body>
</html>
