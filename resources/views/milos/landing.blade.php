<!DOCTYPE html>
<html lang="sr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ElektroServis - Profesionalne Električarske Usluge</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        :root {
            --primary-color: #ffc107;
            --dark-color: #212529;
        }

        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }

        .navbar {
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
        }

        .navbar-brand {
            font-weight: bold;
            font-size: 1.5rem;
        }

        .hero-carousel {
            height: 100vh;
            position: relative;
        }

        .carousel-item {
            height: 100vh;
        }

        .carousel-item img {
            object-fit: cover;
            height: 100%;
            width: 100%;
            filter: brightness(0.7);
        }

        .carousel-caption {
            top: 50%;
            transform: translateY(-50%);
            bottom: auto;
        }

        .carousel-caption h1 {
            font-size: 3.5rem;
            font-weight: bold;
            text-shadow: 2px 2px 4px rgba(0,0,0,0.5);
        }

        .carousel-caption p {
            font-size: 1.5rem;
            text-shadow: 1px 1px 3px rgba(0,0,0,0.5);
        }

        .btn-primary {
            background-color: var(--primary-color);
            border-color: var(--primary-color);
            color: var(--dark-color);
            font-weight: bold;
            padding: 12px 30px;
            font-size: 1.1rem;
        }

        .btn-primary:hover {
            background-color: #e0a800;
            border-color: #e0a800;
            transform: scale(1.05);
        }

        .service-card {
            transition: all 0.3s ease;
            height: 100%;
            border: none;
            box-shadow: 0 2px 15px rgba(0,0,0,0.1);
        }

        .service-card:hover {
            transform: translateY(-10px);
            box-shadow: 0 5px 25px rgba(0,0,0,0.2);
        }

        .service-icon {
            font-size: 3rem;
            color: var(--primary-color);
            margin-bottom: 1rem;
        }

        .section-title {
            font-size: 2.5rem;
            font-weight: bold;
            margin-bottom: 3rem;
            position: relative;
            padding-bottom: 15px;
        }

        .section-title:after {
            content: '';
            position: absolute;
            bottom: 0;
            left: 50%;
            transform: translateX(-50%);
            width: 80px;
            height: 4px;
            background-color: var(--primary-color);
        }

        .gallery-img {
            height: 300px;
            object-fit: cover;
            border-radius: 8px;
            transition: transform 0.3s ease;
        }

        .gallery-img:hover {
            transform: scale(1.05);
        }

        .contact-info-item {
            display: flex;
            align-items: center;
            margin-bottom: 1.5rem;
        }

        .contact-icon {
            font-size: 1.5rem;
            color: var(--primary-color);
            margin-right: 1rem;
        }

        footer {
            background-color: #000;
            color: #6c757d;
            padding: 2rem 0;
        }

        .lang-switcher .btn {
            margin: 0 2px;
        }

        .content-lang {
            display: none;
        }

        .content-lang.active {
            display: block;
        }

        @media (max-width: 768px) {
            .carousel-caption h1 {
                font-size: 2rem;
            }

            .carousel-caption p {
                font-size: 1rem;
            }
        }
    </style>
</head>
<body>

<!-- Navigation -->
<nav class="navbar navbar-expand-lg navbar-light bg-white fixed-top">
    <div class="container">
        <a class="navbar-brand" href="#home">
            <i class="fas fa-bolt text-warning"></i> ElektroServis
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item"><a class="nav-link" href="#home"><span class="nav-text" data-sr="Početna" data-en="Home" data-de="Startseite">Početna</span></a></li>
                <li class="nav-item"><a class="nav-link" href="#services"><span class="nav-text" data-sr="Usluge" data-en="Services" data-de="Dienstleistungen">Usluge</span></a></li>
                <li class="nav-item"><a class="nav-link" href="#about"><span class="nav-text" data-sr="O Nama" data-en="About Us" data-de="Über Uns">O Nama</span></a></li>
                <li class="nav-item"><a class="nav-link" href="#gallery"><span class="nav-text" data-sr="Galerija" data-en="Gallery" data-de="Galerie">Galerija</span></a></li>
                <li class="nav-item"><a class="nav-link" href="#contact"><span class="nav-text" data-sr="Kontakt" data-en="Contact" data-de="Kontakt">Kontakt</span></a></li>
            </ul>
            <div class="lang-switcher ms-3">
                <button class="btn btn-sm btn-warning" onclick="switchLang('sr')">SR</button>
                <button class="btn btn-sm btn-outline-warning" onclick="switchLang('en')">EN</button>
                <button class="btn btn-sm btn-outline-warning" onclick="switchLang('de')">DE</button>
            </div>
        </div>
    </div>
