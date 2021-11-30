@extends('layouts.main')
@section('title','registration')
@section('content')

<main class="form-signin">
    <form action="/reg" method="post">
    {{ csrf_field() }}
        
        <h1 style="color: #fff;" class="h3 mb-3 fw-normal">Please sign up</h1>

@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

        <div class="form-floating">
            <input name="email" type="email" class="form-control" id="floatingInput" placeholder="name@example.com">
            <label for="floatingInput">Email address</label>
        </div>
        <div class="form-floating">
            <input name="password" type="password" class="form-control" id="floatingPassword" placeholder="Password">
            <label for="floatingPassword">Password</label>
        </div>

        <button class="w-100 btn btn-lg btn-info button" type="submit">Sign up</button>
        <a style="margin-top: 10px;" href = "/login" class="w-100 btn btn-lg btn-info button">Login</a>
        <p class="mt-5 mb-3 text-muted">&copy; copyrating by Spr1gan</p>
    </form>
</main>

@endsection