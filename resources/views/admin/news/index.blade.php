@extends('layouts.admin')
@section('content')

    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Новости</h1>
        <div class="btn-toolbar mb-2 mb-md-0">
            <div class="btn-group me-2">
                <a href="{{ route('admin.news.create')}}" class="btn btn-sm btn-outline-secondary">Добавить новость</a>
            </div>
        </div>
    </div>

    <div class="album py-5 bg-body-tertiary">
        <div class="container">
            <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
                @foreach($news as $arItem)
                <div class="col">
                    <div class="card shadow-sm">
                        <div class="card-body">
                            <h2 class="card-text">ID: {{$arItem['id']}}</h2>
                            <h2 class="card-text">{{$arItem['title']}}</h2>
                            <p class="card-text">{{$arItem['description']}}</p>
                            <p class="card-text">{{$arItem['source_id']}}</p>
                            <div class="d-flex justify-content-between align-items-center">
                                <div class="btn-group">
                                    <a href="{{route('admin.news.edit', $arItem->id)}}" class="btn btn-sm btn-outline-secondary">edit</a>
                                    <form action="{{route('admin.news.destroy', $arItem->id)}}" method="post">
                                        @csrf
                                        @method('delete')
{{--                                    <a href="{{route('admin.news.destroy', $arItem->id)}}" class="btn btn-sm btn-outline-danger">delete</a>--}}
                                        <input type="submit" value="delete" class="btn btn-danger">
                                    </form>
                                </div>
                                <small class="text-body-secondary">9 mins</small>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>


@endsection
