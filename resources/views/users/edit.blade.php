@extends('layouts.adminlte')

@section('content')
    <div class="content-header">
        <h1>Izmena korisnika</h1>
    </div>

    <div class="content">
        <div class="container-fluid">
            <form action="{{ route('users.update', $user) }}" method="POST">
                @csrf
                @method('PUT')
                @include('users._form', ['user' => $user])
            </form>
        </div>
    </div>
@endsection
