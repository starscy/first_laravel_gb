@extends('layouts.admin')
@section('content')

    <div class="container">
        <div class="card my-4 mx-auto px-0 col-lg-6 col-sm-12">
            <div class="card-body">
                <h4 class="card-title mb-4 text-center">{{__('Create user')}}</h4>
                <form method="POST" action="{{route('admin.users.store') }}">
                    @include('admin.users.partials.form' , ['create' => true])
                </form>
            </div>
        </div>
    </div>

@endsection
