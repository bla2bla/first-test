<?php
session_start();  
require_once('connection.php');

    if(isset($_POST['Login']))
    {

       if(empty($_POST['email'])  || empty($_POST['password']) ||   empty($_POST['fname']))
       {
            header("location:inscription.php?Empty= Please Fill in the Blanks");
       }
       else
       {
          $query="select * from clients where email='".$_POST['email']."'";
           $result=mysqli_query($con,$query);


            if(mysqli_fetch_assoc($result))
            {
                header("location:inscription.php?Invalid= email is allready used ");
            }
            else
            {
              $query="INSERT INTO clients(email,password,fname) VALUES ('".$_POST['email']."','".$_POST['password']."','".$_POST['fname']."')";
              mysqli_query($con,$query);

          $query="select * from clients where email='".$_POST['email']."' and password='".$_POST['password']."'";
           $result=mysqli_query($con,$query);
           $result->data_seek(0);
            $row = $result->fetch_array(MYSQLI_NUM);
            $_SESSION['id']=$row[0];
            $_SESSION['email']=$row[1];
            $_SESSION['user']=$row[3];

              header("location:wellcome.php");

            }
       }
    }
    else
    {
        echo 'Not Working Now Guys';
    }

?>