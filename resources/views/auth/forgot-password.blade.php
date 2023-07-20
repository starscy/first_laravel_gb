@extends('layouts.main')
@section('content')

    <div class="container">
        @if (session('status'))
            <div class="mb-4 font-medium text-sm text-green-600">
                {{ session('status') }}
            </div>
        @endif
        <div class="card my-4 mx-auto px-0 col-lg-6 col-sm-12">
            <div class="card-body">
                <h4 class="card-title mb-4 text-center">{{__("Reset password")}}</h4>
                <form method="POST" action="{{ route('password.email') }}">
                    @csrf
                    <div class="form-group">
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text"> <i class="fa fa-fingerprint"></i> </span>
                            </div>
                            <input id="email" type="email" name="email" class="form-control" placeholder="email"
                                   type="text">
                            @error('email')
                            <code class="red">{{ $message }}</code>
                            @enderror
                        </div>

                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary btn-block">{{__("Drop password")}}</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