</nav>

<!-- Hero Carousel -->
<section id="home">
    <div id="heroCarousel" class="carousel slide hero-carousel" data-bs-ride="carousel">
        <div class="carousel-indicators">
            <button type="button" data-bs-target="#heroCarousel" data-bs-slide-to="0" class="active"></button>
            <button type="button" data-bs-target="#heroCarousel" data-bs-slide-to="1"></button>
            <button type="button" data-bs-target="#heroCarousel" data-bs-slide-to="2"></button>
        </div>
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="https://images.unsplash.com/photo-1621905251189-08b45d6a269e?w=1920&h=1080&fit=crop" class="d-block w-100" alt="Slide 1">
                <div class="carousel-caption">
                    <h1 class="hero-title" data-sr="Profesionalne Električarske Usluge" data-en="Professional Electrical Services" data-de="Professionelle Elektrodienstleistungen">Profesionalne Električarske Usluge</h1>
                    <p class="hero-subtitle" data-sr="Kvalitet, Sigurnost i Pouzdanost" data-en="Quality, Safety and Reliability" data-de="Qualität, Sicherheit und Zuverlässigkeit">Kvalitet, Sigurnost i Pouzdanost</p>
                    <a href="#contact" class="btn btn-primary btn-lg mt-3">
                        <span class="cta-text" data-sr="Dobijte Besplatan Predračun" data-en="Get a Free Quote" data-de="Kostenloses Angebot erhalten">Dobijte Besplatan Predračun</span>
                    </a>
                </div>
            </div>
            <div class="carousel-item">
                <img src="https://images.unsplash.com/photo-1558618666-fcd25c85cd64?w=1920&h=1080&fit=crop" class="d-block w-100" alt="Slide 2">
                <div class="carousel-caption">
                    <h1 class="hero-title" data-sr="Profesionalne Električarske Usluge" data-en="Professional Electrical Services" data-de="Professionelle Elektrodienstleistungen">Profesionalne Električarske Usluge</h1>
                    <p class="hero-subtitle" data-sr="Kvalitet, Sigurnost i Pouzdanost" data-en="Quality, Safety and Reliability" data-de="Qualität, Sicherheit und Zuverlässigkeit">Kvalitet, Sigurnost i Pouzdanost</p>
                    <a href="#contact" class="btn btn-primary btn-lg mt-3">
                        <span class="cta-text" data-sr="Dobijte Besplatan Predračun" data-en="Get a Free Quote" data-de="Kostenloses Angebot erhalten">Dobijte Besplatan Predračun</span>
                    </a>
                </div>
            </div>
            <div class="carousel-item">
                <img src="https://images.unsplash.com/photo-1581094794329-c8112a89af12?w=1920&h=1080&fit=crop" class="d-block w-100" alt="Slide 3">
                <div class="carousel-caption">
                    <h1 class="hero-title" data-sr="Profesionalne Električarske Usluge" data-en="Professional Electrical Services" data-de="Professionelle Elektrodienstleistungen">Profesionalne Električarske Usluge</h1>
                    <p class="hero-subtitle" data-sr="Kvalitet, Sigurnost i Pouzdanost" data-en="Quality, Safety and Reliability" data-de="Qualität, Sicherheit und Zuverlässigkeit">Kvalitet, Sigurnost i Pouzdanost</p>
                    <a href="#contact" class="btn btn-primary btn-lg mt-3">
                        <span class="cta-text" data-sr="Dobijte Besplatan Predračun" data-en="Get a Free Quote" data-de="Kostenloses Angebot erhalten">Dobijte Besplatan Predračun</span>
                    </a>
                </div>
            </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#heroCarousel" data-bs-slide="prev">
            <span class="carousel-control-prev-icon"></span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#heroCarousel" data-bs-slide="next">
            <span class="carousel-control-next-icon"></span>
        </button>
    </div>
</section>

