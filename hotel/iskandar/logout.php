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
            <nav class="navbar">
                <img class="logo" src="pics/logo-iskandar.gif">
                <ul>
          <li><a class="active" href="index.php">Home</a></li>
          <li><a href="inscription.php">Sing Up</a></li>
          <li><a href="sing_in.php">Sing In</a></li>


             <?php 

                if(isset($_SESSION['user']))
                {
                    ?>
                     <li><a class="active" href=""><?php echo $_SESSION['user'] ?></a></li>                                
                    <?php
                }
           ?>


            <?php 
                if(isset($_SESSION['user']))
                {
                    ?>
                     <li><a  href="process_logout.php?logout">LOG Out</a></li>                                
                    <?php
                }
            ?>
          
         
                </ul>
            </nav>
	<div class="fixed-footer">
        <div class="container">Copyright &copy; iskander</div>        
    </div>

			<div class="center">

           <?php 

                if(isset($_GET['logout']))
                {
                    ?>
                  <h1>You logged out </h1>
                  <h2>Thank you</h2>                            
                    <?php
                }
                else
                {
                  ?>
                  <h1>OOOPS ther was an error </h1>
                  <h2>Thank you</h2>                            
                  <?php

                }
           ?>


            
         






      <script>
    function pageRedirect() {
        window.location.replace("index.php");
    }      
    setTimeout("pageRedirect()", 2500);
</script>
		
		</div>

</body>
</html>