<?php
 session_start();
require_once('connection.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">  
    <meta charset="UTF-8">
    <title>home</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
  
  <div class="wrapper" >



<div class="block" >
<fieldset class="all_rooms" id="down"   style=" margin-top: 70px;">
<nav class="album" >


<?php 
                if(isset($_SESSION['user']))
                {
          ?>
          <h2><?php echo "your reserved rooms " . strtoupper("".$_SESSION['user']) ?></h2>
<?php 


function daysBetween($dt1, $dt2) // li nahssab biha lyamat
{
    return date_diff(
        date_create($dt2),  
        date_create($dt1)
    )->format('%a');
}

$clientID=$_SESSION['id'];
$today=date("Y-m-d");
    $query="SELECT * FROM books WHERE clientID='".$clientID."' and dateTo>='".$today."';";

          $result = $con->query($query);
          if (!$result) die($con->error);
          $rows = $result->num_rows;
    if($rows==0){
      echo "sorry you dont have any room ";

    ?>
    <p class="alert">sorry you dont have any room</p>
<?php
    }else      
      echo "<p>you have reserved ".$rows." rooms</p>";

    ?>
  <ul>
<?php
        $count=1;

  for ($j = 0 ; $j < $rows ; ++$j)
  { ////////////////////////////////////////////////////////
  $result->data_seek($j);
  $row = $result->fetch_array(MYSQLI_NUM);
  $bookID=$row[0];
 // $clientID=$row[1];
  $roomID=$row[2];
  $dateFrom=$row[3];
  $dateTo=$row[4];
  $days=daysBetween($dateFrom, $dateTo)+1;


$query2="SELECT * FROM rooms WHERE roomID='".$roomID."';";
$result2 = $con->query($query2);
$result2->data_seek(0);
$row2 = $result2->fetch_array(MYSQLI_NUM);

$nbeds=$row2[1];
$nfloor=$row2[2];
$roomType=$row2[3];
$price=$row2[4];
$total=$price*$days;

?>
<li class="room-details">
      <div class="album-imagesz">
          <h3 > Room : <?php echo "". $row[0] ?> </h3><hr>  
      </div>
      <div class="album-info">     
        <p name="nbeds" > Beds : <?php echo "". $nbeds ?> </p>
        <p name="nfloor"> Floor: <?php echo "". $nfloor ?> </p>
        <p name="roomType"> Type : <?php echo "". $total ?> </p>
        
        <hr><b>remaning days : <u class="price"><?php echo $days?></u> </b>
        <p><strong>Total : <u class="price"><?php echo $total?> DA</u> </strong></p>
      </div>
    </li>
<?php
    if ($count==3  ) // narja3 f star
    {
      $count=1;
      ?></ul> <ul><?php
      }
    else {$count++;}
}
?>
        </ul>
          <div class="buttons">
          <a id="book_button" href="book.php"><button>add book</button></a>
          
        </div>
        <?php
 }

 ?>
</nav>
  </fieldset>

</div></div>
<!-- //////////////////  DFAULT PARAMETRE IN ALL MY SITE  /////////////////////   -->













        <nav class="navbar">
            <img class="logo" src="pics/logo-iskandar.gif">
        <ul>
        <li><a class="active" href="index.php">Home</a></li>
<?php
if(isset($_SESSION['user']))
{
?>
<li><a class="active" href=""><?php echo ucfirst("".$_SESSION['user']) ?></a></li>
<li><a href="process_logout.php?logout">LOG Out</a></li>
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