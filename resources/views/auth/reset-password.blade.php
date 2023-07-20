@extends('layouts.main')
@section('content')

    <div class="container">
        <div class="card my-4 mx-auto px-0 col-lg-6 col-sm-12">
            <div class="card-body">
                <h4 class="card-title mb-4 text-center">{{__("New password")}}</h4>
                <form method="POST" action="{{ route('password.update') }}">
                    @csrf
                    <input type="hidden" name="token" value="{{$request->token}}">
                    <div class="form-group">
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text"> <i class="fa fa-fingerprint"></i> </span>
                            </div>
                            <input id="email" type="email" name="email" value="{{ old('email', $request->email)}}"
                                   class="form-control" placeholder="email">
                        </div>
                        @error('email')
                        <code class="red">{{ $message }}</code>
                        @enderror
                    </div>
                    <div class="form-group">
                        <div class=" input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fa fa-lock"></i></span>
                            </div>
                            <input id="password" name="password" class="form-control" placeholder="Пароль"
                                   type="password">
                        </div>
                        @error('password')
                        <code class="red">{{ $message }}</code>
                        @enderror
                    </div>
                    <div class="form-group">
                        <div class=" input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fa fa-lock"></i></span>
                            </div>
                            <input id="password_confirmation" name="password_confirmation" class="form-control"
                                   placeholder="Подвердите пароль" type="password">
                        </div>
                        @error('password_confirmation')
                        <code class="red">{{ $message }}</code>
                        @enderror
                    </div>

                    <div class="form-group">
                        <button type="submit" class="btn btn-primary btn-block">{{__("Create")}}</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

@endsection
