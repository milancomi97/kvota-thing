@extends('layouts.public')

@push('styles')
    <style>
        /* Hero sekcija */
        .hero {
            background: linear-gradient(135deg, #6a11cb 0%, #2575fc 100%);
            color: #fff;
            padding: 100px 0;
        }
        .hero .btn-hero {
            background-color: #ffffff;
            color: #2575fc;
            border: 2px solid #ffffff;
            transition: background .3s, color .3s;
        }
        .hero .btn-hero:hover {
            background-color: rgba(255,255,255,0.9);
            color: #1a1a1a;
        }

        .feature-icon {
            font-size: 3rem;
            color: #2575fc;
        }
        .feature-icon-secondary{
            font-size: 3rem;
            color: #6a11cb;
        }
        .feature-card {
            transition: transform .3s, box-shadow .3s;
        }
        .feature-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 8px 30px rgba(0,0,0,0.1);
        }

        /* Form section */
        .question-form .form-control {
            border-radius: 50px;
            padding: 15px 20px;
            border: 2px solid #2575fc;
        }
        .question-form .btn-question {
            background-color: #2575fc;
            color: #fff;
            border-radius: 50px;
            padding: 12px 30px;
            transition: background .3s;
        }
        .question-form .btn-question:hover {
            background-color: #1a4fb7;
        }
        /* PARTICIPATION SECTION */
        .participation-section {
            position: relative;
            background: linear-gradient(
                rgba(255,255,255,0.85),
                rgba(255,255,255,0.85)
            ),
            url('/images/gallery-bg.jpg') center/cover no-repeat;
            border-radius: 16px;
            margin: 40px 0;
        }

        .participation-section .overlay {
            /* opcionalno: blagi šum ili uzorak */
            position: absolute;
            top:0; left:0; right:0; bottom:0;
            background: rgba(0,0,0,0.02);
            border-radius: 16px;
        }

        .participation-section .content {
            position: relative;
            z-index: 1;
        }

        .participation-section h3 {
            color: #6a11cb;
            font-size: 2rem;
            font-weight: 600;
        }

        .participation-section p {
            color: #555;
            font-size: 1.1rem;
        }

        .participation-section .form-control {
            border: 2px solid #6a11cb;
            box-shadow: none;
        }

        .participation-section .form-control:focus {
            border-color: #2575fc;
            box-shadow: 0 0 0 0.2rem rgba(37,117,252,0.25);
        }

        .btn-gradient {
            background: linear-gradient(45deg, #6a11cb, #2575fc);
            border: none;
            color: #fff;
            border-radius: 50px;
            padding: 12px 30px;
            transition: transform .3s, box-shadow .3s;
        }
        .btn-gradient:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 20px rgba(0,0,0,0.15);
        }

    </style>
@endpush

