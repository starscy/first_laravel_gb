@extends('layouts.main')
@section('content')
    <h1 class="mt-4 mb-3">Динозавры</h1>
    <ol class="breadcrumb">
        <li class="breadcrumb-item">
            <a href="index.html">Главная</a>
        </li>
        <li class="breadcrumb-item active">Динозавры</li>
    </ol>
    <div class="row">
        <div class="col-lg-12">
            <div class="mb-4">
                <div class="input-group mb-3">
                    <input type="text" class="form-control" placeholder="Поиск...">
                    <div class="input-group-append">
                        <button class="btn btn-outline-secondary" type="button"><i class="fas fa-search"></i></button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        @foreach ($news as $newsItem)
            <div class="col-lg-6 portfolio-item">
                <div class="card h-100">
                    <a href="{{route('news.show', ['id' => $newsItem->id])}}"><img class="card-img-top" src="images/dinosaurs/tirannozavr.jpg" alt="Тираннозавр"></a>
                    <div class="card-body">
                        <h4 class="card-title">
                            <a href="{{route('news.show', ['id' => $newsItem->id])}}">{{$newsItem->title}}</a>
                        </h4>
                        <p class="card-text">{{$newsItem->description}}</p>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
    <ul class="pagination justify-content-center">
        <li class="page-item">
            <a class="page-link" href="#" aria-label="Назад">
                <span aria-hidden="true">&laquo;</span>
                <span class="sr-only">Назад</span>
            </a>
        </li>
        <li class="page-item">
            <a class="page-link" href="#">1</a>
        </li>
        <li class="page-item">
            <a class="page-link" href="#">2</a>
        </li>
        <li class="page-item">
            <a class="page-link" href="#">3</a>
        </li>
        <li class="page-item">
            <a class="page-link" href="#" aria-label="Вперед">
                <span aria-hidden="true">&raquo;</span>
                <span class="sr-only">Вперед</span>
            </a>
        </li>
    </ul>
@endsection



