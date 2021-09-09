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

document.addEventListener("readystatechange", (event) => {
    if(event.target.readyState ==="complete") {
        initApp();
    }});

    const initApp = () => {

    };

function ucitajPitanje(p,t,n,r){
    var pitanje=new Pitanje();
    pitanje.setPitanje(p);
    pitanje.setTacanOdgovor(t);
    pitanje.setNetacanOdgovor(n);
    document.getElementById("pitanjeTekst").innerHTML=pitanje.getPitanje();

    if(r==1){
        document.getElementById("odgovor1").innerHTML=pitanje.getTacanOdgovor();
        document.getElementById("odgovor2").innerHTML=pitanje.getNetacanOdgovor();
        /*var pom=false;

        while(!pom){
            $("odgovor1").click(function(){
                pom=true;
                var poeni=parseInt(document.getElementById("odgovor1").innerHTML)+1;
                document.getElementById("odgovor1").innerHTML=poeni;
             });
             $("odgovor2").click(function(){
                pom=true;
             });

        }*/

    }
    else{
        document.getElementById("odgovor2").innerHTML=pitanje.getTacanOdgovor();
        document.getElementById("odgovor1").innerHTML=pitanje.getNetacanOdgovor();
        /*var pom=false;

        while(!pom){
            $("odgovor2").click(function(){
                pom=true;
                var poeni=parseInt(document.getElementById("odgovor1").innerHTML)+1;
                document.getElementById("odgovor1").innerHTML=poeni;
             });
             $("odgovor1").click(function(){
                pom=true;
             });
            
        }*/
    }
    postaviPitanje(r, "poeniIspis");
}























<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script> 

    function prikaziPoene(id) {

    var poeni=document.getElementById("poeniIspis").innerText;
            
    $.ajax({
        type: "POST",
        url: "https://172.20.222.164:5000/proglasiPobednika",
        headers: {  'Access-Control-Allow-Origin': '*' },
        dataType: "json",
        contentType:"application/json",
        data: JSON.stringify({ data: poeni}),
        success: function (data) {
            console.log(data);
            if (data.poruka == "OK"){
                alert("Sve je u redu!");} 
        },
        error: function (data) {
            alert("Greška!");
        }
    });
    
}

function postaviPitanje(podaci, id) {

    $.ajax({
        type: "POST",
        url: "https://172.20.222.164:5000/proglasiPobednika",
        headers: {  'Access-Control-Allow-Origin': '*' },
        dataType: "json",
        contentType:"application/json",
        data: JSON.stringify({ data: podaci}),
        success: function (data) {
            console.log(data);
            if (data.poruka == "OK") alert("Sve je u redu!");
            var poeni=parseInt(document.getElementById(id).innerText);
            poeni=poeni+parseInt(data.rez);
            document.getElementById("poeniIspis").innerText=poeni;
        },
        error: function (data) {
            alert("Greška!");
        }
    });
    
}

function sledece(){
    var pom=0;

    while(pom==0){
        $('odgovor1').on('click', function(e) {
           pom=1;
           document.getElementById("poeniIspis").innerText="wefoweio";
        });
        $('odgovor2').on('click', function(e) {
            document.getElementById("poeniIspis").innerText="wefoewcvwe;vm;weweio";
         });
    }
}

function klik(){
    document.getElementById("poeniIspis").innerText="wefoweio";
}

$( document ).ready(function() {
    $('odgovor2').on('click', function(e) {
        document.getElementById("poeniIspis").innerText="2";
     });
     $('odgovor1').on('click', function(e) {
        document.getElementById("poeniIspis").innerText="1";
     });
});




   