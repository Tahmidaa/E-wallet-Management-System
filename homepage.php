
<?php session_start(); 

//Hadil Mohammed Almekhkafi 1618880
if(!isset($_SESSION['login_user'])){
  header("location:login.php");
  die();
} 


//**Sehrish Kantroo-1726406{
 class wallet{

  public $balance=0;
  public $payment=0;
  public $dot;
  public $remainingBal=0; //**}

  public $payment_type; //Tahmida Haque Sumbula-1819216
  public $status; //Tahmida Haque Sumbula-1819216
  
  }
?>

 

<!--Hadil Mohammed Almekhkafi 1618880-->
<!DOCTYPE html> 
<html lang="en" dir="ltr">

  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.0.0-alpha2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.0/css/all.min.css">
    <title>E-Wallet Management system</title>
  </head>
  <body>
  
    <center><h1>E-Wallet Management system</h1></center>
    
  <link rel="stylesheet" href="homepage.css">
  
  
  <!-- Nav Bar -->
  <nav class="navbar navbar-expand-md navbar-white text-white" style="background-color:  #1abc9c">
         <a class="navbar-brand pl-3" href="#">E-Wallet</a>
         <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav">
            <span class="navbar-toggler-icon"></span>
         </button>
         <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav mr-auto">
                  <li class="nav-item active">
                     <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
                  </li>
            </ul>
            <?php 
               if(isset($_SESSION['login_user'])) {
                  $user    = $_SESSION['login_user'];
               }
            ?>
            <ul class="navbar-nav align-items-center">
               <li class="nav-item dropdown">
                  <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown"
                     aria-haspopup="true" aria-expanded="false">
                     <?php echo $user['username']; ?>
                  </a>
                  <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                     <a class="dropdown-item" href = "logout.php" style="color: #0d6efd;">Logout<i class="fas fa-sign-out-alt p-1"></i></a>
                  </div>
               </li>
            </ul>
         </div>
    </nav>

  <br>
 
 
  <!-- **Sehrish Kantroo-1726406{ -->
  <div class="container0">
    <table cellspacing='10' cellpadding ='0'>
    <td><form method = "post">
    <input type="text" id="bal" name="bal" placeholder="Add balance.."required />
    <button type="submit" id="button1" name="button"> TopUp</button>
   </form>
    </td>
    
    <td><form method = "post" >
    <input type="text" id="pay" name="payment" placeholder="Make Payment.." required />
    <button type="submit" id="button2" name="button"> Pay</button>
    </form>
    </td>
    </table>
  </div> <!-- **} -->

  <!--Hadil Mohammed Almekhkafi 1618880 -->
  <div class="container0" style="width: 700px;">
    <table cellspacing='10' cellpadding ='0'>  
    <td><form method = "post" >
      <input type="hidden"  name="credit_card" value="credit_card"/>
      <input type="text" style="width: 90%;" id="bal" name="credit_card" placeholder="Add balance.." required />
      <button type="submit" id="button2" style="width: 200px;" name="button">TopUp via Credit Card</button>
    </form>
    </td>
    </table>
  </div>


<?php
//**Sehrish Kantroo-1726406{
error_reporting (E_ALL ^ E_NOTICE);  


$bal = $_POST["bal"];
$payment = $_POST["payment"];
$credit_card = $_POST["credit_card"];
$date_of_transaction = date("Y-m-d");//** }

date_default_timezone_set("Asia/Kuala_Lumpur"); //Tahmida-1819216
$time_of_transaction = date("H:i:s"); //Tahmida-1819216

//**Sehrish Kantroo-1726406{
if(!isset($_SESSION['bal']))
  {
  $_SESSION['bal'] = 0;
  }
 //** }

 //Hadil Mohammed Almekhkafi 1618880{
  if(isset($credit_card)){
    $_SESSION['bal']= $_SESSION['bal'] + $credit_card + 0.5;
    $balance = $_SESSION['bal'];
    echo "<p style='color:blue;font-size:20px' font-style:bold>You have recieved RM 0.50 cash back.</p>";// }
  }else{

    //**Sehrish Kantroo-1726406{
     $_SESSION['bal']= $_SESSION['bal'] + $bal; 
     $balance = $_SESSION['bal'];
  }

 
