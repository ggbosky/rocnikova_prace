<?php
// rezervace.php
// Přijme data z formuláře a uloží rezervaci do souboru rezervace.csv

header('Content-Type: application/json; charset=utf-8');

// Načteme hodnoty z formuláře, pokud neexistují dáme prázdný řetězec
$jmeno   = $_POST['jmeno']   ?? '';
$email   = $_POST['email']   ?? '';
$datum   = $_POST['datum']   ?? '';
$cas     = $_POST['cas']     ?? '';
$pocet   = $_POST['pocet']   ?? '1';
$typ     = $_POST['typ']     ?? '';
$typForm = $_POST['typForm'] ?? 'public';

// Odebereme mezery ze začátku a konce
$jmeno = trim($jmeno);
$email = trim($email);
$datum = trim($datum);
$cas   = trim($cas);
$pocet = (int) $pocet;

// Kontrola – pokud chybí povinné pole, pošleme chybu
if ($jmeno == '' || $email == '' || $datum == '' || $cas == '') {
    echo '{"ok": false, "zprava": "Vyplnte prosim vsechna povinna pole."}';
    exit;
}

// Kontrola e-mailu pomocí vestavěné PHP funkce
if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    echo '{"ok": false, "zprava": "E-mail neni platny."}';
    exit;
}

// Kontrola počtu osob
if ($pocet < 1 || $pocet > 50) {
    echo '{"ok": false, "zprava": "Pocet osob musi byt mezi 1 a 50."}';
    exit;
}

// Ceníky – stejné hodnoty jako v script.js
$cenyPublic = array('dospely' => 150, 'dite' => 100, 'student' => 120, 'ztp' => 80,  'rodina' => 400);
$cenyTema   = array('dospely' => 180, 'dite' => 120, 'student' => 150, 'ztp' => 100, 'rodina' => 500);

// Vybereme správný ceník podle typu formuláře
if ($typForm == 'tema') {
    $cenaJednotka = $cenyTema[$typ];
} else {
    $cenaJednotka = $cenyPublic[$typ];
}

// Výpočet celkové ceny
$celkem = $cenaJednotka * $pocet;

// Aktuální datum a čas odeslání
$casOdeslani = date('Y-m-d H:i:s');

// Sestavíme jeden řádek pro CSV
// Hodnoty oddělíme středníkem, řádek ukončíme novým řádkem
$radek = $jmeno . ';' . $email . ';' . $datum . ';' . $cas . ';' . $pocet . ';' . $typ . ';' . $typForm . ';' . $celkem . ';' . $casOdeslani . "\n";

// Cesta k souboru CSV (ve složce data/)
$soubor = 'data/rezervace.csv';

// Pokud soubor ještě neexistuje, přidáme záhlaví jako první řádek
if (!file_exists($soubor)) {
    $zahlavi = "jmeno;email;datum;cas;pocet;typ_vstupenky;typ_programu;celkem_kc;cas_odeslani\n";
    file_put_contents($soubor, $zahlavi);
}

// Připojíme nový řádek na konec souboru (FILE_APPEND = nepřepíše, jen přidá)
file_put_contents($soubor, $radek, FILE_APPEND);

// Pošleme úspěšnou odpověď zpět do JavaScriptu
echo '{"ok": true, "zprava": "Rezervace byla uspesne prijata! Potvrzeni zasleme na: ' . $email . '", "celkem": "' . $celkem . ' Kc"}';