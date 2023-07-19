@extends('layouts.main')
@section('content')

    <x-main.carousel/>
    <div class="container">

        <h1 class="my-4">О динозаврах</h1>

        <div class="row">
            @foreach($news as $arItem)
                <div class="col-lg-4 col-sm-6 portfolio-item">
                    <div class="card h-100">
                        <a href="{{route('news.show', $arItem)}}"><img class="card-img-top"
                                                                       src="{{asset($arItem->image)}}"
                                                                       alt="{{$arItem->title}}"></a>
                        <div class="card-body">
                            <h4 class="card-title">
                                <a href="{{route('news.show', $arItem)}}">{{$arItem->title}}</a>
                            </h4>
                            <p class="card-text">{{$arItem->description}}</p>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
        <div class="row mb-4 justify-content-center">
            <div class="col-md-4">
                <a class="btn btn-lg btn-outline-primary btn-block" href="{{route('news.index')}}">Все динозавры</a>
            </div>
        </div>
        <hr>
        <div class="row">
            <div class="col-lg-6">
                <h2>Обжорозаврик <i class="fas fa-dragon"></i> - это круто</h2>
                <p>На нашем сайте вы можете:</p>
                <ul>
                    <li>
                        <strong>Приютить динозаврика</strong>
                    </li>
                    <li>Узнать о динозаврах побольше</li>
                    <li>Поделится интересным</li>
                    <li>Почитать об историях о домашних динозаврах</li>
                    <li>Купить своему динозаврику покушать или кроватку</li>
                </ul>
                <p>Польный каталог динозавров. Огромный магазин товаров для динозваров. Дружелюбное сообщество любителей
                    динозавров. И свой приют для динозавров - все это <strong>Обжорозаврик</strong>.</p>
            </div>
            <div class="col-lg-6 text-center">
                <img class="img full-width" src="images/zavri.jpg" alt="Обжорозаврик" width="300" height="300">
            </div>
        </div>
        <hr>
        <h2>Последнее в блоге</h2>
        <div class="row">
            <div class="col-lg-4 mb-4">
                <div class="card h-100">
                    <h4 class="card-header">Хищный или травоядный</h4>
                    <div class="card-body">
                        <h6 class="card-subtitle mb-2 text-muted">Мнение эксперта</h6>
                        <p class="card-text">Вопрос: какого динозаврика взять хищного или травоядного - самый острый при
                            выборе своего питомца. Как не ошибиться с выбром и взять подходящего для себя малыша,
                            рассказывают эксперты.</p>
                        <small class="mt-2 text-muted">Опубликовано вчера</small>
                    </div>
                    <div class="card-footer">
                        <a href="blog-post.html" class="btn btn-primary">Подробнее</a>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 mb-4">
                <div class="card h-100">
                    <h4 class="card-header">Велоцираптор Веган</h4>
                    <div class="card-body">
                        <h6 class="card-subtitle mb-2 text-muted">Разное</h6>
                        <p class="card-text">Всякое бывает. Наш велоцираптор ни в какую не хочет кушать мясо. Ни птицу,
                            ни рыбу, вообще ни кусочка. Любит кашу и брокколи. Мы уже давно смирились с этим, а в этой
                            статье я оставлю несколько советов, что делать в такой ситуации.</p>
                        <small class="mt-2 text-muted">Опубликовано вчера</small>
                    </div>
                    <div class="card-footer">
                        <a href="blog-post.html" class="btn btn-primary">Подробнее</a>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 mb-4">
                <div class="card h-100">
                    <h4 class="card-header">Когда у динозаврика режутся зубки</h4>
                    <div class="card-body">
                        <h6 class="card-subtitle mb-2 text-muted">Воспитание</h6>
                        <p class="card-text">Когда у вашего динозаврика режутся зубки, это очень тяжелый период как для
                            малыша, так и для вас. Убирайте все, что можно грызть. Потому что погрызано будет все. И
                            главное: терпение, терпение и еще раз терпение.</p>
                        <small class="mt-2 text-muted">Опубликовано вчера</small>
                    </div>
                    <div class="card-footer">
                        <a href="blog-post.html" class="btn btn-primary">Подробнее</a>
                    </div>
                </div>
            </div>
        </div>

        <div class="row mb-4 justify-content-center">
            <div class="col-md-4">
                <a class="btn btn-lg btn-outline-primary btn-block" href="blog.html">Перейти в блог</a>
            </div>
        </div>

    </div>

@endsection
