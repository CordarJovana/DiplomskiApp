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


var listaIgraca=new ListaIgraca();
var brojPapirica = 0;
var daLiJeUcitano = true;
var listaKonacno; 
var konacanBrojPapirica;


//REFRESH
function refreshThePage () {
    cleareListDisplay();
    renderList();
    clearItemEntryField();
};

function refreshThePage2 () {
    cleareListDisplay2();
    renderList2();   
};

function cleareListDisplay (){
    //definisemo parenta
    const parentElement = document.getElementById("timovi_podaci");
    deleteContents(parentElement);
};

function cleareListDisplay2 (){
    //definisemo parenta
    const parentElement = document.getElementById("timovi_poeni");
    deleteContents(parentElement);
};

function deleteContents (parentElement) {
    let child = parentElement.lastElementChild;
    while(child) {
        parentElement.removeChild(child);
        child = parentElement.lastElementChild;
    }

};

//render
function renderList () {
 const list = listaIgraca.getList();
 list.forEach(item => {
     buildListItem(item);
 });
};

function renderList2 () {
    const list = listaIgraca.getList();
    list.forEach(item => {
        buildListItem2(item);
    });
   };

function buildListItem (item) {
    const th = document.createElement("tr");
    th.className = "red";
    const td = document.createElement("td");
    td.className = "imeTima";
    const td2 = document.createElement("td");
    td2.className = "igrac1";
    const td3 = document.createElement("td");
    td3.className = "igrac2";
    //dodaj im vrednosti elementa
    td.textContent = item.getTim();
    td2.textContent = item.getIgrac1();
    td3.textContent = item.getIgrac2();

    th.appendChild(td);
    th.appendChild(td2);
    th.appendChild(td3);
    const container = document.getElementById("timovi_podaci");
    container.appendChild(th);
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
//clearItemEntry

function clearItemEntryField () {
    document.getElementById("tim").value = "";
    document.getElementById("igrac1").value = "";
    document.getElementById("igrac2").value = "";};


function klikSacuvajTim(){
    event.preventDefault();
    processSubmission();
};

function processSubmission () {
    const newEntryTextTim = getnewEntryTim();
    const newEntryTextIgrac1 = getnewEntryIgrac1();
    const newEntryTextIgrac2 = getnewEntryIgrac2();

    if(!newEntryTextTim.length || !newEntryTextIgrac1.length || !newEntryTextIgrac2.length){
        alert("Morate uneti sve podatke!");
        return;
    }
    
    if(newEntryTextIgrac1==newEntryTextIgrac2){
        alert("Igrači jednog tima ne mogu imati isto ime!");
        return;
    }

    if(newEntryTextIgrac1==newEntryTextTim || newEntryTextIgrac2==newEntryTextTim){
        alert("Igrači jednog tima ne mogu imati isto ime kao tim!");
        return;
    }

    for(let i=0; i<listaIgraca._list.length; i++){
        if(newEntryTextTim==listaIgraca._list[i].getTim()){
            alert("Timovi ne mogu imati ista imena!");
            return;
        }
    }

    //napravi tim
    const toDoItem  = createNewTim(newEntryTextTim, newEntryTextIgrac1, newEntryTextIgrac2);
    listaIgraca.addItemToList(toDoItem);
    //apdejtuj podatke
    refreshThePage();
};

function getnewEntryTim () {
    return document.getElementById("tim").value.trim();
};
function getnewEntryIgrac1 () {
    return document.getElementById("igrac1").value.trim();
};
function getnewEntryIgrac2 () {
    return document.getElementById("igrac2").value.trim();
};

function createNewTim (tim,igrac1,igrac2) {

    const newTim  = new TimItem();
    newTim.setTim(tim);
    newTim.setIgrac1(igrac1);
    newTim.setIgrac2(igrac2);
    

    return newTim;

};

function klikIgraj(){
    event.preventDefault();
        startGame();
};

function startGame () {
    if(listaIgraca.getList().length < 2){ alert("Morate uneti bar 2 tima!");
    return;}
    localStorage.setItem('listaIgraca', JSON.stringify(listaIgraca));
    otvoriProzorceZaPapirice();
    
};


function otvoriProzorceZaPapirice () {
     document.querySelector('.bg-model').style.display = "flex";
     document.getElementById("bg-model").scrollIntoView({behavior: "smooth"});
    
};

function klikUnesiPapirice(){
    event.preventDefault();        
    brojPapirica = document.getElementById("brojPapirica").value;

    if(brojPapirica==""){
        alert("Polje ne može ostati prazno!");
        document.getElementById("brojPapirica").value="";
        return; 
    }
    if(isNaN(brojPapirica)){
        alert("Morate uneti broj!");
        document.getElementById("brojPapirica").value="";
        return;
    }
    if(brojPapirica<5){
        alert("Najmanji broj papirića koji možete da unesete je 5!");
        document.getElementById("brojPapirica").value="";
        return;
    }
    //sacuvaj broj papirica
    localStorage.setItem("brojPapirica", JSON.stringify(brojPapirica));
    window.location.replace("igraasocijacije.php");
};

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
    console.log(brojPapirica);
   // window.localStorage.removeItem("listaIgraca");
 
};