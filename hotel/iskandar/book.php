<?php session_start(); ?>
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
<div>
 <form class="flex"  action="process_book.php" method="post" >
  <div class="block">

    <label>Date From : <input type="date" name="dateFrom" value=<?php echo "" . date("Y-m-d");?> required="required" value=<?php echo "" . date("Y-m-d"); ?> max="2023-08-26"  min=<?php echo "" . date("Y-m-d"); ?>    ></label><br>
    <label>Date To : <input type="date" name="dateTo" required="required" value=<?php echo "" . date("Y-m-d");?> max="2023-08-26"  min=<?php echo "" . date("Y-m-d"); ?> ></label><br>

  </div>   
  <div class="block">  
    <label for="beds">
      choose beds 
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
      choose floor 
      <select name="nfloor" >
          <option value="any">any</option>
          <option value="1">1</option>
          <option value="2">2</option>
          <option value="3">3</option>
          <option value="4">4</option>
      </select> 
    </label><br>
  </div>     
  <button class="submit" name="Login">submit</button> 
 </form>
</div>
</fieldset>
<div class="block">





  
<fieldset class="all_rooms">

<nav class="album">
  <ul>
    <form>
      <div>
        <?php 
            if(@$_GET['Empty']==true)
            {
             ?>
              <div class="alert"><p class="alert" ><?php echo $_GET['Empty'] ?></p></div>       
              <div class="alert"><p class="alert" >date_From must be less than date_To</p></div>
             <?php
            }
            ?>
            <?php 
            if(@$_GET['Invalid']==true)
            {
             ?>
              <div class="alert"><p class="alert" ><?php echo $_GET['Invalid'] ?></p></div>
             <?php
            }
        ?>
      </div>
    </form>                    
  </ul>
</nav>


</fieldset>
</div>
</div></div>






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