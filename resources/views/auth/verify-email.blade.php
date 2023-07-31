@extends('layouts.admin')
@section('content')
    <div>
    <h1>Verify email address</h1>
    <p>You must verify your address to access this page.</p>
    <form method="POST" action="{{route('verification.send')}}">
        @csrf
        <button type="submit" class="btm btn-primary">Resent verification email</button>
    </form>
    </div>
@endsection
