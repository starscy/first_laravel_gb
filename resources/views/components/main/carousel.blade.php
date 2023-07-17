<section>
    <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
        <ol class="carousel-indicators">
            <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="3"></li>
        </ol>
        <div class="carousel-inner" role="listbox">
            <div class="carousel-item active" style="background-image: url({{asset('assets/dino/images/banners/dino_banner_1.jpg')}})">
                <div class="carousel-caption d-none d-md-block">
                    <h3>Динозавры не игрушки</h3>
                    <hr class="border-light">
                    <div>
                        <p>Эти гигантские животные жили много лет назад. Они были огромные тяжелые и опасные. Их не выводили гулять на поводке, как сейчас. И кормили они себя сами, разрывая все своими острыми зубами. Хорошо, что сейчас они такие лапушки, и прекрасно уживаются дома с нашими котиками <i class="text-danger fas fa-heart"></i></p>

                        <hr class="border-light">
                        <p><a class="btn btn-info" href="{{route('news.index')}}">Подробнее</a></p>
                    </div>
                </div>
            </div>
            <div class="carousel-item" style="background-image: url({{asset('assets/dino/images/banners/dino_banner_2.jpg')}})">
                <div class="carousel-caption d-none d-md-block">
                    <h3>Когда у динозаврика режутся зубки</h3>
                    <hr class="border-light">
                    <div>
                        <p>Когда у вашего динозаврика режутся зубки, это очень тяжелый период как для малыша, так и для вас. Убирайте все, что можно грызть. Потому что погрызано будет все. И главное: терпение, терпение и еще раз терпение.</p>

                        <hr class="border-light">
                        <p><a class="btn btn-info" href={{route('news.index')}}>Подробнее</a></p>
                    </div>
                </div>
            </div>
            <div class="carousel-item" style="background-image: url({{asset('assets/dino/images/banners/dino_banner_3.jpg')}})">
                <div class="carousel-caption d-none d-md-block">
                    <h3>Хорошего динозавра много не бывает</h3>
                    <hr class="border-light">
                    <div>
                        <p>Для тех кто любит малышей покрупнее. Когда динозаврик обнимает тебя, а не ты его. А также любителям одна лапа здесь, другая там. Приходите к нам в приют и выбирайте друга побольше.</p>

                        <hr class="border-light">
                        <p><a class="btn btn-info" href="{{route('news.index')}}">Подробнее</a></p>
                    </div>
                </div>
            </div>
            <div class="carousel-item" style="background-image: url({{asset('assets/dino/images/banners/dino_banner_4.jpg')}})">
                <div class="carousel-caption d-none d-md-block">
                    <h3>Хищный или травоядный</h3>
                    <hr class="border-light">
                    <div>
                        <p>Вопрос: какого динозаврика взять хищного или травоядного, - самый острый при выборе своего питомца. Как не ошибиться с выбром и взять подходящего для себя малыша, рассказывают эксперты.</p>

                        <hr class="border-light">
                        <p><a class="btn btn-info" href="{{route('news.index')}}">Подробнее</a></p>
                    </div>
                </div>
            </div>
        </div>
        <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
    </div>
</section>
