@extends('layout.layout')
@section('title', 'Admin Dashboard')

@section('content')
    <div class="container py-4">
        <div class="row">
            <div class="col-3">
                @include('admin.layout.sidebar')
            </div>
            <div class="col-9">
                <h1>POSTS</h1>
                <table class="table table-striped">
                    <thead class="table-dark">
                        <tr>
                            <th>Id</th>
                            <th>Content</th>
                            <th>Posted by</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($ideas as $idea)
                        <tr>
                                <th>{{$idea->id}}</th>
                                <th>{{$idea->content}}</th>
                                <th>{{$idea->user->name}}</th>   
                                <th>
                                    <a href="{{ route('posts.show', $idea->id) }}">View</a>  
                                    <a href="{{ route('posts.edit', $idea->id) }}">Edit</a></th>   
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                {{ $ideas->links() }}
            </div>
        </div>
    </div>
@endsection
