<?php session_start();  ?>
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
  
  <div class="wrapper">




      <div class="center">


       <?php 
                if(!empty($_SESSION['user']))
                {
                    ?>
                    <h1><?php echo "Hello " . strtoupper("".$_SESSION['id']) ?></h1>

                    <h1><?php echo "Hello " . strtoupper("".$_SESSION['user']) ?></h1>
          <h2>Your Hotel</h2>

          <div class="buttons">
          <a id="book_button" href="book.php"><button>Book NOW</button></a>
          <a id="book_button" href="MyRooms.php"><button>My Romms</button></a>
          
        </div>

                    <?php
                }
                else
                {
                  /*?>*/

echo <<<EOL
  <h1>La Casa Rosa</h1>
  <h2>Your Hotel</h2> 
    <div class="buttons">
      <a href="sing_in.php"><button>LOG IN</button></a>
      <a href="inscription.php"> <button class="btn2">Sing UP </button></a>
    </div> 
EOL;


                                                  
                   /* <?php*/
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
                if(!empty($_SESSION['user']))
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
      <p>Copyright &copy; 0667819793/0796590615</p>
    </div>  
</footer>

</html>