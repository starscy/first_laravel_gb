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
            @include('admin.messages')
            <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
                @foreach($news as $newsItem)
                    <div class="col" id="{{$newsItem['id']}}block">
                        <div class="card shadow-sm">
                            <div class="card-body">
                                <h2 class="card-text">ID: {{$newsItem['id']}}</h2>
                                <a href="{{route('admin.news.show', $newsItem['id'])}}"><h2
                                        class="card-text">{{$newsItem['title']}}</h2></a>
                                <p class="card-text">{{$newsItem['description']}}</p>

                                @if($newsItem->source->id === $newsItem['source_id'])
                                    <p class="card-text">Группа : {{$newsItem->source->title}}</p>
                                @endif

                                @foreach($newsItem->categories as $category)
                                    <p class="card-text">{{$category->title}}</p>
                                @endforeach

                                <div class="d-flex justify-content-between align-items-center">
                                    <div class="btn-group">
                                        <a href="{{route('admin.news.edit', $newsItem->id)}}"
                                           class="btn btn-sm btn-outline-secondary">edit</a>
                                        <button class="btn btn-danger deleteBtn" data-id={{$newsItem['id']}} > delete
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
    @if(method_exists($news, 'links'))
        {{$news->links()}}
    @endif

    <script>
        let buttons = document.querySelectorAll(".deleteBtn");
        buttons.forEach((btn) => {
            btn.addEventListener('click', () => {
                let id = btn.getAttribute('data-id');
                if (confirm('Вы подтвеждаете удаление?')) {
                    sendToDelete('/admin/news/' + id)
                        .then(() => {
                            location.reload();
                        })

                } else {
                    console.log('delete canceled');
                }
            })
        })

        async function sendToDelete(url) {
            let token = document.querySelector("meta[name='csrf-token']").getAttribute("content");
            let response = await fetch(url, {
                method: 'DELETE',
                headers: {
                    'X-CSRF-TOKEN': token
                }
            });
            const answer = await response.json();

            return answer;
        }
    </script>
    </body>

@endsection
