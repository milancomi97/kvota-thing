<!DOCTYPE html>
<html lang="sr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tvoja nova rutina počinje ovde | Gym</title>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;600;700;900&display=swap" rel="stylesheet">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        :root {
            --black: #0B0B0B;
            --white: #FFFFFF;
            --turquoise: #00E5FF;
            --purple: #9C27FF;
            --gradient-main: linear-gradient(135deg, #00E5FF, #9C27FF);
        }

        body {
            font-family: 'Montserrat', sans-serif;
            background: var(--black);
            color: var(--white);
            line-height: 1.6;
        }

        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 20px;
        }

        /* HEADER */
        header {
            position: fixed;
            top: 0;
            width: 100%;
            background: rgba(11, 11, 11, 0.95);
            backdrop-filter: blur(10px);
            z-index: 1000;
            padding: 20px 0;
            border-bottom: 1px solid rgba(255, 255, 255, 0.1);
        }

        nav {
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .logo {
            font-size: 24px;
            font-weight: 900;
            background: var(--gradient-main);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }

        .nav-links {
            display: flex;
            gap: 30px;
            list-style: none;
        }

        .nav-links a {
            color: var(--white);
            text-decoration: none;
            font-weight: 600;
            transition: color 0.3s;
        }

        .nav-links a:hover {
            color: var(--turquoise);
        }

        /* HERO SEKCIJA */
        .hero {
            min-height: 100vh;
            display: flex;
            align-items: center;
            background: var(--gradient-main);
            position: relative;
            overflow: hidden;
            padding-top: 80px;
        }

        .hero::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background:
                radial-gradient(circle at 20% 50%, rgba(156, 39, 255, 0.3) 0%, transparent 50%),
                radial-gradient(circle at 80% 80%, rgba(0, 229, 255, 0.3) 0%, transparent 50%);
            animation: pulse 8s ease-in-out infinite;
        }

        @keyframes pulse {
            0%, 100% { opacity: 0.5; }
            50% { opacity: 1; }
        }

        .hero-content {
            position: relative;
            z-index: 1;
            text-align: center;
        }

        .hero h1 {
            font-size: clamp(36px, 6vw, 72px);
            font-weight: 900;
            margin-bottom: 20px;
            text-shadow: 0 4px 20px rgba(0, 0, 0, 0.3);
        }

        .hero h2 {
            font-size: clamp(18px, 3vw, 28px);
            font-weight: 400;
            margin-bottom: 40px;
            opacity: 0.95;
        }

        .cta-buttons {
            display: flex;
            gap: 20px;
            justify-content: center;
            flex-wrap: wrap;
            margin-bottom: 50px;
        }

        .btn {
            padding: 18px 40px;
            font-size: 18px;
            font-weight: 700;
            border: none;
            border-radius: 50px;
            cursor: pointer;
            transition: all 0.3s;
            text-decoration: none;
            display: inline-block;
        }

        .btn-primary {
            background: var(--turquoise);
            color: var(--black);
            box-shadow: 0 10px 30px rgba(0, 229, 255, 0.4);
        }

        .btn-primary:hover {
            transform: translateY(-3px);
            box-shadow: 0 15px 40px rgba(0, 229, 255, 0.6);
        }

        .btn-secondary {
            background: var(--purple);
            color: var(--white);
            box-shadow: 0 10px 30px rgba(156, 39, 255, 0.4);
        }

        .btn-secondary:hover {
            transform: translateY(-3px);
            box-shadow: 0 15px 40px rgba(156, 39, 255, 0.6);
        }

        .hero-benefits {
            display: flex;
            gap: 40px;
            justify-content: center;
            flex-wrap: wrap;
        }

        .benefit-item {
            display: flex;
            align-items: center;
            gap: 10px;
            font-weight: 600;
        }

        .benefit-icon {
            width: 24px;
            height: 24px;
            background: rgba(255, 255, 255, 0.2);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        /* SEKCIJE */
        section {
            padding: 100px 0;
        }

        .section-title {
            text-align: center;
            font-size: clamp(32px, 5vw, 48px);
            font-weight: 900;
            margin-bottom: 60px;
        }

        /* STA NUDIMO */
        .services-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 30px;
        }

        .service-card {
            background: rgba(255, 255, 255, 0.05);
            padding: 40px 30px;
            border-radius: 20px;
            border: 1px solid rgba(255, 255, 255, 0.1);
            transition: all 0.3s;
            text-align: center;
        }

        .service-card:hover {
            transform: translateY(-10px);
            background: rgba(255, 255, 255, 0.08);
            border-color: var(--turquoise);
        }

        .service-icon {
            width: 80px;
            height: 80px;
            background: var(--gradient-main);
            border-radius: 50%;
            margin: 0 auto 20px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 36px;
        }

        .service-card h3 {
            font-size: 24px;
            margin-bottom: 15px;
            color: var(--turquoise);
        }

        .service-card p {
            opacity: 0.8;
            line-height: 1.8;
        }

        /* KAKO POCETI */
        .steps {
            display: flex;
            gap: 40px;
            justify-content: center;
            flex-wrap: wrap;
            margin-top: 50px;
        }

        .step {
            flex: 1;
            min-width: 250px;
            max-width: 350px;
            text-align: center;
            position: relative;
        }

        .step-number {
            width: 60px;
            height: 60px;
            background: var(--gradient-main);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 28px;
            font-weight: 900;
            margin: 0 auto 20px;
        }

        .step h3 {
            font-size: 20px;
            margin-bottom: 10px;
            color: var(--turquoise);
        }

        .step p {
            opacity: 0.8;
        }

        /* CENOVNIK */
        .pricing-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
            gap: 30px;
            max-width: 1000px;
            margin: 0 auto;
        }

        .price-card {
            background: rgba(255, 255, 255, 0.05);
            padding: 40px 30px;
            border-radius: 20px;
            border: 2px solid rgba(255, 255, 255, 0.1);
            transition: all 0.3s;
            position: relative;
        }

        .price-card.recommended {
            border-color: var(--turquoise);
            transform: scale(1.05);
            background: rgba(0, 229, 255, 0.1);
        }

        .recommended-badge {
            position: absolute;
            top: -15px;
            left: 50%;
            transform: translateX(-50%);
            background: var(--turquoise);
            color: var(--black);
            padding: 5px 20px;
            border-radius: 20px;
            font-weight: 700;
            font-size: 14px;
        }

        .price-card:hover {
            transform: translateY(-10px) scale(1.02);
            border-color: var(--purple);
        }

        .price-card h3 {
            font-size: 28px;
            margin-bottom: 10px;
            color: var(--turquoise);
        }

        .price {
            font-size: 48px;
            font-weight: 900;
            margin: 20px 0;
            background: var(--gradient-main);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }

        .price-features {
            list-style: none;
            margin: 30px 0;
            text-align: left;
        }

        .price-features li {
            padding: 10px 0;
            border-bottom: 1px solid rgba(255, 255, 255, 0.1);
        }

        .price-features li:before {
            content: "✓";
            color: var(--turquoise);
            font-weight: 900;
            margin-right: 10px;
        }

        /* GALERIJA */
        .gallery-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 20px;
        }

        .gallery-item {
            aspect-ratio: 4/3;
            background: rgba(255, 255, 255, 0.1);
            border-radius: 15px;
            overflow: hidden;
            position: relative;
            cursor: pointer;
            transition: transform 0.3s;
        }

        .gallery-item:hover {
            transform: scale(1.05);
        }

        .gallery-placeholder {
            width: 100%;
            height: 100%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 48px;
            opacity: 0.3;
        }

        /* TESTIMONIJALI */
        .testimonials {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 30px;
        }

        .testimonial {
            background: rgba(255, 255, 255, 0.05);
            padding: 30px;
            border-radius: 15px;
            border-left: 4px solid var(--turquoise);
        }

        .testimonial-text {
            font-style: italic;
            margin-bottom: 15px;
            line-height: 1.8;
        }

        .testimonial-author {
            color: var(--turquoise);
            font-weight: 700;
        }

        /* FINALNI CTA */
        .final-cta {
            text-align: center;
            background: var(--gradient-main);
            padding: 100px 20px;
            border-radius: 30px;
            margin: 50px 0;
        }

        .final-cta h2 {
            font-size: clamp(32px, 5vw, 56px);
            margin-bottom: 30px;
        }

        /* FOOTER */
        footer {
            background: rgba(0, 0, 0, 0.5);
            padding: 60px 0 30px;
            border-top: 1px solid rgba(255, 255, 255, 0.1);
        }

        .footer-content {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 40px;
            margin-bottom: 40px;
        }

        .footer-section h3 {
            color: var(--turquoise);
            margin-bottom: 20px;
        }

        .footer-section p, .footer-section a {
            opacity: 0.8;
            line-height: 2;
            color: var(--white);
            text-decoration: none;
        }

        .footer-section a:hover {
            color: var(--turquoise);
        }

        .social-links {
            display: flex;
            gap: 15px;
            margin-top: 15px;
        }

        .social-link {
            width: 40px;
            height: 40px;
            background: rgba(255, 255, 255, 0.1);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            transition: all 0.3s;
        }

        .social-link:hover {
            background: var(--turquoise);
            color: var(--black);
        }

        .footer-bottom {
            text-align: center;
            padding-top: 30px;
            border-top: 1px solid rgba(255, 255, 255, 0.1);
            opacity: 0.6;
        }

        /* STICKY CTA MOBILE */
        .sticky-cta {
            display: none;
            position: fixed;
            bottom: 0;
            left: 0;
            right: 0;
            padding: 15px;
            background: rgba(11, 11, 11, 0.95);
            backdrop-filter: blur(10px);
            border-top: 1px solid rgba(255, 255, 255, 0.1);
            z-index: 999;
        }

        /* RESPONSIVE */
        @media (max-width: 768px) {
            .nav-links {
                display: none;
            }

            .cta-buttons {
                flex-direction: column;
            }

            .btn {
                width: 100%;
            }

            .hero-benefits {
                flex-direction: column;
                gap: 20px;
            }

            section {
                padding: 60px 0;
            }

            .sticky-cta {
                display: block;
            }

            .price-card.recommended {
                transform: scale(1);
            }
        }

        /* ANIMACIJE */
        @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translateY(30px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .fade-in {
            animation: fadeInUp 0.8s ease-out;
        }
    </style>
</head>
<body>
<!-- HEADER -->
<header>
    <nav class="container">
        <div class="logo">GYMNAME</div>
        <ul class="nav-links">
            <li><a href="#ponuda">Ponuda</a></li>
            <li><a href="#cenovnik">Cenovnik</a></li>
            <li><a href="#raspored">Raspored</a></li>
            <li><a href="#kontakt">Kontakt</a></li>
        </ul>
    </nav>
</header>

<!-- HERO SEKCIJA -->
<section class="hero">
    <div class="container">
        <div class="hero-content fade-in">
            <h1>Tvoja nova rutina počinje ovde.</h1>
            <h2>Moderna teretana za snagu, kondiciju i rezultate — bez izgovora.</h2>

            <div class="cta-buttons">
                <a href="#kontakt" class="btn btn-primary">Probni trening</a>
                <a href="#cenovnik" class="btn btn-secondary">Cenovnik</a>
            </div>

            <div class="hero-benefits">
                <div class="benefit-item">
                    <div class="benefit-icon">✓</div>
                    <span>Savremene sprave</span>
                </div>
                <div class="benefit-item">
                    <div class="benefit-icon">✓</div>
                    <span>Kardio & zona snage</span>
                </div>
                <div class="benefit-item">
                    <div class="benefit-icon">✓</div>
                    <span>Podrška trenera</span>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- STA NUDIMO -->
<section id="ponuda">
    <div class="container">
        <h2 class="section-title">Sve što ti je potrebno na jednom mestu</h2>

        <div class="services-grid">
            <div class="service-card">
                <div class="service-icon">🏃</div>
                <h3>Kardio zona</h3>
                <p>Trake, bicikli i sprave za poboljšanje kondicije i sagorevanje kalorija.</p>
            </div>

            <div class="service-card">
                <div class="service-icon">💪</div>
                <h3>Zona snage</h3>
                <p>Tegovi i sprave za razvoj snage, mase i stabilnosti.</p>
            </div>

            <div class="service-card">
                <div class="service-icon">👥</div>
                <h3>Grupni treninzi</h3>
                <p>Vođeni treninzi koji motivišu i donose rezultate.</p>
            </div>

            <div class="service-card">
                <div class="service-icon">🎯</div>
                <h3>Personalni treneri</h3>
                <p>Stručna podrška i individualni planovi treninga.</p>
            </div>
        </div>
    </div>
</section>

<!-- KAKO POCETI -->
<section>
    <div class="container">
        <h2 class="section-title">Počni bez stresa</h2>

        <div class="steps">
            <div class="step">
                <div class="step-number">1</div>
                <h3>Dođi na probni trening</h3>
                <p>Zakažи бесплатан probni trening i upoznaj se sa našim prostorom.</p>
            </div>

            <div class="step">
                <div class="step-number">2</div>
                <h3>Upoznaj prostor i tim</h3>
                <p>Naši treneri će ti pokazati sve i odgovoriti na tvoja pitanja.</p>
            </div>

            <div class="step">
                <div class="step-number">3</div>
                <h3>Izaberi članarinu</h3>
                <p>Odaberi paket koji najbolje odgovara tvojim potrebama i ciljevima.</p>
            </div>
        </div>
    </div>
</section>

<!-- RASPORED -->
<section id="raspored" style="background: rgba(255, 255, 255, 0.03); padding: 80px 0;">
    <div class="container" style="text-align: center;">
        <h2 class="section-title">Raspored treninga</h2>
        <p style="margin-bottom: 30px; opacity: 0.8; font-size: 18px;">Svaki dan nudimo različite treninge i termine.</p>
        <a href="#" class="btn btn-secondary">Pogledaj raspored treninga</a>
    </div>
</section>

<!-- CENOVNIK -->
<section id="cenovnik">
    <div class="container">
        <h2 class="section-title">Jednostavne i jasne članarine</h2>

        <div class="pricing-grid">
            <div class="price-card">
                <h3>Basic</h3>
                <div class="price">2.500 RSD</div>
                <ul class="price-features">
                    <li>Korišćenje teretane</li>
                    <li>Neograničen broj dolazaka</li>
                    <li>Pristup kardio zoni</li>
                    <li>Pristup zoni snage</li>
                </ul>
                <a href="#kontakt" class="btn btn-secondary" style="width: 100%;">Izaberi</a>
            </div>

            <div class="price-card recommended">
                <span class="recommended-badge">Preporučeno</span>
                <h3>Standard</h3>
                <div class="price">3.500 RSD</div>
                <ul class="price-features">
                    <li>Sve iz Basic paketa</li>
                    <li>Grupni treninzi</li>
                    <li>Fleksibilni termini</li>
                    <li>Online rezervacije</li>
                </ul>
                <a href="#kontakt" class="btn btn-primary" style="width: 100%;">Izaberi</a>
            </div>

            <div class="price-card">
                <h3>Premium</h3>
                <div class="price">5.500 RSD</div>
                <ul class="price-features">
                    <li>Sve iz Standard paketa</li>
                    <li>Personalni trener</li>
                    <li>Individualni plan</li>
                    <li>Praćenje napretka</li>
                </ul>
                <a href="#kontakt" class="btn btn-secondary" style="width: 100%;">Izaberi</a>
            </div>
        </div>
    </div>
</section>

<!-- GALERIJA -->
<section>
    <div class="container">
        <h2 class="section-title">Pogledaj kako izgleda naš prostor</h2>

        <div class="gallery-grid">
            <div class="gallery-item">
                <div class="gallery-placeholder">🏋️</div>
            </div>
            <div class="gallery-item">
                <div class="gallery-placeholder">🏃</div>
            </div>
            <div class="gallery-item">
                <div class="gallery-placeholder">💪</div>
            </div>
            <div class="gallery-item">
                <div class="gallery-placeholder">🎯</div>
            </div>
        </div>
    </div>
</section>

<!-- TRENERI -->
<section style="background: rgba(255, 255, 255, 0.03);">
    <div class="container">
        <h2 class="section-title">Naš tim</h2>
        <p style="text-align: center; margin-bottom: 40px; opacity: 0.8; font-size: 18px; max-width: 600px; margin-left: auto; margin-right: auto;">
            Naši treneri su tu da ti pomognu da treniraš pravilno, sigurno i efikasno.
        </p>
        <div style="text-align: center;">
            <a href="#" class="btn btn-secondary">Upoznaj tim</a>
        </div>
    </div>
</section>

<!-- TESTIMONIJALI -->
<section>
    <div class="container">
        <h2 class="section-title">Zašto nas članovi biraju</h2>

        <div class="testimonials">
            <div class="testimonial">
                <p class="testimonial-text">"Prvi put sam ostao dosledan treningu. Atmosfera i podrška su odlični."</p>
                <p class="testimonial-author">— Marko, 32</p>
            </div>

            <div class="testimonial">
                <p class="testimonial-text">"Konačno sam pronašla teretanu gde se osećam prijatno. Treneri su strpljivi i profesionalni."</p>
                <p class="testimonial-author">— Ana, 28</p>
            </div>

            <div class="testimonial">
                <p class="testimonial-text">"Najbolja odluka ove godine. Rezultati su vidljivi, a motivacija je na maksimumu!"</p>
                <p class="testimonial-author">— Stefan, 35</p>
            </div>
        </div>
    </div>
</section>

<!-- FINALNI CTA -->
<section>
    <div class="container">
        <div class="final-cta">
            <h2>Spreman za prvi korak?</h2>
            <a href="#kontakt" class="btn btn-primary" style="font-size: 20px; padding: 20px 50px;">Probni trening</a>
        </div>
    </div>
</section>

<!-- FOOTER -->
<footer id="kontakt">
    <div class="container">
        <div class="footer-content">
            <div class="footer-section">
                <h3>GYMNAME</h3>
                <p>Tvoja nova rutina počinje ovde.</p>
                <div class="social-links">
                    <a href="#" class="social-link">📘</a>
                    <a href="#" class="social-link">📷</a>
                    <a href="#" class="social-link">▶️</a>
                </div>
            </div>

            <div class="footer-section">
                <h3>Radno vreme</h3>
                <p>Ponedeljak - Petak: 06:00 - 23:00</p>
                <p>Subota - Nedelja: 08:00 - 22:00</p>
            </div>

            <div class="footer-section">
                <h3>Kontakt</h3>
                <p>📍 Adresa Teretane 123, Grad</p>
                <p>📞 +381 60 123 4567</p>
                <p>✉️ info@gymname.rs</p>
            </div>

            <div class="footer-section">
                <h3>Brzi linkovi</h3>
                <p><a href="#ponuda">Ponuda</a></p>
                <p><a href="#cenovnik">Cenovnik</a></p>
                <p><a href="#raspored">Raspored</a></p>
            </div>
        </div>

        <div class="footer-bottom">
            <p>&copy; 2026 GYMNAME. Sva prava zadržana.</p>
        </div>
    </div>
</footer>

<!-- STICKY CTA MOBILE -->
<div class="sticky-cta">
    <a href="#kontakt" class="btn btn-primary" style="width: 100%;">Probni trening</a>
</div>

<script>
    // Smooth scroll
    document.querySelectorAll('a[href^="#"]').forEach(anchor => {
        anchor.addEventListener('click', function (e) {
            e.preventDefault();
            const target = document.querySelector(this.getAttribute('href'));
            if (target) {
                target.scrollIntoView({
                    behavior: 'smooth',
                    block: 'start'
                });
            }
        });
    });

    // Fade in on scroll
    const observerOptions = {
        threshold: 0.1,
        rootMargin: '0px 0px -100px 0px'
    };

    const observer = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                entry.target.style.opacity = '1';
                entry.target.style.transform = 'translateY(0)';
            }
        });
    }, observerOptions);

    document.querySelectorAll('.service-card, .step, .price-card, .testimonial').forEach(el => {
        el.style.opacity = '0';
        el.style.transform = 'translateY(30px)';
        el.style.transition = 'all 0.6s ease-out';
        observer.observe(el);
    });
</script>
</body>
</html>
