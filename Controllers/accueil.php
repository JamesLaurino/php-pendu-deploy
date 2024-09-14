<?php  include("Models/game.php");  ?>

<?php 

    $game = new Game();

    $tableAsciis = array();
    $toDisplay = array();

    /* SHOW ALPHABET */
    $tableAsciis = $game->displayAlphabet();

    /* USER FIRE FORMULAIRE */
    if(isset($_POST["letter"]))
    {
        $_SESSION["isMatch"] = false;

        /*  CHECK IF LETTER MATCH */
        $game->isMatch();

        /* SET IMAGE HANGED */
        if($_SESSION["isMatch"] == false)
        {
            $game->setImagePendu();
        }

        $_SESSION["char"][] = $_POST["letter"];

        /* DISPLAY DATAS */
        $toDisplay = $game->display();
        
        $result = "";
        $result = $game->displayData();

        /* CHECK FOR WINNING */
        $game->checkWin($toDisplay);

    }
    else 
    {
        $_SESSION["word"]= $game->getRandomWord();
        $game->startGame();
        $result = "";
    }

    include("Views/accueil.php");
?>