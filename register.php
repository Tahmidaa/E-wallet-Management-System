<?php 
	session_start();
	if(isset($_SESSION['login_user'])){
		header("location:homepage.php");
		die();
	} 
	if($_SERVER["REQUEST_METHOD"] == "POST") {
		if(!isset($_SESSION['users'])) {
			$users = [];
		} else {
			$users = $_SESSION['users'];
		}
		$new_user = ['username' => $_REQUEST['username'], 	 'password' =>  password_hash($_REQUEST['password'], PASSWORD_DEFAULT)];
		array_push($users, $new_user);
		$_SESSION['users'] = $users;
		$_SESSION['login_user'] = $new_user;
		header("location: homepage.php");
	}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
	<title>Register</title>
</head>
<body>

	<div class="container mt-5 ">
		<div class="card p-5 shadow">	
			<div class="card-header text-center mb-3" style="border-bottom: 0">
				<h6 class="display-4">Register in e-Wallet System</h6> 
			</div>	
			<div class="card-body">
				<form action="" method="POST">
					  <div class="form-group">
					    <label for="exampleInputEmail1">User Name</label>
					    <input type="text" class="form-control"  placeholder="User Name" name="username">
					  </div>
					  <div class="form-group">
					    <label for="exampleInputPassword1">Password</label>
					    <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password" name="password">
					  </div>
					  <div class="text-center mt-5">
					  	<button type="submit" class="btn btn-primary btn-lg">Register</button>
					  </div>
				</form>
			</div>
		</div>
	</div>
</body>
</html>