<?php
    session_start();
    if(isset($_SESSION['user']))
    {
        echo ' WellCome ' .$_SESSION['user'].'<br/>';
        echo ' id = ' .$_SESSION['id'].'<br/>';
        echo ' your email is : ' .$_SESSION['email'].'<br/>';
        echo '<a href="process_logout.php?logout">Logout</a><br/>';
        echo '<a href="index.php"> home page</a><br/>';

            ?>
                <script>
                    function pageRedirect() {
                    window.location.replace("index.php");
                    }      
                    setTimeout("pageRedirect()", 1500);
                </script>
            <?php
    }
    else
    {
        header("location:index.php");
    }

?>