<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\User[]|\Cake\Collection\CollectionInterface $users
 */
if(isset($_SESSION["poeni"])){
    $_SESSION["poeni"] = 0;
}
?>
<?php $this->Html->css('style', ['block'=>true]);?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" 
    integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <title>Pravila</title>
</head>
<body id="ivonaPozadina">

<div id="nav">
        
        <label id="nav1"><?= h($ident->username) ?></label>
        <label id="nav2"><?= $this->Number->format($ident->tokeni) ?></label>
        <a id="nav3"><b><?= $this->Html->link(__('Logout'), ['action' => 'logout']) ?></a>
    
</div>

<div id="opis" class="container d-flex justify-content-center align-items-center ">
    <h2 id="podnaslov">Pravila</h2>
    <ul id="lista">
        <li><p>Igra se sastoji od 10 pitanja za svako su ponuđena dva odgovora, a vi imate 15 sekundi da odlučite koji odgovor je tačan.</p></li>
        <li><p>Započinjanjem igre, oduzeće se 1 od tokena koji imate, a nakon 24h dobićete novih 5 tokena za igru!</p></li>
        <li><p>Svaki tačan odgovor će se bodovati sa 3 poena, a netačan sa -1.</p></li>
    </ul>
</div>

<div id="opis" class="container d-flex justify-content-center align-items-center ">
    <h2 id="podnaslov">App</h2>
    <ul id="lista">
        <li><p>Pritisnite dugme "Igraj" kada ste spremni za početak, a dugme "Sledeće pitanje" kada budete spremni da odgovorite na sledeće pitanje.</p></li>
        <li><p>Sve što treba da uradite je da kliknete dugme "A" ili "B" u zavisnosti od toga šta je tačan odgovor, a buzzer će vas obavestiti da li ste bili u pravu.</p></li>
        <li><p>Na display-u će pisati koliko vam je vremena preostalo da date odgovor, a ukoliko vreme istekne, a vi niste odgovorili vaši poeni se neće promeniti.</p></li>
        <li><p>Posle svakog odgovora, broj poena će se ažurirati, a na kraju same igre će vaši poeni biti ispisani na display-u.</p></li>
    </ul>
</div>
<div class="users index content">
    <h3><?= __('Rang lista') ?></h3>
    <div class="table-responsive">
        <table>
            <thead id="zaglavlje" class="thead-light" style="text-align: center">
                <tr>
                    <th>Username</th>
                    <th>Poeni</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($users as $user): ?>
                <tr>
                    <td><?= h($user->username) ?></td>
                    <td><?= $this->Number->format($user->poeni) ?></td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>
<div id="poljeIgraj"> 
        <div id="zapocniIgru" class="m-5 indexButton">
            <button id="igrajBtn" class="btn btn-danger btn-block" onclick="location.href='koznazna/index'"> <b>IGRAJ</b></button>
        </div>
    </div>

    <div class="buttonBack">
        <a href="index.php" class="btn btn-danger "> POVRATAK NA POČETNU </a>
    </div>
                </body>
                </html>