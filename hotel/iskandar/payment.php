<?php session_start();  ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">  
    <meta charset="UTF-8">
    <title>book</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="inscription.css">
</head>
 <body>

  <div class="all">
  



  <div class="wrapper">

 
        <div class="center">




<?php           
if (isset($_SESSION['user']) && isset($_SESSION['email']) && isset($_SESSION['id'])) // ida mconicti
{
 if (isset($_GET['reserve']) && isset($_GET['roomID']) && isset($_GET['dateFrom']) ) {


$clientID=$_SESSION['id'];
$roomID=$_GET['roomID'];
$dateTo=$_GET['dateTo'];
$dateFrom=$_GET['dateFrom'];
$total=$_GET['total'];

/*
$querry="INSERT INTO books(clientID,roomID,dateFrom,dateTo) VALUES ('".$clientID."','"$roomID."','".$dateFrom."','".$dateTo."')";


$query=" INSERT INTO books(clientID,roomID,dateFrom,dateTo) VALUES ('".$clientID."','"$roomID."','".$dateFrom."','".$dateTo."')";

*/
$query=" INSERT INTO books(clientID,roomID,dateFrom,dateTo) VALUES ('".$clientID."','".$roomID."','".$dateFrom."','".$dateTo."')";
?>  



 <fieldset id="book">



                    <?php 
                        if(@$_GET['Empty']==true)
                        {
                    ?>
                        <div class="alert"><?php echo $_GET['Empty'] ?></div>                                
                    <?php
                        }
                    ?>


                    <?php 
                        if(@$_GET['Invalid']==true)
                        {
                    ?>
                        <div class="alert"><?php echo $_GET['Invalid'] ?></div>                                
                    <?php
                        }
                    ?>




<fieldset  >



<form action="process_payment.php" method="post">

   <label>Name on card : <input type="text" name="name" required="required" placeholder=" ex : Bob"></label><br>
   <label>Credit card number : <input type="text" name="card_number" placeholder=" *** *** ***" required="required"></label><br>
   <label>Zip : <input type="text" name="zip" placeholder=" zip" required="required"></label><br>

    
    <label for="card_type">
        Card Type
    <select name="card_type" id="card_type">
    <option value="Paypale">Paypale</option>
    <option value="mastercard">mastercard</option>
    <option value="paysera">paysera</option>
    </select> 
    </label><br>




    <input type="hidden" name="query" value="<?php echo $query ?>">
    <input type="hidden" name="clientID" value="<?php echo $clientID ?>">
    <input type="hidden" name="roomID" value="<?php echo $roomID ?>">
    <input type="hidden" name="dateTo" value="<?php echo $dateTo ?>">
    <input type="hidden" name="dateFrom" value="<?php echo $dateFrom ?>">
    <input type="hidden" name="total" value="<?php echo $total ?>">
    <button class="submit" name="check">submit</button> 
</form>
 </fieldset>




























<?php
 }else // ida makanch request
 { 
 ?>    
    <div class="alert"><b> I dont have request </b></div>
    <a href="book.php"><button>book</button></a>
<?php
}}
else // ida mahouch mconicti
{
?>  
<p class="alert">You are not connected</p>
<a href="sing_in.php"><button>sing_in </button></a> or
<a href="inscription.php"><button> sing_up </button> </a>
 
<?php
} 

?>
















</div>
</div></div>














        <nav class="navbar">
            <img class="logo" src="pics/logo-iskandar.gif">
        <ul>
          <li><a class="active" href="index.php">Home</a></li>
             <?php 
                // session_start();
                if(isset($_SESSION['user']))
                {
                   ?>
                    <li><a class="active" href=""><?php echo ucfirst("".$_SESSION['user']) ?></a></li>
                    <li><a  href="process_logout.php?logout">LOG Out</a></li>                            
                    <?php
                }else // if not logged in
                {  
                    ?>
                     <li><a href="inscription.php">INSCRIPTION</a></li>
                     <li><a href="sing_in.php">LOG IN</a></li>
                    <?php    
                }
            ?>
        </ul>
        </nav>


</body>

<footer>
    <div class="footer">
      <p>Copyright &copy; iskander</p>
    </div>  
</footer>

</html>