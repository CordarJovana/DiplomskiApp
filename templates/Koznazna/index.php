<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Koznazna[]|\Cake\Collection\CollectionInterface $koznazna
 */


    
?>
<div class="koznazna index content">
<?php $this->Html->css('style', ['block'=>true]);?>
<!--<?php $this->Html->script('koznazna', array('inline' => false)); ?>-->
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
    <title>Igra Ko zna zna</title>
</head>
<body id="ivonaPozadina">
<div id="poljePoeni">
    <div id="ostvareniPoeni"> 
        <label >Poeni:</label>
<!--<label id='poeniIspis'>0</label>-->
        <?php        
                    
                    echo "<label id='poeniIspis'>".$_SESSION["poeni"]."</label>";
                ?>
        </label> 
     </div>
    </div>

    <div id="igra"> 
        <div id="pitanje">
            <label id="pitanjeTekst"></label>
        </div>
        </div>

        <div id="odgovori">
            <label id="odgovor1"></label>
            <label id="odgovor2"></label>
        </div>
   
    <div class="buttonBack">
        <button id="sledecePit" class="btn btn-danger " onclick="postaviPitanje(odgovori)"> Sledeće pitanje </button>
    </div>
<?php
/*if(isset($_POST["dodaj"])){
    

       $poeni=$_POST["data"];
            posalji();
        
    }
    
    function posalji(){
        $response=array();
            $response["poruka"]="ok";
        echo json_encode($response);
    }
    $poeni = $_POST['poeni'];
    echo($poeni);*/
    ?>
        <?= $this->Form->postLink(
                __('Kraj'),
                ['action' => 'kraj', $_SESSION["poeni"]], array('class' => 'btn btn-danger', 'id'=> 'kraj')); ?>
</div>
</body>
</html>

<script>

class ListaPitanja {
    constructor() {
        this._list = [];
    }
    getList() {
        return this._list;
    }

    clearList(){
        this._list = [];
    }

    addItemToList(itemObj) {
        this._list.push(itemObj);
    }

    removeItemFromList(id) {
        const list = this._list;
        for(let i = 0; i < list.length; i++){
            if(list[i]._id == id) {
                list.splice(i,1);
                break;
            }
        }
    }

}

class Pitanje {

    constructor() {
        this._pitanje = "";
        this._tacanOdgovor = "";
        this._netacanOdgovor = "";
    }

    //geteri
    getPitanje() {
        return this._pitanje;
    }
    getTacanOdgovor() {
        return this._tacanOdgovor;
    }

    getNetacanOdgovor() {
        return this._netacanOdgovor;
    }
    //seteri
    setPitanje(pitanje) {
        this._pitanje = pitanje;
    }

    setTacanOdgovor(tacanOdgovor) {
        this._tacanOdgovor = tacanOdgovor;
    }

    setNetacanOdgovor(netacanOdgovor) {
        this._netacanOdgovor = netacanOdgovor;
    }

}

var listaPitanja=new ListaPitanja();
var pozicija=0;

document.addEventListener("readystatechange", (event) => {
    if(event.target.readyState ==="complete") {
        initApp();
        pozicija=0;
        postaviPitanje(odgovori);
        const itemEntryForm = document.getElementById("sacuvajTimBtn");
        

}});

const initApp = () => {
        <?php foreach ($pitanja as $pitanje) :?>
            
            var pitanje=new Pitanje();
            pitanje.setPitanje(<?php echo json_encode($pitanje->pitanje); ?>);
            pitanje.setTacanOdgovor('<?php echo json_encode($pitanje->tacanodgovor); ?>');
            pitanje.setNetacanOdgovor('<?php echo json_encode($pitanje->netacanodgovor); ?>');
            listaPitanja.addItemToList(pitanje);
    <?php endforeach; ?>
    };



function postaviPitanje(callback_odg){
    console.log(<?=
                $_SESSION["poeni"];
                ?>);
        var r='<?= rand(1,2); ?>';
        document.getElementById("pitanjeTekst").innerText=listaPitanja._list[pozicija]._pitanje;
        if(r==1){
            document.getElementById("odgovor1").innerText=listaPitanja._list[pozicija]._tacanOdgovor;
            document.getElementById("odgovor2").innerText=listaPitanja._list[pozicija]._netacanOdgovor;}
        else{
            document.getElementById("odgovor2").innerText=listaPitanja._list[pozicija]._tacanOdgovor;
            document.getElementById("odgovor1").innerText=listaPitanja._list[pozicija]._netacanOdgovor; 
            }

            callback_odg(r);
            pozicija=pozicija+1;

        if(pozicija===9){
            prikaziRang();
            document.getElementById("sledecePit").disabled=true;
        }

}

function odgovori(poz){
    
        $.ajax({
            type: "POST",
            url: "http://127.0.0.1:5000/koznaznapitanje",
            headers: {  'Access-Control-Allow-Origin': '*' },
            dataType: "json",
            contentType:"application/json",
            data: JSON.stringify({ data: poz }),
            success: function (data) {
                if (data.poruka == "OK"){
                    /*var t=parseInt(document.getElementById("poeniIspis").innerText);
                    t=t+1;
                    document.getElementById("poeniIspis").innerText=t;
                console.log(t);*/
                <?php 
                
                $_SESSION["poeni"]=$_SESSION["poeni"]+3; 
                
                ?>;
                console.log(<?php
                echo $_SESSION["poeni"];
                ?>);
               document.getElementById("poeniIspis").innerText=<?= $_SESSION["poeni"] ?>
            }
              
            },
            error: function (data) {
                alert("Greška kod odgovora!");
            }
        });
    }

    function prikaziRang(){
        var z=document.getElementById("poeniIspis").innerText;
        $.ajax({
            type: "POST",
            url: "http://127.0.0.1:5000/koznaznapobednik",
            headers: {  'Access-Control-Allow-Origin': '*' },
            dataType: "json",
            contentType:"application/json",
            data: JSON.stringify({ data: z }),
            success: function (data) {
                if (data.poruka == "OK"){
                    console.log("OK");}
            },
            error: function (data) {
                alert("Greška kod prikazivanja poena!");
            }
        });
    }

/*function postavi(){
    var poeni=parseInt(document.getElementById("poeniIspis").innerText);
    /*$.post("index.php", {
                        metoda: "dodaj",
                        headers: {  'Access-Control-Allow-Origin': '*' },
                        poeni: poeni
                    }, function (data) {
                        alert(data);
    
                    });
                    $.ajax({
  url: "http://localhost:8888/myappdugme/koznazna/index.php",
  method: "POST",
  data: { "poeni": poeni}
});
document.cookie=poeni;

}*/

</script>
