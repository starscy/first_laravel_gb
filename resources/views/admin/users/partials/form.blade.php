@csrf
<div class="form-group input-group">
    <div class="input-group">
        <div class="input-group-prepend">
            <span class="input-group-text"> <i class="fa fa-user"></i> </span>
        </div>
        <input id="name" name="name" class="form-control is-invalid @error('name') is-invalid @enderror" placeholder="Ваше имя"
               type="text" value="{{old('name')}} @isset($user) {{$user->name}} @endisset">
    </div>
    @error('name')
    <code class="red">{{ $message }}</code>
    @enderror
</div>

<div class="form-group">
    <div class="input-group">
        <div class="input-group-prepend">
            <span class="input-group-text"> <i class="fa fa-fingerprint"></i> </span>
        </div>
        <input id="login" name="login" class="form-control  @error('login') is-invalid @enderror" placeholder="Ваш логин" type="text"
               value="{{old('login')}} @isset($user) {{$user->login}} @endisset
              ">
    </div>
    @error('login')
    <code class="red">{{ $message }}</code>
    @enderror
</div>
<div class="form-group">
    <div class="input-group">
        <div class="input-group-prepend">
            <span class="input-group-text"> <i class="fa fa-envelope"></i> </span>
        </div>
        <input id="email" name="email" class="form-control @error('email') is-invalid @enderror" placeholder="Ваш Email" type="email"
               value="{{old('email')}} @isset($user) {{$user->email}} @endisset ">
    </div>
    @error('email')
    <code class="red">{{ $message }}</code>
    @enderror
</div>
@isset($create)
    <div class="form-group">
        <div class=" input-group">
            <div class="input-group-prepend">
                <span class="input-group-text"><i class="fa fa-lock"></i></span>
            </div>
            <input id="password" name="password" class="form-control @error('password') is-invalid @enderror" placeholder="Введите пароль"
                   type="password">
        </div>
        @error('password')
        <code class="red">{{ $message }}</code>
        @enderror
    </div>
    <div class="form-group">
        <div class="input-group">
            <div class="input-group-prepend">
                <span class="input-group-text"><i class="fa fa-lock"></i></span>
            </div>
            <input id="password" name="password_confirmation" class="form-control  @error('password_confirmation') is-invalid @enderror"
                   placeholder="Повторите пароль" type="password">
        </div>
        @error('password_confirmation')
        <code class="red">{{ $message }}</code>
        @enderror
    </div>
@endisset
<div class="form-group">
    @foreach($roles as $role)
        <div class="input-group">

            <input name="roles[]" class="form-control" type="checkbox" value="{{$role->id}}"
                   id="{{$role->name}}"
           @isset($user) @if(in_array($role->id, $user->roles->pluck('id')->toArray())) checked @endif @endisset>
            <label class="form-control" for="{{$role->name}}">
                {{$role->name}}
            </label>
        </div>
    @endforeach
</div>
<div class="form-group">
    <button type="submit" class="btn btn-primary btn-block">{{ __('Submit') }}</button>
</div>
