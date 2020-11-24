<?php
   session_start(); 

   if(isset($_SESSION['login_user'])){
		header("location:homepage.php");
		die();
	} 
   if($_SERVER["REQUEST_METHOD"] == "POST") {
		   // collect value of input field
		   $username = $_REQUEST['username'];
         $password = $_REQUEST['password'];
		   if(isset($_SESSION['users'])){
            foreach ($_SESSION['users'] as $key => $user) {
                  if ($username == $user['username'] && password_verify($password, $user['password'])) {
                     // register the user in the session and redirect to homepage page;
                     $_SESSION['login_user'] = $user;
                     header("location: homepage.php");
                     
                  }
                  /**  if the loop reaches to the end and still has't find 
                      the match username and password  */
                  if(count($_SESSION['users']) - 1 === $key) {
                     $error = "Username or Password is invalid";  
                  }
            }
         } else {
            $error = "Your Login Name or Password is invalid";  
         }
   }
?>
<html>
   
   <head>
      <title>Login Page</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
      
   </head>
   
   <body>
      <div class="container mt-5 ">
         <div class="card p-5 shadow">	
            <div class="card-header text-center mb-3" style="border-bottom: 0">
               <h6 class="display-4">Login</h6> 
            </div>	
            <div class="card-body">
               <?php 
                  if(isset($error)) {
                     echo  "<h6 class='alert alert-danger'>
                                 $error 
                           </h6>";
                  }
               ?>
               <form action="login.php" method="POST">
                  <div class="form-group">
                     <label for="exampleInputEmail1">User Name</label>
                     <input type="text" class="form-control"  placeholder="User Name" name="username">
                  </div>
                  <div class="form-group">
                     <label for="exampleInputPassword1">Password</label>
                     <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password" name="password">
                  </div>
                  <div class="text-center mt-5">
                     <button type="submit" class="btn btn-primary btn-lg">Login</button>
                  </div>
               </form>
               Don't have an account? <a href="register.php" class="btn btn-link">Register now</a>  
            </div>
         </div>
      </div>
   </body>
</html>