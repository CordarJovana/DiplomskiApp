class ListaIgraca {
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

class TimItem {

    constructor() {
        this._imeTima = "";
        this._igrac1 = "";
        this._igrac2 = "";
        this._brojPoean = 0;
    }

    //geteri
    getTim() {
        return this._imeTima;
    }
    getIgrac1() {
        return this._igrac1;
    }

    getIgrac2() {
        return this._igrac2;
    }

    getPoeni() {
        return this._brojPoean;
    }

    //seteri
    setTim(imeTima) {
        this._imeTima = imeTima;
    }

    setIgrac1(igrac1) {
        this._igrac1 = igrac1;
    }

    setIgrac2(igrac2) {
        this._igrac2 = igrac2;
    }

    updatePoene(poeni) {
        this._brojPoean += poeni;
    }
}

var listaIgraca;
var daLiJeUcitano = true;
var brojPapirica = 0;
var listaKonacno;
var ukupniBodovi=0;
var pom=1;
var rundaBrojac=1;
var br;

document.addEventListener("readystatechange", (event) => {
    if(event.target.readyState ==="complete") {
        initApp();
    }});

    const initApp = () => {
        if(listaKonacno == null) {
           ucitajPodatkeSaLocalStorage(); }
       refreshThePage2();
    }

function refreshThePage2 () {
    cleareListDisplay2();
    renderList2();   
};

function cleareListDisplay2 (){
    //definisemo parenta
    const parentElement = document.getElementById("timovi_poeni");
    deleteContents(parentElement);
};

function renderList2 () {
    const list = listaKonacno.getList();
    list.forEach(item => {
        buildListItem2(item);
    });
   };

   function buildListItem2 (item) {
    const tr = document.createElement("tr");
    tr.className = "red";
    const td = document.createElement("td");
    td.className = "imeTima";
    const td2 = document.createElement("td");
    td2.className = "poeni";
    
    //dodaj im vrednosti elementa
    td.textContent = item.getTim();
    td2.textContent = item.getPoeni();

    tr.appendChild(td);
    tr.appendChild(td2);
    const container = document.getElementById("timovi_poeni");
    container.appendChild(tr);
};

function deleteContents (parentElement) {
    let child = parentElement.lastElementChild;
    while(child) {
        parentElement.removeChild(child);
        child = parentElement.lastElementChild;
    };};

    function ucitajPodatkeSaLocalStorage () {
        listaIgraca = JSON.parse(localStorage.getItem("listaIgraca"));
        listaKonacno = new ListaIgraca();
        for(let i = 0; i < listaIgraca._list.length; i++){
    
            let privremeni = new TimItem();
            privremeni.setTim(listaIgraca._list[i]._imeTima);
            privremeni.setIgrac1(listaIgraca._list[i]._igrac1);
            privremeni.setIgrac2(listaIgraca._list[i]._igrac2);
    
            listaKonacno.addItemToList(privremeni);
          
        }
        //provera da li je ucitao
    
        brojPapirica = JSON.parse(localStorage.getItem("brojPapirica"));
        brojPapirica = parseInt(brojPapirica);
        brojPapirica = 2 * brojPapirica * listaKonacno.getList().length;
        br=brojPapirica;
     
    };

function pocetak(id, id3){
        document.getElementById(id).disabled = true;
        pom=1;
        ukupniBodovi=0;
        potez(id3);
        document.getElementById(id3).disabled = false;
        
    };

 function potez(id) {
    poziv();
           if(ukupniBodovi<brojPapirica){
               if(pom==listaKonacno._list.length+1){
                   pom=1;
               }}
           else{
               if(rundaBrojac==3){
                   BubbleSort(listaKonacno.getList());
                   proglasiPobednika();
                   document.getElementById(id).disabled = true;
               }
               else{
               rundaBrojac=rundaBrojac+1;
               document.getElementById(id).disabled = true;
               document.getElementById('krajRunde'+rundaBrojac).disabled = false;
               } 
              } 

    };

   /* function wait(ms){
        var start = new Date().getTime();
        var end = start;
        while(end < start + ms) {
          end = new Date().getTime();
       }
     }*/

function poziv(){
            $.getJSON('http://127.0.0.1:5000/asocijacijerunda',
            function(data) {
                if(data.poruka == "OK"){
                var container=document.getElementById("tabela");
                var red=container.getElementsByTagName("tr")[pom];
                var poeni=0;
                poeni=parseInt(red.getElementsByTagName("td")[1].innerHTML);
                poeni=poeni+data.poeni;
                red.getElementsByTagName("td")[1].innerHTML=poeni;
                ukupniBodovi=ukupniBodovi+data.poeni;   
                pom=pom+1;
                }
            });   
    };



function BubbleSort (lista) {
        var itemMoved = false;
        do {
            itemMoved = false;
            for(let i = 0; i < lista.length - 1; i++){
                if(lista[i].getPoeni() < lista[i+1].getPoeni()){
                    var higherValue = lista[i+1];
                    lista[i+1] = lista[i];
                    lista[i] = higherValue;
                    itemMoved = true
                }
            }
        }while(itemMoved)
    
    };

function proglasiPobednika(){
        $.ajax({
            type: "POST",
            url: "http://127.0.0.1:5000/asocijacijepobednik",
            headers: {  'Access-Control-Allow-Origin': '*' },
            dataType: "json",
            contentType:"application/json",
            data: JSON.stringify({ data: listaKonacno.getList()[0].getTim() }),
            success: function (data) {
                console.log(data);
                if (data.poruka == "OK"){
                    
                    //window.location.replace("asocijacije.php");
                    console.log("OK");}
            },
            error: function (data) {
                alert("Greška kod prikazivanja pobednika!");
            }
        });

    };



