<?php include_once 'db.php';?>
<?php 

	if(!$comman->is_loggedin())
    {
     	$comman->redirect('login.php');
    }
    $user_id = $_SESSION['user_session'];

 ?>
<!DOCTYPE html>
<html>
<head>
	<title>Welcome to dashboard</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<body>

	<nav class="navbar navbar-default">
	  	<div class="container-fluid">
		    <div class="navbar-header">
		      	<a class="navbar-brand" href="#">Welcome to Dashboard</a>
		    </div>
		    <ul class="nav navbar-nav">
		      <li class="active"><a href="index.php">Home</a></li>
		      <li><a href="logout.php">Logout</a></li>
		    </ul>
	  	</div>
	</nav>

  	<?php 
	    $res=$comman->user_fetch($user_id); 
		while($row=$res->fetch())
	    {						        
	?>
		<div class="container">
			<h3><?php echo $row['name']; ?></h3>
			<p><?php echo $row['email']; ?></p>
		</div>
	<?php
		}
	?>

</body>
</html>
