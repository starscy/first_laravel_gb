@extends('layouts.main')
@section('content')

    <div class="container">
        <div class="card my-4 mx-auto px-0 col-lg-6 col-sm-12">
            <div class="card-body">
                <h4 class="card-title mb-4 text-center">Авторизация</h4>

                <div class="alert alert-danger" role="alert">
                    Неверный логин или пароль.
                </div>

                <form method="POST" action="{{ route('login') }}">
                    @csrf
                    <div class="form-group">
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text"> <i class="fa fa-fingerprint"></i> </span>
                            </div>
                            <input id="email" type="email" name="email" class="form-control" placeholder="email" type="text">
                        </div>
                    </div>
                    <div class="form-group">
                        <div class=" input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fa fa-lock"></i></span>
                            </div>
                            <input id="password"  name="password" class="form-control" placeholder="Пароль" type="password">
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" id="rememberMeCheckbox">
                            <label class="form-check-label" for="rememberMeCheckbox">Запомнить меня на этом
                                компьютере</label>
                        </div>
                    </div>

                    <div class="form-group">
                        <button type="submit" class="btn btn-primary btn-block">Войти</button>
                    </div>

                    <p class="text-center"><a href="#">Забыли пароль?</a></p>
                    <p class="text-center">Впервые на сайте? <a href="{{route('register')}}">Зарегистрируйтесь</a></p>
                </form>
            </div>
        </div>
    </div>

@endsection