<!-- Services Section -->
<section id="services" class="py-5 bg-light">
    <div class="container">
        <h2 class="section-title text-center" data-sr="Naše Usluge" data-en="Our Services" data-de="Unsere Dienstleistungen">Naše Usluge</h2>
        <div class="row g-4">
            <div class="col-md-6 col-lg-3">
                <div class="card service-card text-center p-4">
                    <div class="card-body">
                        <i class="fas fa-home service-icon"></i>
                        <h5 class="card-title" data-sr="Stambena Elektrika" data-en="Residential Electrical" data-de="Wohnelektrik">Stambena Elektrika</h5>
                        <p class="card-text" data-sr="Kompletne električne instalacije i popravke za vaš dom" data-en="Complete electrical installations and repairs for your home" data-de="Komplette Elektroinstallationen und Reparaturen für Ihr Zuhause">Kompletne električne instalacije i popravke za vaš dom</p>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-lg-3">
                <div class="card service-card text-center p-4">
                    <div class="card-body">
                        <i class="fas fa-building service-icon"></i>
                        <h5 class="card-title" data-sr="Komercijalni Projekti" data-en="Commercial Projects" data-de="Gewerbeprojekte">Komercijalni Projekti</h5>
                        <p class="card-text" data-sr="Profesionalna rešenja za preduzeća i industrijske objekte" data-en="Professional solutions for businesses and industrial facilities" data-de="Professionelle Lösungen für Unternehmen und Industrieanlagen">Profesionalna rešenja za preduzeća i industrijske objekte</p>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-lg-3">
                <div class="card service-card text-center p-4">
                    <div class="card-body">
                        <i class="fas fa-wrench service-icon"></i>
                        <h5 class="card-title" data-sr="Održavanje" data-en="Maintenance" data-de="Wartung">Održavanje</h5>
                        <p class="card-text" data-sr="Redovne kontrole i preventivno održavanje" data-en="Regular inspections and preventive maintenance" data-de="Regelmäßige Inspektionen und vorbeugende Wartung">Redovne kontrole i preventivno održavanje</p>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-lg-3">
                <div class="card service-card text-center p-4">
                    <div class="card-body">
                        <i class="fas fa-shield-alt service-icon"></i>
                        <h5 class="card-title" data-sr="Hitne Intervencije 24/7" data-en="24/7 Emergency Service" data-de="24/7 Notdienst">Hitne Intervencije 24/7</h5>
                        <p class="card-text" data-sr="Dostupni u svakom trenutku za hitne probleme sa strujom" data-en="Available anytime for urgent electrical issues" data-de="Jederzeit verfügbar für dringende elektrische Probleme">Dostupni u svakom trenutku za hitne probleme sa strujom</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- About Section -->
<section id="about" class="py-5">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-6 mb-4 mb-lg-0">
                <h2 class="section-title" data-sr="O Nama" data-en="About Us" data-de="Über Uns">O Nama</h2>
                <p class="lead" data-sr="Sa preko 15 godina iskustva, pružamo vrhunske električarske usluge. Naši sertifikovani električari garantuju sigurnost i profesionalnost u svakom projektu. Koristimo najnoviju tehnologiju i pridržavamo se svih bezbednosnih standarda." data-en="With over 15 years of experience, we provide top-quality electrical services. Our certified electricians ensure safety and professionalism in every project. We use the latest technology and adhere to all safety standards." data-de="Mit über 15 Jahren Erfahrung bieten wir erstklassige Elektrodienstleistungen. Unsere zertifizierten Elektriker garantieren Sicherheit und Professionalität bei jedem Projekt. Wir verwenden modernste Technologie und halten alle Sicherheitsstandards ein.">Sa preko 15 godina iskustva, pružamo vrhunske električarske usluge. Naši sertifikovani električari garantuju sigurnost i profesionalnost u svakom projektu. Koristimo najnoviju tehnologiju i pridržavamo se svih bezbednosnih standarda.</p>
            </div>
            <div class="col-lg-6">
                <div class="row g-3">
                    <div class="col-6">
                        <img src="https://images.unsplash.com/photo-1621905252507-b35492cc74b4?w=400&h=300&fit=crop" class="img-fluid rounded shadow" alt="Work">
                    </div>
                    <div class="col-6">
                        <img src="https://images.unsplash.com/photo-1621905251189-08b45d6a269e?w=400&h=300&fit=crop" class="img-fluid rounded shadow" alt="Work">
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Gallery Section -->
<section id="gallery" class="py-5 bg-light">
    <div class="container">
        <h2 class="section-title text-center" data-sr="Naš Rad" data-en="Our Work" data-de="Unsere Arbeit">Naš Rad</h2>
        <div class="row g-4">
            <div class="col-md-4">
                <img src="https://images.unsplash.com/photo-1621905251189-08b45d6a269e?w=600&h=400&fit=crop" class="img-fluid gallery-img shadow" alt="Gallery 1">
            </div>
            <div class="col-md-4">
                <img src="https://images.unsplash.com/photo-1622186477895-f2af6a0f5a97?w=600&h=400&fit=crop" class="img-fluid gallery-img shadow" alt="Gallery 2">
            </div>
            <div class="col-md-4">
                <img src="https://images.unsplash.com/photo-1473341304170-971dccb5ac1e?w=600&h=400&fit=crop" class="img-fluid gallery-img shadow" alt="Gallery 3">
            </div>
        </div>
    </div>
