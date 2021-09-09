<?php $this->Html->css('style', ['block'=>true]);?>
<?php echo $this->Html->script('asocijacije', array('inline' => false)); ?>
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
    <title>Asocijacije</title>
</head>
<body id="ivonaPozadina">

    <div id="opis" class="container d-flex justify-content-center align-items-center ">
        <h2 id="podnaslov">Pravila</h2>
        <ul id="lista">
            <li><p>Svako od igrača jednog tima, koji se sastoji od dva igrača, imaće jedan minut da svojim saigračima objasni što je moguće više pojmova i tako će se igrači u jednom timu naizmenično menjati sve dok svi pojmovi u toj rundi ne budu pogođeni. Nakon svake runde, kapiteni prebrojavaju pogođene pojmove i bodovi se zapisuju. Pobednik će biti ona ekipa koja na kraju sve tri runde ima više poena.</p></li>
            <li><p> Papirići na kojima su napisani pojmovi će biti duplo presavijeni i igrač koji bude objašnjavao zadati pojam, mora sakriti ceduljicu u ruku tako da pojam usled svetlosti ne može da se ocrtava na drugu stranu. Pogođene pojmove će ekipa uvek čuvati kod kapitena tima.</p></li>
        </ul>
    </div>


    <div id="opis" class="container d-flex justify-content-center align-items-center ">
        <h2 id="podnaslov">Runde     </h2>
        <ul id="lista">
            <li><p><b>Prva runda: </b> pojmovi se objašnjavaju asocijacijama rečima. Možete upotrebiti neograničen broj reči za objašnjavanje, ali one ne smeju imati koren pojma koji se pogađa. Takođe, nije dozvoljena pantomima i davanje znakova gestikulacijom. </p></li>
            <li><p><b>Druga runda: </b> koristeći samo jednu reč dajete, po vašem mišljenju najbliži “hint” za pojam. Kada se reč izgovori nema menjanja! Takođe, nije dozvoljena pantomima.</p></li>
            <li><p><b>Treća runda: </b>pantomima – pokazivanje rukama, nogama, skakanjem, ali se pokretima ruku ne smeju crtati slova zadatog pojma.</p></li>
        </ul>
    </div>

    <div id="opis" class="container d-flex justify-content-center align-items-center ">
        <h2 id="podnaslov">App</h2>
        <ul id="lista">
            <li><p>Nakon unosa svakog tima, potrebno je pritisnuti dugme "Sačuvaj Tim". Klikom na dugme "Igraj" počinje partija.</p></li>
            <li><p>Tim koji je na redu započinje svoj potez tako što pritisne dugme, zatim je na displeju prikazano koliko im je vremena preostalo, a po isteku vremena ih buzzer obaveštava o kraju njihovog poteza, nakon čega je potrebno pritisnuti dugme "Sledeći tim".</p></li>
            <li><p>U toku poteza tim može u svakom trenutku pritisnuti dugme za pauzu, ukoliko ima nekih nedoumica. Ukoliko pogode reč igrači treba da pritisnu zeleno dugme, zatim će se poeni sabirati i na kraju poteza upisati u tabelu.</p></li>
            <li><p>Runda se završava kada se pogode svi pojmovi na papirićima, odnosno kada se zbir poena svih timova izjednači sa ukupnim brojem papirića. Kako bi započeli novu rundu, samo je potrebno pritisnuti dugme za početak poteza.</p></li>
            <li><p>Kada se završi III runda na displeju će se prikazati pobednički tim.</p></li>
        </ul>
    </div>

    <div id="unosTima" class="m-5 indexButton">
        <h5 id="podnaslovUnos"><b>Unesite tim</b></h5>
        <ul>
            <input type="text" id="tim" placeholder="Ime tima"></input>             <!--input timova-->
            <input type="text" id="igrac1" placeholder="Ime igrača 1"></input>
            <input type="text" id="igrac2" placeholder="Ime igrača 2"></input>
        </ul>
        <button id="sacuvajTimBtn" onclick="klikSacuvajTim()"> DODAJ TIM </button>   <!--Dugme za ubacivanje timova-->      
    </div>

    <div id="tabela" class="container-fluid padding">
        <div id="tabela" class="row welcome text-center">
            <div class="col-12">
                <table id="users-table" class="table">
                    <thead id="zaglavlje" class="thead-light" style="text-align: center">
                        <tr>
                        <th>Tim</th>
                        <th>Ime igrača 1</th>
                        <th>Ime igrača 2</th>
                        </tr>
                    </thead>
                    <tbody id="timovi_podaci">
                        
                        
                    </tbody> 
                </table> 
            </div>
        </div>
    </div>
      
    <div id="poljeIgraj"> 
        <div id="zapocniIgru" class="m-5 indexButton">
            <button id="igrajBtn" class="btn btn-danger btn-block" onclick="klikIgraj()"> <b>IGRAJ</b></button>
        </div>
    </div>
    <!--Modeli popup-ova-->
    <div class="bg-model" id = "bg-model">
        <div class="model-content-asocijacije">
            <div class="close">+</div>
            <h2 style="margin-top:30px;">Unesite broj reči koji smišlja svako od igrača</h2>
            <form id="papiri" action="">
                <input type="number" placeholder="5, 6, 7, itd." id="brojPapirica" min="5" max="20">
                <button id="unesiPapirice", class = "btn btn-danger btn-block" onclick="klikUnesiPapirice()">Sačuvaj broj papirića</button>
            </form>
        </div>
    </div>

    <div class="buttonBack">
        <a href="index.php" class="btn btn-danger "> POVRATAK NA POČETNU </a>
    </div>
    
</body>
</html>

<script>  

    document.addEventListener("readystatechange", (event) => {
    if(event.target.readyState ==="complete") {
        initApp();
    }});

    const initApp = () => {
        const pokreniIgruAsocijacija = document.querySelector(".close");
        pokreniIgruAsocijacija.addEventListener("click", (event) => {
        event.preventDefault();
        
        document.querySelector(".bg-model").style.display = "none";
       
         });
         refreshThePage();
    }
</script>
