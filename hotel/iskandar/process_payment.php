<?php session_start();
require_once('connection.php');

if(isset($_POST['check']) || isset($_POST['name'])  || isset($_POST['card_number'])  || isset($_POST['zip']))
    {
    if(empty($_POST['name'])  || empty($_POST['card_number']) ||   empty($_POST['zip']))
    {
      header("location:book.php?Invalid= Please Fill in the Blanks");
     }
     else // ida kaynin
     {
      $query=$_POST['query'];

      $name=$_POST['name'];
      $card_number=$_POST['card_number'];
      $zip=$_POST['zip'];
      $card_type=$_POST['card_type'];

      if(strlen($zip)==4 AND strlen($card_number)==9 AND strlen($name)>=4 )
      { // ida s7a7

        $clientID=$_POST['clientID'];
        $roomID=$_POST['roomID'];
        $dateTo=$_POST['dateTo'];
        $dateFrom=$_POST['dateFrom'];
        $total=$_POST['total'];

        
        $query=" INSERT INTO books(clientID,roomID,dateFrom,dateTo) VALUES ('".$clientID."','".$roomID."','".$dateFrom."','".$dateTo."')";

        try {
          mysqli_query($con,$query);
          
          $query2="SELECT * FROM books WHERE clientID='".$clientID."' and roomID='".$roomID."' and dateFrom='".$dateFrom."' and dateTo ='".$dateTo."'";


          $result = $con->query($query2);
          if (!$result) die($con->error);
          $rows = $result->num_rows;
            $result->data_seek(0);
            $row = $result->fetch_array(MYSQLI_NUM);
            $bookID=$row[0];
            
        $query3="INSERT INTO payment(bookID,name,card_number,zip,card_type,total) VALUES ('".$bookID."','".$name."','".$card_number."','".$zip."','".$card_type."','".$total."');";
          
          $result = $con->query($query3);
          if (!$result) die($con->error);     
          
        header("location:Myrooms.php");

          } catch (Exception $e) {
            echo $e;
          }
      }
      else // ida lma3lomat ghaltin
      {
      header("location:book.php?Invalid= Wrong informations please repeat");
      }    
    }
    }
    else
    header("location:book.php?Invalid= Please Fill in the Blanks");
?>