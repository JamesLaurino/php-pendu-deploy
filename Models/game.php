<?php
class Game 
{
    public function isMatch()
    {
        for ($i=0; $i < strlen($_SESSION["word"]); $i++) 
        { 
            if($_POST["letter"] == substr($_SESSION["word"],$i,1))
            {
                $_SESSION["isMatch"] = true;
                break;
            }
        }
    }

    public function displayData()
    {
      $result = "";

      for ($i = 0; $i < strlen($_SESSION["word"]); $i++) 
      {
        $letter = $_SESSION["word"][$i];
        
        if (in_array($letter, $_SESSION["char"])) {
            $result .= $letter . " ";
        } else {
            $result .= "_ "; 
        }
      }

      return $result;
    }

    public function getRandomWord()
    {
        $myfile = fopen("Models/dictionnary.txt", "r") or die("Unable to open file!");

        $counter = 0;
        $randomInRange = rand(0, 9);
        $word = "";
        while(!feof($myfile)) 
        {
            if($counter == $randomInRange)
            {
                $word = fgets($myfile);
                break;
            }
            else 
            {
                $counter++;
            }
            
        }
        fclose($myfile);

        return trim($word);
    }

    public function checkWin($toDisplay)
    {
        if($_SESSION["index"] == 6)
        {
            $_SESSION["isLose"] = true;
        }

        $tst = implode('',$toDisplay);

        if($tst == $_SESSION["word"])
        {
            $_SESSION["isWining"] = true;
        }
    }

    public function display()
    {
      $toDisplay = array();
      for ($i=0; $i < strlen($_SESSION["word"]); $i++) 
      { 
          for ($j=0; $j < count($_SESSION["char"]) ; $j++) 
          { 
              if($_SESSION["char"][$j] == substr($_SESSION["word"],$i,1))
              {
                  $toDisplay[] = $_SESSION["char"][$j];
              }
          }
      }
      return  $toDisplay;
    }

    public function startGame()
    {
        $_SESSION["isLose"] = false;
        $_SESSION["isWining"] = false;
        $_SESSION["index"] = 0;
        $_SESSION["pendu"] = "/Views/assets/0" . $_SESSION["index"] . "_pendu.png";
        $_SESSION["char"]= [];
    }

    public function setImagePendu()
    {
        $_SESSION["index"] = $_SESSION["index"] + 1;
        $_SESSION["pendu"] = "/Views/assets/0" . $_SESSION["index"] . "_pendu.png";
    }

    public function displayAlphabet()
    {
        $tableAsciis = array();

        for ($i=65; $i < 91 ; $i++) 
        { 
            $tableAsciis[] = $i;
        }

        return $tableAsciis;
    }
}

?>