@extends('layouts.main')
@section('content')

    <div class="container">
        <div class="card my-4 mx-auto px-0 col-lg-6 col-sm-12">
            <div class="card-body">
                <h4 class="card-title mb-4 text-center">{{__('Register')}}</h4>

                <div class="alert alert-danger" role="alert">
                    При попытке регистрации возникла ошибка
                </div>

                <form method="POST" action="{{ route('register') }}">
                    @csrf
                    <div class="form-group input-group">
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text"> <i class="fa fa-user"></i> </span>
                            </div>
                            <input id="name" name="name" class="form-control is-invalid" placeholder="Ваше имя" type="text">
                            @error('name')
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text"> <i class="fa fa-fingerprint"></i> </span>
                            </div>
                            <input id="login" name="login" class="form-control" placeholder="Ваш логин" type="text">
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text"> <i class="fa fa-envelope"></i> </span>
                            </div>
                            <input id="email" name="email" class="form-control" placeholder="Ваш Email" type="email">
                            @error('email')
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group">
                        <div class=" input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fa fa-lock"></i></span>
                            </div>
                            <input id="password" name="password" class="form-control" placeholder="Введите пароль" type="password">
                        </div>
                        @error('password')
                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fa fa-lock"></i></span>
                            </div>
                            <input id="password-confirm" name="password-confirm" class="form-control" placeholder="Повторите пароль" type="password">
                        </div>
                    </div>


{{--                    <div class="form-group">--}}
{{--                        <label class="label" for="captchaWordField">Введите слово с картинки</label>--}}
{{--                        <div class="mb-2"><img src="https://via.placeholder.com/180x40?text=CaPtCHa" alt=""></div>--}}
{{--                        <input name="" class="form-control" type="text" id="captchaWordField" placeholder="...">--}}
{{--                    </div>--}}

                    <div class="form-group">
                        <button type="submit" class="btn btn-primary btn-block">{{ __('Register') }}</button>
                    </div>

                    <p class="text-center">Уже зарегистрированы? <a href="{{route('login')}}">{{__('Auth')}}</a></p>
                </form>
            </div>
        </div>
    </div>

@endsection
