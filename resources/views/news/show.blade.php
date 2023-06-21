@extends('layouts.main')

@section('content')

    <h1 class="mt-4 mb-3">Динозавр:
        <small>{{$newsItem->title}}</small>
    </h1>

    <ol class="breadcrumb">
        <li class="breadcrumb-item">
            <a href="index.html">Home</a>
        </li>
        <li class="breadcrumb-item">
            <a href="dinosaurs.html">Динозавры</a>
        </li>
        <li class="breadcrumb-item active">Тираннозавр</li>
    </ol>

    <div class="row">

        <div class="col-md-8 text-center">
            <a href="images/dinosaurs/tirannozavr.jpg" data-fancybox data-caption="Тираннозавр">
                <img class="img-fluid" src="images/dinosaurs/tirannozavr.jpg" alt="Тираннозавр">
            </a>
        </div>

        <div class="col-md-4">
            <h3 class="my-3">{{$newsItem->title}}</h3>
            <p>{{$newsItem->description}}.</p>
            <h3 class="my-3">Особенности динозавра</h3>
            <ul>
                <li><b>Латинское название</b>: Tyrannosaurus</li>
                <li><b>Рост</b>: 3,7 – 6,1 м</li>
                <li><b>Масса</b>: 4 500 – 14 000 кг</li>
                <li><b>Скорость</b>: Tyrannosaurus rex: 27 км/ч</li>
                <li><b>Продолжительность жизни</b>: 30 лет</li>
            </ul>
        </div>


    </div>

    <hr>

    <h3 class="my-4">О динозавре</h3>

    <div class="row">
        <div class="col-md-12">

            <p class="lead">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ducimus, vero, obcaecati, aut, error quam sapiente nemo saepe quibusdam sit excepturi nam quia corporis eligendi eos magni recusandae laborum minus inventore?</p>

            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ut, tenetur natus doloremque laborum quos iste ipsum rerum obcaecati impedit odit illo dolorum ab tempora nihil dicta earum fugiat. Temporibus, voluptatibus.</p>

            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Eos, doloribus, dolorem iusto blanditiis unde eius illum consequuntur neque dicta incidunt ullam ea hic porro optio ratione repellat perspiciatis. Enim, iure!</p>

            <blockquote class="blockquote">
                <p class="mb-0">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer posuere erat a ante.</p>
                <footer class="blockquote-footer">Someone famous in
                    <cite title="Source Title">Source Title</cite>
                </footer>
            </blockquote>

            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Error, nostrum, aliquid, animi, ut quas placeat totam sunt tempora commodi nihil ullam alias modi dicta saepe minima ab quo voluptatem obcaecati?</p>

            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Harum, dolor quis. Sunt, ut, explicabo, aliquam tenetur ratione tempore quidem voluptates cupiditate voluptas illo saepe quaerat numquam recusandae? Qui, necessitatibus, est!</p>

        </div>
    </div>

    <hr>

    <h3 class="my-4">Галерея</h3>

    <div class="row">

        <div class="col-md-3 col-sm-6 mb-4">
            <a href="images/dinosaurs/tirannozavr/tirannozavr1.jpg" data-fancybox="gallery" data-caption="Большой Тираннозавр">
                <img class="img-fluid" src="images/dinosaurs/tirannozavr/tirannozavr1.jpg" alt="Большой Тираннозавр">
            </a>
        </div>

        <div class="col-md-3 col-sm-6 mb-4">
            <a href="images/dinosaurs/tirannozavr/tirannozavr2.jpg" data-fancybox="gallery" data-caption="Тираннозавр The Isle">
                <img class="img-fluid" src="images/dinosaurs/tirannozavr/tirannozavr2.jpg" alt="Тираннозавр The Isle">
            </a>
        </div>

        <div class="col-md-3 col-sm-6 mb-4">
            <a href="images/dinosaurs/tirannozavr/tirannozavr3.jpg" data-fancybox="gallery" data-caption="Тираннозавр ругается">
                <img class="img-fluid" src="images/dinosaurs/tirannozavr/tirannozavr3.jpg" alt="Тираннозавр ругается">
            </a>
        </div>

        <div class="col-md-3 col-sm-6 mb-4">
            <a href="images/dinosaurs/tirannozavr/tirannozavr4.jpg" data-fancybox="gallery" data-caption="Тираннозавр поближе">
                <img class="img-fluid" src="images/dinosaurs/tirannozavr/tirannozavr4.jpg" alt="Тираннозавр поближе">
            </a>
        </div>
    </div>

@endsection