</section>

<!-- Contact Section -->
<section id="contact" class="py-5 bg-dark text-white">
    <div class="container">
        <h2 class="section-title text-center text-white" data-sr="Kontaktirajte Nas" data-en="Contact Us" data-de="Kontakt">Kontaktirajte Nas</h2>
        <div class="row">
            <div class="col-lg-6 mb-4 mb-lg-0">
                <h4 class="mb-4" data-sr="Kontakt Informacije" data-en="Contact Information" data-de="Kontaktinformationen">Kontakt Informacije</h4>
                <div class="contact-info-item">
                    <i class="fas fa-phone contact-icon"></i>
                    <div>
                        <strong>Telefon:</strong><br>
                        +381 11 123 4567
                    </div>
                </div>
                <div class="contact-info-item">
                    <i class="fas fa-envelope contact-icon"></i>
                    <div>
                        <strong>Email:</strong><br>
                        info@elektroservis.rs
                    </div>
                </div>
                <div class="contact-info-item">
                    <i class="fas fa-map-marker-alt contact-icon"></i>
                    <div>
                        <strong data-sr="Adresa:" data-en="Address:" data-de="Adresse:">Adresa:</strong><br>
                        Beograd, Srbija
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="mb-3">
                    <input type="text" class="form-control" placeholder="Ime / Name / Name">
                </div>
                <div class="mb-3">
                    <input type="email" class="form-control" placeholder="Email">
                </div>
                <div class="mb-3">
                    <textarea class="form-control" rows="5" placeholder="Poruka / Message / Nachricht"></textarea>
                </div>
                <button class="btn btn-primary w-100">
                    <span data-sr="Pošalji Poruku" data-en="Send Message" data-de="Nachricht senden">Pošalji Poruku</span>
                </button>
            </div>
        </div>
    </div>
</section>

<!-- Footer -->
<footer class="text-center">
    <div class="container">
        <p class="mb-0">&copy; 2026 ElektroServis. <span data-sr="Sva prava zadržana." data-en="All rights reserved." data-de="Alle Rechte vorbehalten.">Sva prava zadržana.</span></p>
    </div>
</footer>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<script>
    let currentLang = 'sr';

    function switchLang(lang) {
        currentLang = lang;

        // Update button styles
        document.querySelectorAll('.lang-switcher .btn').forEach(btn => {
            btn.classList.remove('btn-warning');
            btn.classList.add('btn-outline-warning');
        });
        event.target.classList.remove('btn-outline-warning');
        event.target.classList.add('btn-warning');

        // Update all text elements
        document.querySelectorAll('[data-sr]').forEach(element => {
            if (element.hasAttribute(`data-${lang}`)) {
                element.textContent = element.getAttribute(`data-${lang}`);
            }
        });

        // Update HTML lang attribute
        document.documentElement.lang = lang;
    }

    // Smooth scroll
    document.querySelectorAll('a[href^="#"]').forEach(anchor => {
        anchor.addEventListener('click', function (e) {
            e.preventDefault();
            const target = document.querySelector(this.getAttribute('href'));
            if (target) {
                target.scrollIntoView({ behavior: 'smooth', block: 'start' });
            }
        });
    });

    // Auto-rotate carousel
    const carousel = new bootstrap.Carousel(document.querySelector('#heroCarousel'), {
        interval: 5000,
        wrap: true
    });
</script>
</body>
</html>
