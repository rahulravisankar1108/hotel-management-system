<?php 
        
    if(isset($_POST['BookRoom']))
    {
        echo 'room page';
        header("location:bookroom.php");
    }

    elseif(isset($_POST['BookTable']))
    {
        echo 'table page';
        header("location:booktable.php");
    }
    else
    {
        echo 'NONE';
    }