@extends('layouts.admin')
@section('content')

    <!-- USERS LIST -->
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Latest Members</h3>

            <div class="card-tools">
                <span class="badge badge-danger">8 New Members</span>
                <button type="button" class="btn btn-tool" data-card-widget="collapse">
                    <i class="fas fa-minus"></i>
                </button>
                <button type="button" class="btn btn-tool" data-card-widget="remove">
                    <i class="fas fa-times"></i>
                </button>
            </div>
        </div>
        <!-- /.card-header -->
        <div class="card-body p-0">
            @if(!empty($users))
                <ul class="users-list clearfix">
                    @foreach($users as $user)
                        <li>
                            <img src="dist/img/user1-128x128.jpg" alt="User Image">
                            <a class="users-list-name" href="{{route('admin.users.show', $user)}}">{{$user->email}}</a>
                            <span class="users-list-date">Today</span>
                        </li>
                    @endforeach
                    @endif

                </ul>
        </div>
    </div>
    <!-- /.users-list -->

@endsection