if($balance >= $payment){
    if($balance == 0){
      $status = "Null";
    }
    else{
    $remaining_balance = $balance - $payment;
    $_SESSION['bal']= $remaining_balance;
    $status = "Successful";}  //Tahmida-1819216
}else{
  $payment = 0;
  $remaining_balance = $balance;
  $status = "Unsuccessful";  //Tahmida-1819216

echo "<p style='color:red;font-size:20px' font-style:bold>You dont have sufficient balance to make payment. Please topup your account.</p>";
}//** }


//##Tahmida Haque Sumbula-1819216{
if($_payment =  $credit_card){

  $payment_type = "Credit Card";
}
else{
 $payment_type = "E-Wallet";
}
    
date_default_timezone_set("Asia/Kuala_Lumpur");

$date_of_transaction = date("H:i:s");
$start = '12:00:00';
$end = '13:00:00';

if($date_of_transaction >= $start && $date_of_transaction <= $end) {

  $remaining_balance = (($balance - $payment) + ( $payment * 0.1));

  echo "<p style='color:green;font-size:20px' font-style:bold>You have recieved a discount of 10% for off peak hours’usage.</p>";

} else {
  
  $remaining_balance = $balance - $payment;

}
$date_of_transaction = date("Y-m-d H:i:s "); //##}


//**Sehrish Kantroo-1726406{ 
//object
$wallet_transac = new wallet();
$wallet_transac->balance = $balance;
$wallet_transac->payment = $payment;
$wallet_transac->dot = $date_of_transaction;
$wallet_transac->remainingBal = $remaining_balance;
$wallet_transac->payment_type = $payment_type; //Tahmida Haque Sumbula-1819216
$wallet_transac->status = $status; //Tahmida Haque Sumbula-1819216


//array
$_SESSION['transactions'][] = array();
if (!isset($_SESSION['transactions'])) {
  $_SESSION['transactions'] = array();
  
}
array_push($_SESSION['transactions'], $wallet_transac);


//table
echo "<table class='table' table border='5' width='1250' margin-left: 'auto'
margin-right:'auto' cellspacing='6' cellpadding ='6'>";
echo "<tr bgcolor =' #1abc9c'>";
echo "<th><center>Balance</center></th>";
echo "<th><center>Payment</center></th>";
echo "<th><center>Date of transaction</center></th>";
echo "<th><center>Remaining balance</center></th>";
echo "</tr>";

//loop
foreach ($_SESSION['transactions'] as $item) {
  if(empty($item)){
        continue;
  }
  

$_balance = $item->balance;
$_payment = $item->payment;
$_dot = $item->dot;
$_remBal = $item->remainingBal;


echo "<tr>";
echo " <td><center>RM$_balance  </center></td> ";
echo " <td><center>RM$_payment</center></td> ";
echo " <td><center>$_dot</center></td> ";
echo " <td><center>RM$_remBal</center></td> ";
echo "</tr>";

}
echo "<div  id= 'container1'";
echo "<label> Available Balance:RM $_remBal </label>";
echo"</div>";
echo "</table>";
                  //**}
?>
    
   <!-- ##Tahmida Haque Sumbula-1819216{ -->
<!DOCTYPE html>
<html>
<body>

<h2 style="font-size:40px;">Monthly Transaction</h2>

 <?php
echo "<br>";
echo "<table class='table1' table border='5' width='800' cellspacing='6' cellpadding ='6'>";
echo "<tr bgcolor =' #1abc9c'>";
echo "<th><center>Top-Up Amount</center></th>";
echo "<th><center>Payment</center></th>";
echo "<th><center>Date of transaction</center></th>";
echo "<th><center>Transaction type</center></th>";
echo "<th><center>Payment Status<center></th>";


echo "</tr>";

  foreach ($_SESSION['transactions'] as $item) {
    if(empty($item)){  
          continue;
    }
    
$_balance = $item->balance;
$_payment = $item->payment;
$_dot = $item->dot;
$_paymenttype = $item->payment_type;
$_status = $item->status;


echo " <td><center>RM$_balance</center></td> ";
echo " <td><center>RM$_payment</center></td> ";
echo " <td><center>$_dot</center></td> ";
echo " <td><center>$_paymenttype</center></td> ";
echo " <td><center>$_status</center></td> ";

echo "</tr>";
  }

echo "<div  id= 'container2'";
echo "<label> Total Balance Left: RM $_remBal </label>";
echo"</div>";
echo "<br>";

echo "</table>";
echo "<br>";

?>

</div>
</body>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.1/umd/popper.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.0.0-alpha2/js/bootstrap.min.js"></script>
</html>
