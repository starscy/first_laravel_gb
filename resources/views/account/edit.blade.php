@extends('layouts.main')
@section('content')

    <div class="card card-primary">
        <div class="card-header">
            <h3 class="card-title">Редактирование профиля</h3>
        </div>
        <!-- /.card-header -->
        <!-- form start -->

        <form method="post" action="{{route('user-profile-information.update')}}">
            @csrf
            @method('PUT')
            <div class="card-body">
                <div class="form-group">
                    @error('name')
                    <code class="red">{{ $message }}</code>
                    @enderror
                    <label for="exampleInputName1">Имя профиля</label>
                    <input name="name" type="text" value="{{$user->name}}" class="form-control" id="exampleInputName1"
                           placeholder="Enter name">
                </div>
                <div class="form-group">
                    @error('email')
                    <code class="red">{{ $message }}</code>
                    @enderror
                    <label for="exampleInputEmail1">Email address</label>
                    <input name="email" type="email" value="{{$user->email}}" class="form-control"
                           id="exampleInputEmail1" placeholder="Enter email">
                </div>
{{--                <div class="form-group">--}}
{{--                    <label for="exampleInputPassword1">Текущий пароль</label>--}}
{{--                    <input name="current_password" type="password" value="{{$user->password}}" class="form-control"--}}
{{--                           id="current_password" placeholder="Password">--}}
{{--                </div>--}}
{{--                <div class="form-group">--}}
{{--                    <label for="exampleInputPassword1">Новый пароль</label>--}}
{{--                    <input name="password" type="password" value="{{$user->password}}" class="form-control"--}}
{{--                           id="password" placeholder="Password">--}}
{{--                </div>--}}
            </div>
{{--            <a href="{{ route('password.reset') }}">Сменить пароль</a>--}}

            <!-- /.card-body -->
            <div class="card-footer">
                <button type="submit" class="btn btn-primary">{{__('Submit')}}</button>
            </div>
        </form>
    </div>

@endsection
