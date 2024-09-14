<?php 

    session_destroy(); 
    unset($_SESSION["char"]);
    unset($_SESSION["isLose"]);
    unset($_SESSION["index"]);
    unset($_SESSION["pendu"]);
    unset($_SESSION["index"]);

    include("Views/logout.php");
?>