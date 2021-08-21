<?php session_start();  ?>
<!DOCTYPE html>
<html lang="en">
<head>

/// heyyyy

        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">  
        <meta charset="UTF-8">
        <link rel="stylesheet" href="css/style.css">


        <title>inscription</title>
        <link rel="stylesheet" href="inscription.css">
</head>
<body>
    <div class="wrapper">
          
            
        <div class="center">

            
<fieldset >



    <form action="process_inscription.php" method="post">

                            <?php 
                        if(@$_GET['Empty']==true)
                        {
                    ?>
                        <p class="alert"><?php echo $_GET['Empty'] ?></p>                                
                    <?php
                        }
                    ?>


                    <?php 
                        if(@$_GET['Invalid']==true)
                        {
                    ?>
                        <p class="alert"><?php echo $_GET['Invalid'] ?></p>                                
                    <?php
                        }
                    ?>

    <label>Email : <input type="email" name="email" required="required" placeholder=" Email"></label><br>
    <label>First name : <input type="text" name="fname" placeholder=" Name" required="required"></label><br>
    <label>Password : <input type="password" name="password" placeholder=" Password" required="required"></label><br>
    
 
    
    
    <label for="hear-about">
    How did you hear about us?
    
    <select name="referrer" id="hear-about">
    <option value="google">Google</option>
    <option value="friend">Friend</option>
    <option value="advert">Advert</option>
    <option value="other">Other</option>
    </select> 
    </label><br>
    <button class="submit" name="Login">submit</button> 
</form>
 </fieldset>            
            
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