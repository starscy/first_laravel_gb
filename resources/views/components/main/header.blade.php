<nav class="navbar fixed-top navbar-expand-lg navbar-dark bg-dark fixed-top">
    <div class="container">
        <a class="navbar-brand" href="/">Обжорозаврик <i class="fas fa-dragon"></i></a>
        <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link" href="{{route('news.index')}}">Динозавры</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="blog.html">Блог</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="shelter.html">Приют динозавриков</a>
                </li>

                <li class="nav-item">
                    <a class="btn btn-secondary" href="auth.html">Войти</a>
                    <a class="btn btn-outline-secondary" href="register.html">Зарегистрироваться</a>
                </li>

                <li class="nav-item dropdown">
                    <a class="avatar-link nav-link dropdown-toggle" href="#" id="navbarDropdownBlog" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <img src="{{asset('assets/dino/images/avartar-dinosaur-100.png')}}"  class="rounded-circle bg-white avatar-img" alt="Аватар">
                    </a>
                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownBlog">
                        <a class="dropdown-item" href="#">Личный кабинет</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="#">Выйти</a>
                    </div>
                </li>
            </ul>
        </div>
    </div>
</nav>
