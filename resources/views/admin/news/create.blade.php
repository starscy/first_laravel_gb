@extends('layouts.admin')
@section('content')

    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Добавление новости</h1>

        <form name="sentMessage" id="contactForm" action="{{route('admin.news.store')}}" method="post" enctype="multipart/form-data" >
            @csrf
            <div class="control-group form-group">
                <div class="controls">
                    <label for="title">Заголовок</label>
                    <input type="text" class="form-control" id="title" name="title" placeholder="Заголовок  ">
                    <p class="help-block"></p>
                </div>
                @error('title')
                <p class="text-danger">{{ $message }} </p>
                @enderror
            </div>
            <div class="control-group form-group">
                <div class="controls">
                    <label for="image">Изображение</label>
                    <input type="file" class="form-control" id="image" name="image" >
                </div>
            </div>
            <div class="control-group form-group">
                <div class="controls">
                    <label for="description">Описание</label>
                    <textarea rows="10" cols="100" class="form-control" id="description" name="description" required style="resize:none" placeholder="Введите какого обжорозаврика вы хотите и почему...">
                        {{old('description')}}
                    </textarea>
                </div>
            </div>
            <div class="control-group form-group">
                <div class="controls">
                    <label for="source">Выберите тип </label>
                    <select class="form-control" id="source" name="source_id">
                        @foreach($sources as $arItem)
                            <option
                                {{old('source_id') == $arItem->id ? 'selected' : ''}}
                                value="{{$arItem->id}}">{{$arItem->title}}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="control-group form-group">
                <div class="controls">
                    <label for="categories">Выберите тип </label>
                    <select multiple class="form-control" id="categories" name="categories[]" >
                        @foreach($categories as $category)
                            <option
                                value="{{$category->id}}">{{$category->title}}</option>
                        @endforeach
                    </select>
                </div>
            </div>

            <div id="success"></div>
            <button type="submit" class="btn btn-primary" id="sendMessageButton">Создать</button>
        </form>
    </div>


@endsection
