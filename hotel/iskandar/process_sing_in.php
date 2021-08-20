<?php session_start();
require_once('connection.php');

    if(isset($_POST['Login']))
    {

       if(empty($_POST['email']) || empty($_POST['password']))
       {
            header("location:sing_in.php?Empty= Please Fill in the Blanks");
       }
       else
       {
          $query="select * from clients where email='".$_POST['email']."' and password='".$_POST['password']."'";
           $result=mysqli_query($con,$query);


            if(mysqli_fetch_assoc($result))
            {







              $result->data_seek(0);
              $row = $result->fetch_array(MYSQLI_NUM);
              $_SESSION['id']=$row[0];
              $_SESSION['email']=$row[1];
               $_SESSION['user']=$row[3];


                header("location:wellcome.php");

            }
            else
            {
                header("location:sing_in.php?Invalid= Please Enter Correct User Name and Password ");
            }
       }
    }
    else
    {
        echo 'Not Working Now Guys';
    }

?>