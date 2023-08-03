@extends('layouts.admin')
@section('content')

    <div
        class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Редактирование новости</h1>

        <form name="sentMessage" id="contactForm" action="{{route('admin.news.update', $news->id )}}" method="post"
              enctype="multipart/form-data">
            @csrf
            @method('patch')
            <div class="control-group form-group">
                <div class="controls">
                    <label for="title">Заголовок</label>
                    <input type="text" class="form-control" id="title" name="title" placeholder="Заголовок"
                           value="{{$news->title}}">
                    @error('title')
                    <code class="red">{{ $message }}</code>
                    @enderror
                </div>
            </div>
            <div class="control-group form-group">
                <div class="controls">
{{--                    <img src="{{Storage::disk('public')->url($news->image)}}"/>--}}
                    <label for="image">Изображение</label>
                    <input type="file" class="form-control" id="image" name="image">
                </div>
                @error('image')
                <code class="red">{{ $message }}</code>
                @enderror
            </div>
            <div class="control-group form-group">
                <div class="controls">
                    <label for="description">Описание</label>
                    <textarea rows="10" cols="100" class="form-control" id="description" name="description" required
                              style="resize:none">{{$news->description}}</textarea>
                </div>
                @error('description')
                <code class="red">{{ $message }}</code>
                @enderror
            </div>
            <div class="control-group form-group">
                <div class="controls">
                    <label for="source">Выберите тип </label>
                    @if(!empty($sources) )
                        <select class="form-control" id="source" name="source_id">
                            @foreach($sources as $arItem)
                                <option
                                    {{$arItem->id === ($news->source->id ?? '') ? 'selected' : ''}}
                                    value="{{$arItem->id}}">
                                    {{$arItem->title}}
                                </option>
                            @endforeach
                        </select>
                    @endif
                </div>
            </div>
            <div class="control-group form-group">
                <div class="controls">
                    <label for="categories">Выберите тип </label>
                    <select multiple class="form-control" id="categories" name="categories[]">
                        @if(!empty($categories))
                            @foreach($categories as $category)
                                <option
                                    @foreach($news->categories as $tag)
                                        {{$category->id === $tag->id ? 'selected' : ''}}
                                    @endforeach
                                    value="{{$category->id}}">{{$category->title}}</option>
                            @endforeach
                        @endif
                    </select>
                </div>
            </div>
            <div id="success"></div>
            <button type="submit" class="btn btn-primary" id="sendMessageButton">Изменить</button>
        </form>
    </div>

@endsection
@push('js')
    <script>
        ClassicEditor
            .create(document.querySelector('#description'))
            .catch(error => {
                console.error(error);
            });
    </script>
@endpush
