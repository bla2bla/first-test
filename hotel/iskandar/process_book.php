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
       if(isset($_SESSION['user']))
       {
        ?>
          <h1><?php echo "" . strtoupper("".$_SESSION['user']) ?></h1>
          <h2>Make your book</h2>
          
        <?php
       }
        else
        {
echo <<<EOL
  <h1>La Casa Rosa</h1>
  <h2>Your Hotel</h2> 
    <div class="buttons">
      <a href="sing_in.php"><button>LOG IN</button></a>
      <a href="inscription.php"> <button class="btn2">Sing UP </button></a>
    </div> 

EOL;

     } 
     ?>

</div>
  </div> 









<div class="content">

  <fieldset id="book">
<fieldset  >



<form action="process_book.php" method="post">

                            <?php 
                        if(@$_GET['Empty']==true)
                        {
                    ?>
                        <div class="alert-light text-danger text-center py-3"><?php echo $_GET['Empty'] ?></div>                                
                    <?php
                        }
                    ?>


                    <?php 
                        if(@$_GET['Invalid']==true)
                        {
                    ?>
                        <div class="alert-light text-danger text-center py-3"><?php echo $_GET['Invalid'] ?></div>                                
                    <?php
                        }
                    ?>









    <label>Date From : <input type="date" name="dateFrom" value=<?php echo "" . date("Y-m-d");?> required="required" value=<?php echo "" . date("Y-m-d"); ?> max="2023-08-26"  min=<?php echo "" . date("Y-m-d"); ?>    ></label><br>
    <label>Date To : <input type="date" name="dateTo" required="required" value=<?php echo "" . date("Y-m-d");?> max="2023-08-26"  min=<?php echo "" . date("Y-m-d"); ?> ></label><br>
    
    
    <label for="beds">
    choos number of beds 
    <select name="nbeds" id="hear-about">
    <option value="any">any</option>
    <option value="1">1</option>
    <option value="2">2</option>
    <option value="3">3</option>
    <option value="4">4</option>
    <option value="5">5</option>
    </select> 
    </label><br>


    <label for="floor">
    choos Wich floor 
    <select name="nfloor" id="hear-about">
    <option value="any">any</option>
    <option value="1">1</option>
    <option value="2">2</option>
    <option value="3">3</option>
    <option value="4">4</option>
    </select> 
    </label><br>
    <button class="submit" name="Login">submit</button> 
</form>
 </fieldset>   </fieldset>




<div class="block">
<fieldset class="all_rooms">
<nav class="album">


  

<?php 
require_once('connection.php');
 // session_start();
