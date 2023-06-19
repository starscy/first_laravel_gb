@extends('layouts.admin')
@section('content')
<div>

    @if($errors->any())
        @foreach($errors->all() as $error)
            <h4>{{$error}}</h4>
        @endforeach
    @endif

    <form method="post" action="{{route('admin.news.store')}}" enctype="multipart/form-data">
        @csrf
        <h1 class="h3 mb-3 fw-normal">Добавление новости</h1>

        <div class="form-group">
            <label for="title">Заголовок</label>
            <input type="text" name="title" required id="title" class="form-control" value="{{old('title')}}" placeholder="Название новости">
        </div>
        <div class="form-group">
            <label for="title">Автор</label>
            <input type="text" name="author"  id="author" class="form-control" placeholder="Автор поста" value="{{old('author')}}">
        </div>
        <div class="form-group">
            <label for="image">Изображение</label>
            <input type="file" name="image"  id="image" class="form-control" placeholder="Автор поста" value="{{old('image')}}">
        </div>
        <div class="form-group">
            <label for="description">Описание</label>
            <input type="textarea" name="description"  id="description" class="form-control" value="{{old('description')}}" placeholder="Автор поста">
        </div>
        <div class="form-group">
            <label for="description">Статус</label>
            <select type="textarea" name="status"  id="status" class="form-control" >
                <option @if(old('status') === 'DRAFT') selected @endif >Active</option>
                <option @if(old('status') === 'DRAFT') selected @endif >Blocked</option>
            </select>
        </div>
        <br>
        <button class="btn btn-primary w-100 py-2" type="submit">Создать</button>
    </form>
</div>
@endsection
