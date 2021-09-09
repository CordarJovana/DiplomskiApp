<?php $this->Html->css('style', ['block'=>true]);?>
<?php echo $this->Html->script('igraAsocijacije', array('inline' => false)); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" 
    integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <script src="//code.jquery.com/jquery-3.6.0.js"></script>
    <title>Igra Asocijacije</title>
</head>
<body id="ivonaPozadina">

    <div id="tabela" class="container-fluid padding">
        <div id="tabela" class="row welcome text-center">
            <div class="col-12">
                <table id="users-table" class="table">
                    <thead id="zaglavlje" class="thead-light">
                    <tr>
                    <th scope="col-4">Tim</th>
                    <th scope="col-4">Poeni</th>
                    </tr>
                    </thead>
                    <tbody id="timovi_poeni">

                    </tbody>
                </table>
            </div>
        </div>
     </div>

     <div id="dugmici"> 
        <button id="krajRunde1"  onclick="pocetak('krajRunde1', 'sledeciTim')">Započni rundu I</button>
        <button id="krajRunde2" onclick="pocetak('krajRunde2','sledeciTim')" disabled=true>Započni rundu II</button>
        <button id="krajRunde3" onclick="pocetak('krajRunde3','sledeciTim')" disabled=true>Započni rundu III</button>
     </div>

        <button id="sledeciTim" class="btn btn-danger btn-block" onclick="potez('sledeciTim')" disabled=true> Sledeći Tim </button>
        
    </div>
    <div class="buttonBack">
        <a href="asocijacije.php" class="btn btn-danger "> <- NAZAD </a>
    </div>
    
</body>
</html>
