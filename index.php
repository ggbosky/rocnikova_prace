<?php
// index.php – hlavní stránka fiktivního muzea
?>
<!DOCTYPE html>
<html lang="cs">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Muzeum – Maturitní projekt</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="styly/styly.css">
</head>

<body>

    <!-- NAVBAR (sticky) -->
    <nav id="hlavniNavbar" class="navbar navbar-expand-lg navbar-light sticky-top shadow-sm bg-white">
        <div class="container">
            <a class="navbar-brand" href="#"><img src="obrazky/logo_muzea.png" alt="Logo muzea"></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item"><a class="nav-link" href="#expozice">Expozice</a></li>
                    <li class="nav-item"><a class="nav-link" href="#vystavy">Výstavy</a></li>
                    <li class="nav-item"><a class="nav-link" href="#sluzby">Služby & Ceník</a></li>
                    <li class="nav-item"><a class="nav-link" href="#recenze">Recenze</a></li>
                    <li class="nav-item"><a class="nav-link" href="#faq">FAQ</a></li>
                    <li class="nav-item"><a class="nav-link" href="#kontakt">Kontakt</a></li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- HERO -->
    <section class="hero">
        <div class="hero-content text-center">
            <h1>Vítejte v našem muzeu!</h1>
            <p>Objevujte fascinující výstavy a unikátní exponáty</p>
            <a href="#sluzby" class="btn btn-primary btn-lg">Rezervovat návštěvu</a>
        </div>
    </section>

    <!-- BANNER -->
    <section class="hero-banner">
        <div class="container">
            <h2>&#127775; Nová výstava: Starověký Egypt se vrací!</h2>
            <p>Jedinečná příležitost vidět originální egyptské artefakty z roku 3000 př. n. l. Pouze do konce léta.</p>
            <a href="#vystavy" class="btn-banner">Zjistit více</a>
        </div>
    </section>

    <!-- COUNTDOWN -->
    <section id="countdown-section">
        <div class="container">
            <h2>Zahájení nové výstavy za:</h2>
            <p>Nová výstava "Poklady Mezopotámie" brzy otevírá své brány</p>
            <div id="countdown" class="countdown-boxes">
                <div class="cd-box">
                    <span id="cd-days">00</span>
                    <small>Dní</small>
                </div>
                <div class="cd-box">
                    <span id="cd-hours">00</span>
                    <small>Hodin</small>
                </div>
                <div class="cd-box">
                    <span id="cd-minutes">00</span>
                    <small>Minut</small>
                </div>
                <div class="cd-box">
                    <span id="cd-seconds">00</span>
                    <small>Sekund</small>
                </div>
            </div>
        </div>
    </section>

    <!-- EXPOZICE – karty generuje JavaScript -->
    <section id="expozice" class="py-5 text-center">
        <div class="container">
            <h2 class="mb-2">Naše expozice</h2>
            <p class="text-muted mb-3">Filtruj podle kategorie:</p>
            <div id="kategorie-filter" class="mb-4"></div>
            <div class="row" id="expozice-cards">
                <p class="text-muted">Načítám expozice…</p>
            </div>
        </div>
    </section>

    <!-- CAROUSEL -->
    <section id="vystavy" class="py-5 text-center bg-light">
        <div class="container">
            <h2 class="mb-4">Prémiové výstavy</h2>
            <div id="carouselExpozice" class="carousel slide shadow rounded" data-bs-ride="carousel">
                <div class="carousel-indicators">
                    <button type="button" data-bs-target="#carouselExpozice" data-bs-slide-to="0" class="active"></button>
                    <button type="button" data-bs-target="#carouselExpozice" data-bs-slide-to="1"></button>
                    <button type="button" data-bs-target="#carouselExpozice" data-bs-slide-to="2"></button>
                </div>
                <div class="carousel-inner rounded">
                    <div class="carousel-item active">
                        <img src="obrazky/egypt_carousel.jpg" class="d-block w-100 rounded" alt="Starověký Egypt" style="height:500px;">
                        <div class="carousel-caption d-none d-md-block bg-dark bg-opacity-40 p-3 rounded text-start">
                            <h5 class="fw-bold">Starověký Egypt</h5>
                            <p>Faraoni, mumie a starověké artefakty</p>
                        </div>
                    </div>
                    <div class="carousel-item">
                        <img src="obrazky/moderni_carousel.jpg" class="d-block w-100 rounded" alt="Moderní umění" style="height:500px;">
                        <div class="carousel-caption d-none d-md-block bg-dark bg-opacity-40 p-3 rounded text-start">
                            <h5 class="fw-bold">Moderní umění</h5>
                            <p>Významní malíři a současní umělci</p>
                        </div>
                    </div>
                    <div class="carousel-item">
                        <img src="obrazky/dinosauri_carousel.jpg" class="d-block w-100 rounded" alt="Dinosauři" style="height:500px;">
                        <div class="carousel-caption d-none d-md-block bg-dark bg-opacity-40 p-3 rounded text-start">
                            <h5 class="fw-bold">Dinosauři</h5>
                            <p>Prehistorické obří tvory na vlastní oči</p>
                        </div>
                    </div>
                </div>
                <button class="carousel-control-prev" type="button" data-bs-target="#carouselExpozice" data-bs-slide="prev">
                    <span class="carousel-control-prev-icon"></span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#carouselExpozice" data-bs-slide="next">
                    <span class="carousel-control-next-icon"></span>
                </button>
            </div>
        </div>
    </section>

    <!-- SLUŽBY + CENÍK + FORMULÁŘE -->
    <section id="sluzby" class="py-5 text-center">
        <div class="container">
            <h2 class="mb-4">Služby a ceník</h2>
            <div class="row">

                <!-- Prohlídky pro veřejnost -->
                <div class="col-md-6 mb-4">
                    <div class="card h-100 shadow-sm">
                        <div class="card-body text-start">
                            <h5 class="card-title">Prohlídky pro veřejnost</h5>
                            <p>Individuální a skupinové prohlídky expozic</p>
                            <ul class="mb-3">
                                <li>Dospělý: 150 Kč</li>
                                <li>Dítě: 100 Kč</li>
                                <li>Student: 120 Kč</li>
                                <li>ZTP: 80 Kč</li>
                                <li>Rodina: 400 Kč</li>
                            </ul>
                            <form id="form_public" class="rezervace-form">
                                <label>Jméno a příjmení *</label>
                                <input type="text" id="jmeno_public" placeholder="Jan Novák">

                                <label>E-mail *</label>
                                <input type="email" id="email_public" placeholder="jan@email.cz">

                                <label>Datum návštěvy *</label>
                                <input type="date" id="datum_public">

                                <label>Čas *</label>
                                <input type="time" id="cas_public">

                                <label>Počet osob *</label>
                                <input type="number" id="pocet_public" value="1" min="1" max="50"
                                       onchange="prepocitejCenu('public')"
                                       oninput="prepocitejCenu('public')">

                                <label>Typ vstupenky</label>
                                <select id="typ_public" onchange="prepocitejCenu('public')">
                                    <option value="dospely">Dospělý – 150 Kč</option>
                                    <option value="dite">Dítě – 100 Kč</option>
                                    <option value="student">Student – 120 Kč</option>
                                    <option value="ztp">ZTP – 80 Kč</option>
                                    <option value="rodina">Rodina – 400 Kč</option>
                                </select>

                                <div id="cena_public" class="cena-celkem"></div>

                                <button type="button" onclick="odesliRezervaci('public')">Rezervovat</button>
                            </form>
                        </div>
                    </div>
                </div>

                <!-- Tematické programy -->
                <div class="col-md-6 mb-4">
                    <div class="card h-100 shadow-sm">
                        <div class="card-body text-start">
                            <h5 class="card-title">Tematické programy</h5>
                            <p>Speciální prohlídky zaměřené na konkrétní témata a výstavy</p>
                            <ul class="mb-3">
                                <li>Dospělý: 180 Kč</li>
                                <li>Dítě: 120 Kč</li>
                                <li>Student: 150 Kč</li>
                                <li>ZTP: 100 Kč</li>
                                <li>Rodina: 500 Kč</li>
                            </ul>
                            <form id="form_tema" class="rezervace-form">
                                <label>Jméno a příjmení *</label>
                                <input type="text" id="jmeno_tema" placeholder="Jan Novák">

                                <label>E-mail *</label>
                                <input type="email" id="email_tema" placeholder="jan@email.cz">

                                <label>Datum návštěvy *</label>
                                <input type="date" id="datum_tema">

                                <label>Čas *</label>
                                <input type="time" id="cas_tema">

                                <label>Počet osob *</label>
                                <input type="number" id="pocet_tema" value="1" min="1" max="50"
                                       onchange="prepocitejCenu('tema')"
                                       oninput="prepocitejCenu('tema')">

                                <label>Typ vstupenky</label>
                                <select id="typ_tema" onchange="prepocitejCenu('tema')">
                                    <option value="dospely">Dospělý – 180 Kč</option>
                                    <option value="dite">Dítě – 120 Kč</option>
                                    <option value="student">Student – 150 Kč</option>
                                    <option value="ztp">ZTP – 100 Kč</option>
                                    <option value="rodina">Rodina – 500 Kč</option>
                                </select>

                                <div id="cena_tema" class="cena-celkem"></div>

                                <button type="button" onclick="odesliRezervaci('tema')">Rezervovat</button>
                            </form>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>

    <!-- RECENZE -->
    <section id="recenze" class="py-5">
        <div class="container text-center">
            <h2 class="mb-2">Recenze návštěvníků</h2>
            <p class="text-muted mb-4">Co říkají ti, kdo nás navštívili</p>

            <div class="row" id="recenze-list">
                <?php
                $recenze = [
                    ["Petra K.", 5, "Úžasné muzeum! Expozice egyptského starověku byla fascinující – doporučuji celé rodině."],
                    ["Ondřej M.", 4, "Skvělý zážitek, zvláště pro děti. Interaktivní části jsou výborné. Přijdeme znovu!"],
                    ["Lucie H.", 5, "Prohlídka s průvodcem předčila naše očekávání. Průvodce byl velmi znalý a příjemný."],
                ];

                foreach ($recenze as $r) {
                    $plne    = str_repeat('★', $r[1]);
                    $prazdne = str_repeat('☆', 5 - $r[1]);
                    echo '<div class="col-md-4 mb-4">';
                    echo '<div class="card recenze-card h-100 shadow-sm">';
                    echo '<div class="card-body">';
                    echo '<div class="recenze-stars">' . $plne . $prazdne . '</div>';
                    echo '<p class="card-text fst-italic">"' . $r[2] . '"</p>';
                    echo '<p class="recenze-autor">— ' . $r[0] . '</p>';
                    echo '</div></div></div>';
                }
                ?>
            </div>

            <!-- Formulář pro přidání recenze -->
            <div class="mt-5">
                <h4 class="mb-3">Přidejte svou recenzi</h4>
                <div class="recenze-form-wrapper">
                    <form id="recenze-form" class="text-start">

                        <label class="form-label fw-semibold">Vaše jméno *</label>
                        <input type="text" id="recenze-jmeno" class="form-control mb-3" placeholder="Jméno a příjmení">

                        <label class="form-label fw-semibold">Hodnocení *</label>
                        <div class="star-rating mb-3">
                            <span id="star_1" class="star" onmouseover="hvezdickaMysOver(1)" onmouseout="hvezdickaMysPrec()" onclick="hvezdickaKlik(1)">&#9733;</span>
                            <span id="star_2" class="star" onmouseover="hvezdickaMysOver(2)" onmouseout="hvezdickaMysPrec()" onclick="hvezdickaKlik(2)">&#9733;</span>
                            <span id="star_3" class="star" onmouseover="hvezdickaMysOver(3)" onmouseout="hvezdickaMysPrec()" onclick="hvezdickaKlik(3)">&#9733;</span>
                            <span id="star_4" class="star" onmouseover="hvezdickaMysOver(4)" onmouseout="hvezdickaMysPrec()" onclick="hvezdickaKlik(4)">&#9733;</span>
                            <span id="star_5" class="star" onmouseover="hvezdickaMysOver(5)" onmouseout="hvezdickaMysPrec()" onclick="hvezdickaKlik(5)">&#9733;</span>
                        </div>
                        <input type="hidden" id="rating-value" value="0">

                        <label class="form-label fw-semibold">Text recenze *</label>
                        <textarea id="recenze-text" class="form-control mb-3" rows="3" placeholder="Napište svůj zážitek…"></textarea>

                        <button type="button" class="btn btn-success w-100" onclick="odesliRecenzi()">Odeslat recenzi</button>
                    </form>
                </div>
            </div>
        </div>
    </section>

    <!-- FAQ -->
    <section id="faq" class="py-5 text-center">
        <div class="container">
            <h2 class="mb-4">Nejčastější dotazy (FAQ)</h2>
            <div class="accordion" id="faqAccordion">

                <div class="accordion-item">
                    <h2 class="accordion-header">
                        <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#faq1">
                            Jak si mohu rezervovat vstupenky?
                        </button>
                    </h2>
                    <div id="faq1" class="accordion-collapse collapse show">
                        <div class="accordion-body">
                            Vstupenky si můžete rezervovat přes náš formulář v sekci Služby a ceník. Vyplňte datum, čas, počet osob a typ vstupenky.
                        </div>
                    </div>
                </div>

                <div class="accordion-item">
                    <h2 class="accordion-header">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq2">
                            Kde se muzeum nachází?
                        </button>
                    </h2>
                    <div id="faq2" class="accordion-collapse collapse">
                        <div class="accordion-body">
                            Adresa muzea je Náměstí Jana Palacha 1/2, Praha. Dostupné metrem – stanice A Staroměstská.
                        </div>
                    </div>
                </div>

                <div class="accordion-item">
                    <h2 class="accordion-header">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq3">
                            Je možné navštívit muzeum s kočárkem?
                        </button>
                    </h2>
                    <div id="faq3" class="accordion-collapse collapse">
                        <div class="accordion-body">
                            Ano, muzeum je plně bezbariérové a vhodné pro návštěvníky s kočárky i vozíčkáře.
                        </div>
                    </div>
                </div>

                <div class="accordion-item">
                    <h2 class="accordion-header">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq4">
                            Nabízíte školní skupiny a exkurze?
                        </button>
                    </h2>
                    <div id="faq4" class="accordion-collapse collapse">
                        <div class="accordion-body">
                            Ano, pro školní skupiny nabízíme speciální programy a skupinové slevy. Napište nám na info@muzeum.cz.
                        </div>
                    </div>
                </div>

                <div class="accordion-item">
                    <h2 class="accordion-header">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq5">
                            Jak dlouho trvá standardní prohlídka?
                        </button>
                    </h2>
                    <div id="faq5" class="accordion-collapse collapse">
                        <div class="accordion-body">
                            Standardní prohlídka trvá přibližně 60–90 minut. Tematické programy mohou trvat až 2 hodiny.
                        </div>
                    </div>
                </div>

                <div class="accordion-item">
                    <h2 class="accordion-header">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq6">
                            Jaká jsou otevírací doba?
                        </button>
                    </h2>
                    <div id="faq6" class="accordion-collapse collapse">
                        <div class="accordion-body">
                            Muzeum je otevřeno úterý–neděle od 9:00 do 18:00. Pondělí zavřeno.
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>

    <!-- FOOTER + MAPA -->
    <footer id="kontakt" class="py-5 text-center">
        <div class="container">
            <h5>Kontakt &amp; Adresa</h5>
            <p>Náměstí Jana Palacha 1/2, Praha &nbsp;|&nbsp; Email: <a href="mailto:info@muzeum.cz">info@muzeum.cz</a> &nbsp;|&nbsp; Tel: +420 123 456 789</p>
            <p class="mb-3">Otevírací doba: Út–Ne 9:00–18:00</p>
            <iframe
                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2381.3871!2d14.4144!3d50.0849!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x470b94f0b2e8e8e1%3A0x123456789abcdef!2sN%C3%A1m%C4%9Bst%C3%AD%20Jana%20Palacha%201%2F2%2C%20Praha!5e0!3m2!1scs!2scz!4v1678901234567!5m2!1scs!2scz"
                style="border:0;" allowfullscreen="" loading="lazy" title="Mapa muzea"></iframe>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="js/script.js"></script>
</body>

</html>