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
        <div class="card-header">
            <h3 class="card-title"></h3>
            <a style="float: right" href="{{route('admin.users.create')}}" >{{__('Create user')}}</a>
        </div>
        <!-- /.card-header -->
        <div class="card-body p-0">
            @if(!empty($users))
                <ul class="users-list clearfix">
                    @foreach($users as $user)
                        <li>
                            <span class="users-list-date">{{$user->name}}</span>
                            <img src="dist/img/user1-128x128.jpg" alt="User Image">
                            <a class="users-list-name" href="{{route('admin.users.show', $user)}}">{{$user->email}}</a>
                            <span class="users-list-date">Today</span>
                            <div >
                                <a href="{{route('admin.users.edit', $user->id)}}" class="btn btn-sm btn-primary "><b>Edit</b></a>
                                <button type="button" class="btn btn-sm btn-danger"
                                        onclick="event.preventDefault(); document.getElementById('delete-user-form-{{$user->id}}').submit()">
                                    Delete
                                </button>

                                <form id="delete-user-form-{{$user->id}}" method="POST" action="{{route('admin.users.destroy', $user->id)}}" style="display:none">
                                    @csrf
                                    @method("DELETE")
                                </form>
                            </div>
                        </li>
                    @endforeach
                </ul>
            @endif
        </div>
        {{$users->links()}}
    </div>
    <!-- /.users-list -->

@endsection
