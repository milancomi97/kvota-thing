<!DOCTYPE html>
<html lang="sr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>{{ $event->naziv ?? config('app.name', 'KvotaThing') }}</title>

    <!-- Animate.css -->
    <link rel="stylesheet"
          href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>

    <!-- Bootstrap CSS (oba CDN‐a ili tvoj asset) -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css"
          rel="stylesheet">

    <!-- Font Awesome (opciono) -->
    <link rel="stylesheet"
          href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"/>
    <!-- Swiper CSS -->
    <link
        rel="stylesheet"
        href="https://unpkg.com/swiper@8/swiper-bundle.min.css"
    />
    {{-- GA4 gtag (dinamički) --}}
    @if(config('services.ga.enabled') && config('services.ga.measurement_id'))
        <!-- Google tag (gtag.js) -->
        <script async src="https://www.googletagmanager.com/gtag/js?id={{ config('services.ga.measurement_id') }}"></script>
        <script>
            window.dataLayer = window.dataLayer || [];
            function gtag(){dataLayer.push(arguments);}
            gtag('js', new Date());

            // Basic pageview
            gtag('config', '{{ config('services.ga.measurement_id') }}', {
                'anonymize_ip': true,
                'debug_mode': {{ app()->environment('local') ? 'true' : 'false' }},
            });

            // Primer: user id ako imaš auth
            @auth
            gtag('set', {'user_id': '{{ auth()->id() }}'});
            @endauth
        </script>
    @endif

    <style>
        /* USPORENO TRAJANJE ANIMACIJA */
        .animate__animated { --animate-duration: 1.2s; }

        body {
            background: linear-gradient(145deg,#f0f0f0,#ffffff);
            min-height: 100vh;
        }
        .upload-container {
            /*max-width: 600px;*/
            margin: 40px auto;
            background: #fff;
            border-radius: 16px;
            box-shadow: 0 4px 30px rgba(0,0,0,0.1);
            padding: 30px;
            position: relative;
        }
        .btn-upload {
            display: inline-block;
            background: linear-gradient(45deg, #6a11cb, #2575fc);
            color: #fff;
            padding: 12px 24px;
            border-radius: 50px;
            font-weight: 600;
            border: none;
            cursor: pointer;
            transition: transform .3s, box-shadow .3s;
        }
        .btn-upload:hover {
            transform: scale(1.05);
            box-shadow: 0 8px 20px rgba(0,0,0,0.15);
        }
        .footer {
            background: #1a1a1a;
        }
        .footer h5 {
            font-weight: 600;
        }
        .footer a:hover {
            color: #2575fc;
        }

    </style>

    @stack('styles')
</head>
<body>

@if(session('success'))
    <div class="container mt-4">
        <div class="alert alert-success animate__animated animate__fadeIn">
            {{ session('success') }}
        </div>
    </div>
@endif
<header class="logo-header py-3">
    <div class="container text-center">
        <a href="{{ url('/') }}">
        </a>
    </div>
</header>

@yield('content')
@yield('content-landing')

<!-- jQuery & Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

<!-- Nasumična Animate.css animacija za kontejner -->


<!-- ... postojeći sadržaj ... -->

@stack('scripts')
<!-- Swiper JS -->
<script src="https://unpkg.com/swiper@8/swiper-bundle.min.js"></script>

<!-- Footer -->
<!-- Footer -->
{{--<footer class="footer bg-dark text-light pt-5 pb-4">--}}
{{--    <div class="container">--}}
{{--        <div class="row">--}}

{{--            <!-- O nama -->--}}
{{--            <div class="col-md-3 mb-4">--}}
{{--                <h5 class="text-white">O nama</h5>--}}
{{--                <p>CodeGalerija je vaša platforma za prikupljanje i deljenje svih uspomena sa posebnih događaja – jednostavno, brzo i sigurno.</p>--}}
{{--            </div>--}}

{{--            <!-- Ostale usluge -->--}}
{{--            <div class="col-md-3 mb-4">--}}
{{--                <h5 class="text-white">Ostale usluge</h5>--}}
{{--                <ul class="list-unstyled">--}}
{{--                    <li><a href="#" class="text-light text-decoration-none">Razvoj aplikacija</a></li>--}}
{{--                    <li><a href="#" class="text-light text-decoration-none">Izrada websajtova</a></li>--}}
{{--                </ul>--}}
{{--            </div>--}}

{{--            <!-- Brzi linkovi -->--}}
{{--            <div class="col-md-3 mb-4">--}}
{{--                <h5 class="text-white">Brzi linkovi</h5>--}}
{{--                <ul class="list-unstyled">--}}
{{--                    <li><a href="{{ route('home') }}" class="text-light text-decoration-none">Početna</a></li>--}}
{{--                    <li><a href="{{ route('events.index') }}" class="text-light text-decoration-none">Svi događaji</a></li>--}}
{{--                    <li><a href="{{ route('login') }}" class="text-light text-decoration-none">Prijava</a></li>--}}
{{--                    <li><a href="{{ route('register') }}" class="text-light text-decoration-none">Registracija</a></li>--}}
{{--                    <li><a href="#" class="text-light text-decoration-none">Početna</a></li>--}}
{{--                    <li><a href="#" class="text-light text-decoration-none">Svi događaji</a></li>--}}
{{--                    <li><a href="#" class="text-light text-decoration-none">Prijava</a></li>--}}
{{--                    <li><a href="#" class="text-light text-decoration-none">Registracija</a></li>--}}
{{--                </ul>--}}
{{--            </div>--}}

{{--            <!-- Kontakt & društvene mreže -->--}}
{{--            <div class="col-md-3 mb-4">--}}
{{--                <h5 class="text-white">Kontakt</h5>--}}
{{--                <p><i class="fas fa-envelope me-2"></i><a href="mailto:info@codegalerija.rs" class="text-light">info@codegalerija.rs</a></p>--}}
{{--                <p><i class="fas fa-phone me-2"></i>+381 11 123 4567</p>--}}
{{--                <div class="mt-3">--}}
{{--                    <a href="#" class="text-light me-3"><i class="fab fa-facebook fa-lg"></i></a>--}}
{{--                    <a href="#" class="text-light me-3"><i class="fab fa-instagram fa-lg"></i></a>--}}
{{--                    <a href="#" class="text-light"><i class="fab fa-twitter fa-lg"></i></a>--}}
{{--                </div>--}}
{{--            </div>--}}

{{--        </div>--}}

{{--        <hr class="bg-secondary">--}}

{{--        <div class="row">--}}
{{--            <div class="col text-center">--}}
{{--                <small>© {{ date('Y') }} CodeGalerija. Sva prava zadržana.</small>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}
{{--</footer>--}}

</body>
</html>
