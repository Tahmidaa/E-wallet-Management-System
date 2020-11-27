 //Hadil 1618880
<?php
   session_start(); 
   if($_SERVER["REQUEST_METHOD"] == "POST") {
      session_destroy();
      header("location:homepage.php");
		die(); 
   }
?>
<html>
   
   <head>
      <title>Admin Page</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
      
   </head>
   
   <body>
      <div class="container mt-5 ">
         <div class="card p-5 shadow">	
            <div class="card-header text-center mb-3" style="border-bottom: 0">
               <h6 class="display-4">Admin Dashboard</h6> 
            </div>	
            <div class="card-body">
               <form action="" method="POST">
                  <div class="text-center mt-5">
                     <button type="submit" class="btn btn-danger btn-lg">Delete All Data</button>
                  </div>
               </form>
            </div>
         </div>
      </div>
   </body>
</html>