@section('content-landing')
    <!-- Hero -->

    <section class="hero text-center animate__animated animate__fadeIn">
        <div class="container">
            <h1 class="display-4 fw-bold">Dobrodošli u CodeGalerija</h1>
            <p class="lead mb-4">Vaša pametna platforma za organizaciju i deljenje fotografija sa svih događaja – od svadbi, preko krštenja, do rođendana.</p>
{{--            <a href="{{ route('events.create') }}" class="btn btn-hero btn-lg">Kreirajte svoj prvi događaj</a>--}}
             <a href="#" class="btn btn-hero btn-lg">Kreirajte svoj prvi događaj</a>

        </div>
    </section>

    <!-- Features -->
    <section class="py-5">
        <div class="container">
            <div class="row g-4">
                <div class="col-md-3 text-center animate__animated animate__fadeInUp">
                    <div class="card feature-card p-3 h-100 border-0">
                        <i class="fas fa-calendar-alt feature-icon"></i>
                        <h5 class="mt-3">Planiranje događaja</h5>
                        <p>Kreirajte i prilagodite stranice za svadbe, krštenja, punoletstva ili bilo koju proslavu.</p>
                    </div>
                </div>
                <div class="col-md-3 text-center animate__animated animate__fadeInUp animate__delay-1s">
                    <div class="card feature-card p-3 h-100 border-0">
                        <i class="fas fa-qrcode feature-icon-secondary"></i>
                        <h5 class="mt-3">QR kod za goste</h5>
                        <p>Svakom događaju generišite jedinstveni QR kod koji gosti skeniraju da bi slali svoje uspomene.</p>
                    </div>
                </div>
                <div class="col-md-3 text-center animate__animated animate__fadeInUp animate__delay-2s">
                    <div class="card feature-card p-3 h-100 border-0">
                        <i class="fas fa-upload feature-icon"></i>
                        <h5 class="mt-3">Lako slanje slika</h5>
                        <p>Gosti mogu instant da uploaduju do 5 fotografija odjednom, direktno sa svog telefona.</p>
                    </div>
                </div>
                <div class="col-md-3 text-center animate__animated animate__fadeInUp animate__delay-3s">
                    <div class="card feature-card p-3 h-100 border-0">
                        <i class="fas fa-check-circle feature-icon-secondary"></i>
                        <h5 class="mt-3">Moderacija i pregled</h5>
                        <p>Moderator pregleda i odobrava fotografije pre nego što se pojave u javnoj galeriji.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- About / Content Writer tekst -->
    <section class="bg-light py-5">
        <div class="container">
            <h2 class="text-center mb-4 animate__animated animate__fadeIn">Zašto CodeGalerija?</h2>
            <p class="mb-4 animate__animated animate__fadeIn animate__delay-1s">
                Bilo da planirate svadbu, krštenje ili rođendan, CodeGalerija vam omogućava da sve vaše uspomene sakupite na jednom mestu.
                Jednostavno kreirajte događaj, podelite QR kod sa gostima i pratite kako se galerija puni radostima i osmesima vaših dragih prijatelja i rodbine.
            </p>
            <p class="mb-4 animate__animated animate__fadeIn animate__delay-2s">
                Naša platforma štedi vam vreme i trud – nema više prebacivanja fotografija emailom ili čuvanja na USB-ju.
                Sve slike postaju kolektivna priča o vašem događaju, i to trenutno, sigurno i bezbedno.
            </p>

            <!-- Dugme za kreiranje događaja -->
            <div class="text-center animate__animated animate__fadeIn animate__delay-3s">
{{--                <a href="{{ route('events.create') }}" class="btn btn-hero btn-lg">Kreirajte svoj prvi događaj</a>--}}
            </div>

            <!-- Form za postavljanje pitanja -->
            <div class="question-form text-center mt-5 animate__animated animate__fadeInUp animate__delay-4s">
                <form action="#" method="POST" class="row g-2 justify-content-center">
                    @csrf

                    <!-- Obavezno polje za e-mail -->
                    <div class="col-md-4">
                        <input
                            type="email"
                            name="email"
                            class="form-control form-control-lg"
                            placeholder="Vaš e‑mail (obavezno)"
                            required
                        >
                    </div>

                    <!-- Polje za pitanje -->
                    <div class="col-md-4">
                        <input
                            type="text"
                            name="question"
                            class="form-control form-control-lg"
                            placeholder="Postavite pitanje"
                            required
                        >
                    </div>

                    <div class="col-auto">
                        <button type="submit" class="btn btn-question btn-lg">
                            Pošaljite pitanje
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </section>
    <!-- Učestvovali ste na događaju? -->
    <section class="participation-section text-center py-5">
        <div class="container position-relative">
            <div class="overlay"></div>
            <div class="content animate__animated animate__fadeInUp animate__delay-1s">
                <h3>Učestvovali ste na događaju?</h3>
                <p>Unesite šifru događaja da biste pogledali galeriju slika:</p>
                @error('token')
                <div class="text-danger mt-1">{{ $message }}</div>
                @enderror

                <form action="{{ route('events.gallery') }}" method="GET"
                      class="row justify-content-center g-2 mt-3">
                    @csrf
                    <div class="col-md-4">
                        <input type="text" name="token"
                               class="form-control form-control-lg rounded-pill"
                               placeholder="Šifra događaja" required>
                    </div>
                    <div class="col-auto">
                        <button type="submit" class="btn btn-lg btn-gradient">
                            <i class="fas fa-images me-2"></i> Pogledajte galeriju
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </section>


@endsection
