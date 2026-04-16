<?php
// api/expozice.php
// Přečte soubor data/expozice.csv a pošle ho jako JSON
// Volá se z JavaScriptu pomocí fetch("api/expozice.php")

header('Content-Type: application/json; charset=utf-8');

// Cesta k CSV – jdeme o složku výš (z api/ do kořene), pak do data/
$soubor = '../data/expozice.csv';

// Otevřeme soubor pro čtení
$handle = fopen($soubor, 'r');

// Přečteme první řádek – to je záhlaví (nazev, popis, kategorie, obrazek)
$zahlavi = fgetcsv($handle, 1000, ',');

// Sem budeme ukládat všechny expozice
$expozice = array();

// Čteme řádek po řádku dokud není konec souboru
while (($radek = fgetcsv($handle, 1000, ',')) !== false) {

    // Přeskočíme prázdné řádky
    if (count($radek) < count($zahlavi)) {
        continue;
    }

    // Spojíme záhlaví s hodnotami → z ["nazev","popis",...] + ["Egypt","Popis",...] 
    // uděláme ["nazev" => "Egypt", "popis" => "Popis", ...]
    $expozice[] = array_combine($zahlavi, $radek);
}

// Zavřeme soubor
fclose($handle);

// Převedeme pole na JSON a odešleme
// JSON_UNESCAPED_UNICODE = česká písmena zůstanou čitelná (ne \u00e1 apod.)
echo json_encode($expozice, JSON_UNESCAPED_UNICODE);