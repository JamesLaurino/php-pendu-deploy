<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
    <title>Accueil</title>
</head>
<body class="bg-light">
    
    <?php include("template/header.php"); ?>
    <?php include("template/navbar.php"); ?>

    <div class="d-flex justify-content-center mt-5">
        <div>
            <img class="rounded" src=<?php print($_SESSION["pendu"]); ?> alt="">
        </div>
    </div>

    <div class="d-flex justify-content-center mt-5">
        <?php 
            print($result);
        ?>
    </div>
    
    <div class="d-flex justify-content-center mt-5">
        <div>
            <?php foreach($tableAsciis as $data): ?>
                <span class="m-1">
                    <p class="btn btn-primary" id="btnLetter" name="lettre">
                        <?php print(chr($data)); ?>
                    </p>
                </span>
            <?php endforeach; ?>
        </div>
    </div>

    <div class="d-flex justify-content-center mt-5">
        <p class="mr-2 h4 text-warning">Alreay use : </p>
        <?php foreach($_SESSION["char"] as $datas): ?>
            <p class="mr-2 h4 text-dark"><?php print($datas);?> </p> 
        <?php endforeach; ?>
    </div>

    <?php if($_SESSION["isLose"] == false && $_SESSION["isWining"] ==false): ?>
        <form class="d-flex justify-content-center mt-4" action=<?php print(ROOT_PATH . "accueil"); ?> method="post">
            <div><input id="letter" name="letter" class="w-75"></div>
            <div> <button type="submit" class="btn btn-success">Valider</button> </div>                  
        </form>
    <?php endif; ?>

    <?php if($_SESSION["isLose"]): ?>
        <div class=" d-flex justify-content-center">
            <div class="h1 text-danger">You lose !</div>
        </div>
        <div class=" d-flex justify-content-center">
            <div class="h3">The word is <?php print($_SESSION["word"]); ?></div>
        </div>
    <?php endif; ?>

    <?php if($_SESSION["isWining"]): ?>
        <div class=" d-flex justify-content-center">
            <div class="h1 text-success">YOU WON !</div>
        </div>
        <div class=" d-flex justify-content-center">
            <div class="h3">The word is <?php print($_SESSION["word"]); ?></div>
        </div>
    <?php endif; ?>


    <?php include("template/footer.php"); ?>
    
<script type="text/javascript">
    
    let btnLetters = document.getElementsByClassName("btn-primary");
    let letter = document.getElementById("letter");

    for (const item of btnLetters) {
        item.addEventListener("click", item => {
            letter.value = item.target.innerText;
            item.preventDefault();
        })
    }
    
</script>

<script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.min.js" integrity="sha384-+sLIOodYLS7CIrQpBjl+C7nPvqq+FbNUBDunl/OZv93DB7Ln/533i8e/mZXLi/P+" crossorigin="anonymous"></script>
</body>
</html>