if(!isset($_SESSION['user']))
{
 ?>
 <h1 class="alert">you are not singed in</h1>
 <script>
    function pageRedirect() {
    window.location.replace("sing_in.php");
    }      
    setTimeout("pageRedirect()", 2000);
</script>
<?php
/*header("location:sing_in.php");*/
}
else
{

    if(isset($_POST['dateFrom']) and isset($_POST['dateTo']))
    {
                $dateTo=$_POST['dateTo'];
                $dateFrom=$_POST['dateFrom'];

    

       if($_POST['dateFrom'] > $_POST['dateTo'])
       {
            header("location:book.php?Empty= wrong date");
       }
       else
       {


$mydate=$_POST['dateFrom'];
$nfloor=$_POST['nfloor'];
$nbeds=$_POST['nbeds'];

/*
$query=" select rooms.roomID,nbeds,nfloor from rooms left join books on rooms.roomID=books.roomID where rooms.roomID NOT IN (select rooms.roomID from rooms left join books on rooms.roomID=books.roomID where dateTo>CURDATE()  ) ";*/

/*
echo "<p>floor " .$_POST['nfloor']."</p>";
echo "<p>  beds   " .$_POST['nbeds']."</p>";*/
if ($_POST['nfloor']=="any" and $_POST['nbeds']=="any" ) //ida haja mahi mdiclariya
{
$query=" select rooms.roomID,nbeds,nfloor,roomType,price from rooms left join books on rooms.roomID=books.roomID where rooms.roomID NOT IN (select rooms.roomID from rooms left join books on rooms.roomID=books.roomID where dateTo>'".$mydate."'  ) ";
}
elseif ($_POST['nbeds']!="any")
{
  if ($_POST['nfloor']!="any") //fizouj mdiclaryin
    {  
     $query=" select rooms.roomID,nbeds,nfloor,roomType,price from rooms left join books on rooms.roomID=books.roomID where nfloor='".$nfloor."' AND nbeds='".$nbeds."' AND rooms.roomID NOT IN (select rooms.roomID from rooms left join books on rooms.roomID=books.roomID where dateTo>'".$mydate."'  ) ";


    }
  else // ghir nbeds mdiclari
    {
      $query=" select rooms.roomID,nbeds,nfloor,roomType,price from rooms left join books on rooms.roomID=books.roomID where nbeds='".$nbeds."' AND rooms.roomID NOT IN (select rooms.roomID from rooms left join books on rooms.roomID=books.roomID where dateTo>'".$mydate."'  ) ";
    }  

  
}
elseif ($_POST['nfloor']!="any") //ghir nfloor mdiclari
 {
 $query=" select rooms.roomID,nbeds,nfloor,roomType,price from rooms left join books on rooms.roomID=books.roomID where nfloor='".$nfloor."' AND rooms.roomID NOT IN (select rooms.roomID from rooms left join books on rooms.roomID=books.roomID where dateTo>'".$mydate."'  ) ";
}


//




          
$result = $con->query($query);
if (!$result) die($con->error);
$rows = $result->num_rows;

$dateTo=$_POST['dateTo'];
$dateFrom=$_POST['dateFrom'];

function daysBetween($dt1, $dt2) // li nahssab biha lyamat
{
    return date_diff(
        date_create($dt2),  
        date_create($dt1)
    )->format('%a');
}
$days=daysBetween($dateFrom, $dateTo)+1;

echo "<p>we found " .$rows." rooms</p>";
echo "<p>you requested " .$days."  days to reserve</p>";



if($rows!=0) 
{
  ?>
  <ul>
  <?php
  $count=1; // comupteur ta3 star

  for ($j = 0 ; $j < $rows ; ++$j)
  { ////////////////////////////////////////////////////////
  $result->data_seek($j);
  $row = $result->fetch_array(MYSQLI_NUM);




              /* echo '<br>id: ' . $row[0] . '<br>';
               echo 'nbeds: ' . $row[1] . '<br>';
               echo 'floor: ' . $row[2] . '<br><br>';
               echo 'roomtype: ' . $row[3] . '<br><br>';
               echo 'price: ' . $row[4] . '<br><br>';*/
  ?>
      <?php // for price
          $price=$row[4];    
          $total=$price*$days;
         ?>  
    <li class="room-details">
      <div class="album-imagesz">
        <form action="payment.php" method="get">
          <button class="reserve" name="reserve" value="<?php echo $row[0] ?>" >reserve</button>
          <input type="hidden" name="roomID" value="<?php echo $row[0] ?>">
          <input type="hidden" name="dateTo" value="<?php echo $_POST['dateTo'] ?>">
          <input type="hidden" name="dateFrom" value="<?php echo $_POST['dateFrom'] ?>">
          <input type="hidden" name="total" value="<?php echo $total ?>">
          <h3 > Room : <?php echo "". $row[0] ?> </h3><hr>
        </form>    
      </div>
      <div class="album-info">     
        <p name="nbeds" > Beds : <?php echo "". $row[1] ?> </p>
        <p name="nfloor"> Floor: <?php echo "". $row[2] ?> </p>
        <p name="roomType"> Type : <?php echo "". $row[3] ?> </p>
        <p name="price"> price  :  <u class="price"><?php echo $row[4]?></u> DA per day</p>
         <?php // for price
          $price=$row[4];    
          $total=$price*$days;
         ?>  
        <hr><strong>Total : <u class="price"><?php echo $total?> DA</u> </strong>
      </div>
    </li>
  <?php
    if ($count==3  ) // narja3 f star
    {
      $count=1;
      ?></ul> <ul><?php
      }
    else {$count++;}

  }      /////////////    end for 
  }
  else //ida makanch room
    {
      header("location:book.php?Invalid= Sorry no rooms founds ");
    }
  }
 }
  else // ida makanch post
  {?>
   <h1 class="alert"> no request found</h1>
   <?php
  }

}
?>

</fieldset>
</div>




</div></div></div>



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
