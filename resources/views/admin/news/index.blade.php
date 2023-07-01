@extends('layouts.admin')
@section('content')

    <div
        class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
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
                    <div class="col" id="{{$arItem['id']}}block">
                        <div class="card shadow-sm">
                            <div class="card-body">
                                <h2 class="card-text">ID: {{$arItem['id']}}</h2>
                                <h2 class="card-text">{{$arItem['title']}}</h2>
                                <p class="card-text">{{$arItem['description']}}</p>
                                <p class="card-text">{{$arItem['source_id']}}</p>
                                @foreach($arItem->categories as $category)
                                    <p class="card-text">{{$category->title}}</p>
                                @endforeach
                                <div class="d-flex justify-content-between align-items-center">
                                    <div class="btn-group">
                                        <a href="{{route('admin.news.edit', $arItem->id)}}"
                                           class="btn btn-sm btn-outline-secondary">edit</a>
                                        <button class="btn btn-danger deleteBtn" data-id={{$arItem['id']}} > delete
                                        </button>
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
    {{$news->links()}}

    <script>
        $(".deleteBtn").click(function () {
            let id = $(this).data("id");
            let token = $("meta[name='csrf-token']").attr("content");
            $("#"+id+"block").remove();
            $.ajax(
                {
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    url: "/news/" + id,
                    type: "POST",
                    data: {
                        "id": id,
                        "_token": token,
                        _method: "DELETE"
                    },
                    success: function (result) {
                        $(id+'block').remove();
                        console.log("success delete " + id + " news", result);
                    },
                    error: function (result) {
                        console.log('error', result);
                    }
                });
        });
    </script>



    </body>

@endsection
