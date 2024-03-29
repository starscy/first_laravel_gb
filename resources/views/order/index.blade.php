@extends('layouts.main')
@section('content')

    <div class="container">

        <h1 class="mt-4 mb-3">Приют динозавров</h1>

        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="/">Главная</a>
            </li>
            <li class="breadcrumb-item active">Приют динозавриков</li>
        </ol>

        <div class="row">
            <div class="col-lg-6">
                <a href="images/dino_at_home.jpg" data-fancybox data-caption="Приют динозавриков">
                    <img class="img-fluid rounded mb-4" src="images/dino_at_home.jpg" alt="Приют динозавриков">
                </a>
            </div>
            <div class="col-lg-6">
                <h2>Возьми динозаврика домой</h2>
                <p>В нашем уникальном приюте найти себе друга - просто. Множество чудесных малышей ждут своего хозяина.</p>
                <p><strong>Как завести себе друга</strong></p>
                <ul>
                    <li>Выберите своего красавчика</li>
                    <li>Заполните форму обратной связи</li>
                    <li>Приезжайте знакомиться</li>
                </ul>
                <p>А если вы не готовы взять питомца домой, то вы можете поддержать наш приют, еда, припасы и теплые носочки, все пригодится нашим обжорозаврикам.</p>
            </div>
        </div>

        <h2>Динозаврики ищут дом</h2>

        <div class="row">
            <div class="col-lg-4 mb-4">
                <div class="card h-100 text-center">
                    <a href="images/shelter/marusya.jpg" data-fancybox data-caption="Маруся">
                        <img class="card-img-top p-2" src="images/shelter/marusya.jpg" alt="Маруся">
                    </a>
                    <div class="card-body">
                        <h4 class="card-title">Маруся</h4>
                        <h6 class="card-subtitle mb-2 text-muted">5 лет</h6>
                        <p class="card-text">Маруся специализируется на покушать и на платьицах. Как в нее влезает столько еды, и она остается стройной для своих платьев.</p>
                    </div>
                    <div class="card-footer">
                        <span class="badge badge-success">Ласковый</span>
                        <span class="badge badge-secondary">Обжорка</span>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 mb-4">
                <div class="card h-100 text-center">
                    <a href="images/shelter/tiranny.jpg" data-fancybox data-caption="Малыш тираннозаврик">
                        <img class="card-img-top p-2" src="images/shelter/tiranny.jpg" alt="Малыш тираннозаврик">
                    </a>
                    <div class="card-body">
                        <h4 class="card-title">Малыш тираннозаврик</h4>
                        <h6 class="card-subtitle mb-2 text-muted">3 месяца</h6>
                        <p class="card-text">Еще совсем недавно вылупился из яйца, ищет себе новый дом. Очень активный и любопытный.</p>
                    </div>
                    <div class="card-footer">
                        <span class="badge badge-primary">Активный</span>
                        <span class="badge badge-danger">Хищник</span>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 mb-4">
                <div class="card h-100 text-center">
                    <a href="images/shelter/semen.jpg" data-fancybox data-caption="Семен">
                        <img class="card-img-top p-2" src="images/shelter/semen.jpg" alt="Семен">
                    </a>
                    <div class="card-body">
                        <h4 class="card-title">Семен</h4>
                        <h6 class="card-subtitle mb-2 text-muted">30 лет</h6>
                        <p class="card-text">Диплодока Семена уже ничем не удивить. Взрослый, воспитанный, обаятельный и интеллигентный.</p>
                    </div>
                    <div class="card-footer">
                        <span class="badge badge-secondary">Обжорка</span>
                        <span class="badge badge-info">Спокойный</span>
                    </div>
                </div>
            </div>
        </div>
        <hr>
        <div class="row">
            <div class="col-lg-8 mb-4">
                <h3>Хочу динозаврика</h3>
                <form name="sentMessage" id="contactForm" action="{{route('order.store')}}" method="post" enctype="multipart/form-data" >
                    @csrf
                    <div class="control-group form-group">
                        <div class="controls">
                            <label for="name">Ваше имя:</label>
                            <input type="text" class="form-control" id="name" name="name" placeholder="Введите ваше имя...">
                            <p class="help-block"></p>
                        </div>
                    </div>
                    <div class="control-group form-group">
                        <div class="controls">
                            <label for="phone">Телефон:</label>
                            <input type="tel" class="form-control" id="phone" name="phone" required placeholder="+7(000)000-00-00">
                        </div>
                    </div>
                    <div class="control-group form-group">
                        <div class="controls">
                            <label for="email">Email:</label>
                            <input type="email" class="form-control" id="email" name="email" required placeholder="email@example.com">
                        </div>
                    </div>
                    <div class="control-group form-group">
                        <div class="controls">
                            <label for="message">Комментарий:</label>
                            <textarea rows="10" cols="100" class="form-control" id="message" name="message" required style="resize:none" placeholder="Введите какого обжорозаврика вы хотите и почему..."></textarea>
                        </div>
                    </div>
                    <div id="success"></div>
                    <button type="submit" class="btn btn-primary" id="sendMessageButton">Хочу динозаврика</button>
                </form>
            </div>

        </div>
    </div>


@endsection
