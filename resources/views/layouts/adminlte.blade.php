<!DOCTYPE html>
<html lang="sr">

<head>
    @include('layouts.partials.head')
</head>

<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">

    {{-- NAVBAR --}}
    @include('layouts.partials.navbar')

    {{-- SIDEBAR --}}
    @include('layouts.partials.sidebar')

    {{-- MAIN CONTENT --}}
    <div class="content-wrapper">
        <section class="content pt-3">
            @yield('content')
        </section>
    </div>

    {{-- FOOTER --}}
    @include('layouts.partials.footer')

</div>

{{-- SCRIPTS --}}
@include('layouts.partials.scripts')

</body>
</html>
