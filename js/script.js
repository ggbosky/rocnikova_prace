/* ============================= */
/* MUZEUM – script.js             */
/* ============================= */


/* ---------- NAVBAR – scroll efekt ---------- */
window.onscroll = function () {
    var navbar = document.getElementById("hlavniNavbar");
    if (window.scrollY > 60) {
        navbar.style.boxShadow = "0 4px 20px rgba(0,0,0,0.18)";
        navbar.style.background = "rgba(255,255,255,0.97)";
    } else {
        navbar.style.boxShadow = "0 4px 12px rgba(0,0,0,0.08)";
        navbar.style.background = "#fff";
    }
};


/* ---------- COUNTDOWN ---------- */
var datumVystavy = new Date();
datumVystavy.setDate(datumVystavy.getDate() + 30);
datumVystavy.setHours(10, 0, 0, 0);

function aktualizujCountdown() {
    var ted    = new Date();
    var rozdil = datumVystavy - ted;

    if (rozdil <= 0) {
        document.getElementById("countdown").innerHTML = "<span class='countdown-live'>Výstava právě probíhá!</span>";
        return;
    }

    var dny     = Math.floor(rozdil / (1000 * 60 * 60 * 24));
    var hodiny  = Math.floor((rozdil % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
    var minuty  = Math.floor((rozdil % (1000 * 60 * 60)) / (1000 * 60));
    var sekundy = Math.floor((rozdil % (1000 * 60)) / 1000);

    if (dny < 10)     dny     = "0" + dny;
    if (hodiny < 10)  hodiny  = "0" + hodiny;
    if (minuty < 10)  minuty  = "0" + minuty;
    if (sekundy < 10) sekundy = "0" + sekundy;

    document.getElementById("cd-days").innerHTML    = dny;
    document.getElementById("cd-hours").innerHTML   = hodiny;
    document.getElementById("cd-minutes").innerHTML = minuty;
    document.getElementById("cd-seconds").innerHTML = sekundy;
}

aktualizujCountdown();
setInterval(aktualizujCountdown, 1000);


/* ---------- EXPOZICE – data přímo v JS (náhrada za CSV/fetch) ---------- */
/*
   Protože fetch() a CSV načítání je nad rámec,
   data jsou uložena přímo tady jako pole objektů.
   Přidávej/měň řádky dle potřeby.
*/
var expozice = [
    { nazev: "Starověký Egypt",           popis: "Objevujte tajemství faraonů a mumifikace.",                    kategorie: "Historie",      obrazek: "egypt.jpg"      },
    { nazev: "Prehistorické dinosauři",   popis: "Giganti z dávných dob, kteří fascinují děti i dospělé.",      kategorie: "Příroda",       obrazek: "dinosauri.jpg"  },
    { nazev: "Moderní umění",             popis: "Významní malíři a současní umělci světa.",                     kategorie: "Umění",         obrazek: "moderni.jpg"    },
    { nazev: "Středověké zbraně",         popis: "Poznejte historii rytířů a středověkých bitev.",               kategorie: "Historie",      obrazek: "stredoveke.jpg" },
    { nazev: "Vesmír a astronomie",       popis: "Expozice plná planet, hvězd a vesmírných misí.",               kategorie: "Věda",          obrazek: "vesmir.jpg"     },
    { nazev: "Historie hudby",            popis: "Od středověkých nástrojů po moderní hudební technologie.",     kategorie: "Kultura",       obrazek: "hudba.jpg"      }
];

var aktivniKategorie = "Vše";

function zobrazExpozice() {
    var kontejner = document.getElementById("expozice-cards");
    var vysledek  = "";

    for (var i = 0; i < expozice.length; i++) {
        var e = expozice[i];

        if (aktivniKategorie !== "Vše" && e.kategorie !== aktivniKategorie) {
            continue;
        }

        vysledek = vysledek +
            "<div class='col-md-4 mb-4'>" +
            "<div class='card h-100 shadow-sm'>" +
            "<img src='obrazky/" + e.obrazek + "' class='card-img-top' alt='" + e.nazev + "'>" +
            "<div class='card-body'>" +
            "<span class='badge bg-success mb-2'>" + e.kategorie + "</span>" +
            "<h5 class='card-title'>" + e.nazev + "</h5>" +
            "<p class='card-text'>" + e.popis + "</p>" +
            "<ul class='list-group list-group-flush text-start'>" +
            "<li class='list-group-item'>Dospělý: 150 Kč</li>" +
            "<li class='list-group-item'>Dítě: 100 Kč</li>" +
            "<li class='list-group-item'>Student: 120 Kč</li>" +
            "<li class='list-group-item'>ZTP: 80 Kč</li>" +
            "<li class='list-group-item'>Rodina: 400 Kč</li>" +
            "</ul></div></div></div>";
    }

    if (vysledek === "") {
        vysledek = "<p class='text-muted'>Žádné expozice v této kategorii.</p>";
    }

    kontejner.innerHTML = vysledek;
}

function zobrazFiltery() {
    var kategorie = ["Vše", "Historie", "Příroda", "Umění", "Věda", "Kultura"];
    var vysledek  = "";

    for (var i = 0; i < kategorie.length; i++) {
        var aktivni = "";
        if (kategorie[i] === aktivniKategorie) {
            aktivni = "active";
        }
        vysledek = vysledek +
            "<button class='btn btn-sm btn-outline-success me-2 mb-2 filter-btn " + aktivni + "' " +
            "onclick=\"filtrujKategorii('" + kategorie[i] + "')\">" +
            kategorie[i] + "</button>";
    }

    document.getElementById("kategorie-filter").innerHTML = vysledek;
}

function filtrujKategorii(kat) {
    aktivniKategorie = kat;
    zobrazFiltery();
    zobrazExpozice();
}

zobrazFiltery();
zobrazExpozice();


/* ---------- VÝPOČET CENY – formulář veřejnost ---------- */
var cenyPublic = { dospely: 150, dite: 100, student: 120, ztp: 80, rodina: 400 };
var cenyTema   = { dospely: 180, dite: 120, student: 150, ztp: 100, rodina: 500 };

function prepocitejCenu(typFormu) {
    var pocet = parseInt(document.getElementById("pocet_" + typFormu).value);
    var typ   = document.getElementById("typ_" + typFormu).value;
    var cena  = 0;

    if (typFormu === "public") {
        cena = cenyPublic[typ] * pocet;
    } else {
        cena = cenyTema[typ] * pocet;
    }

    document.getElementById("cena_" + typFormu).innerHTML = "Celková cena: " + cena + " Kč";
}


/* ---------- ODESLÁNÍ FORMULÁŘE ---------- */
function odesliRezervaci(typFormu) {
    var jmeno = document.getElementById("jmeno_" + typFormu).value;
    var email = document.getElementById("email_" + typFormu).value;
    var datum = document.getElementById("datum_" + typFormu).value;
    var cas   = document.getElementById("cas_" + typFormu).value;

    if (jmeno === "" || email === "" || datum === "" || cas === "") {
        alert("Vyplňte prosím všechna povinná pole.");
        return;
    }

    alert("Rezervace odeslána! Potvrzení zašleme na: " + email);

    document.getElementById("form_" + typFormu).reset();
    document.getElementById("cena_" + typFormu).innerHTML = "";
}


/* ---------- HVĚZDIČKY – recenze ---------- */
var vybraneCislo = 0;

function hvezdickaMysOver(cislo) {
    for (var i = 1; i <= 5; i++) {
        if (i <= cislo) {
            document.getElementById("star_" + i).style.color = "#f0a500";
        } else {
            document.getElementById("star_" + i).style.color = "#ccc";
        }
    }
}

function hvezdickaKlik(cislo) {
    vybraneCislo = cislo;
    document.getElementById("rating-value").value = cislo;

    for (var i = 1; i <= 5; i++) {
        if (i <= cislo) {
            document.getElementById("star_" + i).style.color = "#f0a500";
        } else {
            document.getElementById("star_" + i).style.color = "#ccc";
        }
    }
}

function hvezdickaMysPrec() {
    hvezdickaKlik(vybraneCislo);
}


/* ---------- ODESLÁNÍ RECENZE ---------- */
function odesliRecenzi() {
    var jmeno = document.getElementById("recenze-jmeno").value.trim();
    var text  = document.getElementById("recenze-text").value.trim();

    if (jmeno === "" || text === "" || vybraneCislo === 0) {
        alert("Vyplňte jméno, text recenze a vyberte hodnocení hvězdičkami.");
        return;
    }

    var plne    = "";
    var prazdne = "";
    for (var i = 0; i < vybraneCislo; i++)    plne    = plne    + "★";
    for (var i = vybraneCislo; i < 5; i++)    prazdne = prazdne + "☆";

    var novaKarta =
        "<div class='col-md-4 mb-4'>" +
        "<div class='card recenze-card h-100 shadow-sm'>" +
        "<div class='card-body'>" +
        "<div class='recenze-stars'>" + plne + prazdne + "</div>" +
        "<p class='card-text fst-italic'>\"" + text + "\"</p>" +
        "<p class='recenze-autor'>— " + jmeno + "</p>" +
        "</div></div></div>";

    var seznam = document.getElementById("recenze-list");
    seznam.innerHTML = novaKarta + seznam.innerHTML;

    alert("Děkujeme za recenzi, " + jmeno + "!");

    document.getElementById("recenze-form").reset();
    vybraneCislo = 0;
    hvezdickaKlik(0);
}