@include('layouts.partials.head')
@include('layouts.partials.navbar')
@include('layouts.partials.sidebar')

<div class="content-wrapper">
    @yield('content')
</div>

@include('layouts.partials.footer')
@include('layouts.partials.scripts')
