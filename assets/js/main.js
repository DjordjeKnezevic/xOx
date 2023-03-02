// const BASEURL = "http://localhost:8080"
const BASEURL = "../../";

let tabla = document.querySelector("#tabla");
let tablaLeft;
let tablaTop;
let odgovor;
let igraVecZapoceta;
// let nizX;
// let nizO;

window.addEventListener('resize', function() {
    tablaLeft = tabla.offsetLeft;
    tablaTop = tabla.offsetTop;
    ajaxCall("proveraUnosaZnaka.php", "post", {tablaLeft, tablaTop});
})
window.onload = function () {
    tablaLeft = tabla.offsetLeft;
    tablaTop = tabla.offsetTop;
    ajaxCall("proveraUnosaZnaka.php", "post", {tablaLeft, tablaTop});
    zapocniIgru();
}

document.querySelector('#arr-clear').addEventListener('click', function() {
    ajaxCall("brisi.php", "post");
    ajaxCall("zapocniIgru.php", "post");
    zapocniIgru();
});

function ispisZnakova() {
    
}

async function zapocniIgru() {
    igraVecZapoceta = await ajaxCall("zapocniIgru.php", "get");
    if(igraVecZapoceta) igraVecZapoceta = JSON.parse(igraVecZapoceta)
    console.log(igraVecZapoceta.nizX)

    let polja = document.querySelectorAll(".polje");
    polja.forEach(function(polje) {
        if(igraVecZapoceta) {
            let nizIspisX = [];
            let nizIspisO = [];
            for(let niz of igraVecZapoceta.nizX) {
                let idPrvi;
                let idDrugi;
                let tId;
                switch(niz[0]) {
                    case "0":
                        idPrvi = "a";
                        break;
                    case "1":
                        idPrvi = "b";
                        break;
                    case "2":
                        idPrvi = "c";
                        break;
                }
                switch(niz[1]) {
                    case "0":
                        idDrugi = "1";
                        break;
                    case "1":
                        idDrugi = "2";
                        break;
                    case "2":
                        idDrugi = "3";
                        break;
                }
                tId = idPrvi + idDrugi;
                nizIspisX.push(tId);
            }
        } else {
        polje.innerHTML = "";
        polje.classList.remove("hov");
        polje.classList.add("hov");
        }

        polje.addEventListener("click", function pisiZnak() {
            proveraUnosaZnaka(this);
            this.removeEventListener("click", pisiZnak);
        })
    })
}

async function proveraUnosaZnaka(obj) {
    let hOffset;
    let vOffset;
    let objLeft = obj.offsetLeft;
    let objTop = obj.offsetTop;
    let objWidth = obj.clientWidth;
    let objHeight = obj.clientHeight;
    let fixH = 0;
    let fixV = 0;
    switch(obj.id) {
        case "a1":
            hOffset = 0;
            vOffset = 0;
            break;
        case "a2":
            hOffset = 1;
            vOffset = 0;
            fixH = 6;
            break;
        case "a3":
            hOffset = 2;
            vOffset = 0;
            fixH = 12;
            break;    
        case "b1":
            hOffset = 0;
            vOffset = 1;
            fixV = 6;
            break;
        case "b2":
            hOffset = 1;
            vOffset = 1;
            fixH = 6;
            fixV = 6;
            break;
        case "b3":
            hOffset = 2;
            vOffset = 1;
            fixH = 12;
            fixV = 6;
            break;
        case "c1":
            hOffset = 0;
            vOffset = 2;
            fixV = 12;
            break;
        case "c2":
            hOffset = 1;
            vOffset = 2;
            fixH = 6;
            fixV = 12;
            break;
        case "c3":
            hOffset = 2;
            vOffset = 2;
            fixH = 12;
            fixV = 12;
            break;
        default:
            hOffset = "Rick";
            vOffset = "Astley";
    }
    let zaSlanje = { hOffset, vOffset, objLeft, objTop, objWidth, objHeight, fixH, fixV};
    // console.log(zaSlanje);
    odgovor = await ajaxCall("proveraUnosaZnaka.php", "post", zaSlanje);
    if(odgovor == "Astley") $(location).attr('href', window.location.href);
    // console.log(odgovor);

    obj.innerHTML = odgovor;
    obj.classList.remove("hov");
    // proveraKraja();
}
fkuXS6rQdvCiz2n
function ajaxCall(fajl, metod, data = null) {
    return $.ajax({
        url: BASEURL + fajl,
        method: metod,
        data: data,
        dataType: "text",
        success: function(rezultat) { return rezultat.responseText },
        error: function (jqXHR, exception) {
            // console.log(jqXHR);
            var msg = '';
            if (jqXHR.status === 0) {
                msg = 'Not connect.\n Verify Network.';
            } else if (jqXHR.status == 404) {
                msg = 'Requested page not found. [404]';
            } else if (jqXHR.status == 500) {
                msg = 'Internal Server Error [500].';
            } else if (exception === 'parsererror') {
                msg = 'Requested JSON parse failed.';
            } else if (exception === 'timeout') {
                msg = 'Time out error.';
            } else if (exception === 'abort') {
                msg = 'Ajax request aborted.';
            } else {
                msg = 'Uncaught Error.\n' + jqXHR.responseText;
            }
        }
    })
}
