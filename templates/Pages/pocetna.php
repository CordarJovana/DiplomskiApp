<?php $this->Html->css('style', ['block'=>true]);?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <title>Početna</title>
</head>
<body id="ivonaPozadina">

    <div id="mainDiv1" class="container d-flex justify-content-center align-items-center ">
        <div id="igrajAsocijacije" class="indexButton">
            <h2> Hoćete da igrate Asocijacije? </h2>
            <br>
            <a href="asocijacije.php" class="btn btn-danger btn-block"> IGRAJ </a>
        </div>
    </div>

    <div id="mainDiv1" class="container d-flex justify-content-center align-items-center ">
        <div id="igrajKoZnaZna" class="indexButton">
            <h2> Hoćete da igrate Ko zna zna? </h2> 
            <a href="users/login" class="btn btn-danger btn-block"> IGRAJ </a>
       </div>
    </div>

</body>
</html>