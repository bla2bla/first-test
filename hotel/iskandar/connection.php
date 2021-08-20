<?php

    $con=mysqli_connect('localhost','root','','hotel');

    if(!$con)
    {
        die(' Please Check Your Connection'.mysqli_error($con));
    }
?>