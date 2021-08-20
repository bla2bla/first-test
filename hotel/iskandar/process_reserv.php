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
	echo "welcom " . $_SESSION['user']. "  your email is = " . $_SESSION['email'];
	if (isset($_GET['reserve']) && isset($_GET['roomID']) && isset($_GET['dateFrom']) ) {



$roomID=$_GET['roomID'];
$dateTo=$_GET['dateTo'];
$dateFrom=$_GET['dateFrom'];

echo "<p> i have request </p>";
echo "<h3> room =  ".$_GET['reserve']."</h3>";
print_r($_GET);





	}else 
echo "<p> i dont have request </p>";
}
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
  </div>




<!-- //////////////////  DFAULT PARAMETRE IN ALL MY SITE  /////////////////////   -->













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