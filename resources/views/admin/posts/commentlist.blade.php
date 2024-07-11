@extends('layout.layout')
@section('title', 'Admin Dashboard')

@section('content')
    <div class="container py-4">
        <div class="row">
            <div class="col-3">
                @include('admin.layout.sidebar')
            </div>
            <div class="col-9">
                <h1>COMMENTS</h1>
                @if (@session()->has('success'))
                    @include('message.success')
                @endif
                <table class="table table-striped">
                    <thead class="table-dark">
                        <tr>
                            <th>Id</th>
                            <th>Posted by</th>
                            <th>Post</th>

                            <th>Content</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($comments as $comment)
                            <tr>
                                <th>{{ $comment->id }}</th>

                                <th> <a
                                        href="{{ route('profiles.show', $comment->user->id) }}">{{ $comment->user->name }}</a>
                                </th>
                                <th><a href="{{ route('posts.show', $comment->post->id) }}"> {{ $comment->post->id }}</a>
                                </th>
                                <th>{{ $comment->comment }}</th>
                                <th>
                                    <form action="{{ route('admin.comments.destroy', $comment->id) }}" method="POST">
                                        @csrf
                                        @method('delete')
                                        <button type="submit">Delete</button>
                                    </form>
                                </th>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                {{ $comments->links() }}
            </div>
        </div>
    </div>
@endsection
