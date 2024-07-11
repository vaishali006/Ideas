@extends('layout.layout')
@section('title', 'Admin Dashboard')

@section('content')
    <div class="container py-4">
        <div class="row">
            <div class="col-3">
                @include('admin.layout.sidebar')
            </div>
            <div class="col-9">
                <h1>USERS</h1>
                <table class="table table-striped">
                    <thead class="table-dark">
                        <tr>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Image</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($users as $user)
                        <tr>
                                <th>{{$user->name}}</th>
                                <th>{{$user->email}}</th>
                                <th>     <img class="avatar-img rounded-circle" style="width:50px"
                                    src="{{ asset('storage/' . $user->image) }}" alt=""></th>   
                                <th>
                                    <a href="{{ route('profiles.show', $user->id) }}">View</a>  
                                    <a href="{{ route('profiles.edit', $user->id) }}">Edit</a></th>   
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                {{ $users->links() }}
            </div>
        </div>
    </div>
@endsection
