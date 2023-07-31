@extends('layouts.admin')
@section('content')

    <div class="card card-primary">
        <div class="card-header">
            <h3 class="card-title">Редактирование профиля из админки</h3>
        </div>
        <!-- /.card-header -->
        <!-- form start -->

        <form method="post" action="{{route('admin.users.update', $user->id)}}">
            @method('PUT')
            @include('admin.users.partials.form')
        </form>
    </div>

@endsection
