@extends('layout.layout')

@section('title', 'Dashboard')

@section('content')
    <div class="container py-4">
        <div class="row">
                @include('layout.menu')
           
            <div class="col-6">
                @if (@session()->has('success'))
                    @include('message.success')
                @endif
                @if (@session()->has('error'))
                    @include('message.error')
                @endif
                @include('layout.post')
                <hr>
                <div class="mt-3">
                    @forelse($ideas as $idea)
                        <div class="card">
                            <div class="px-3 pt-4 pb-2">
                                <div class="d-flex align-items-center justify-content-between">
                                    <div class="d-flex align-items-center">
                                        <img class="avatar-img rounded-circle" style="width:50px"
                                        src="{{ asset('storage/' . $idea->user->image) }}" alt="">
                                        <div>
                                            <h5 class="card-title mb-0"><a
                                                    href="{{ route('profiles.show', $idea->user->id) }}">
                                                    {{ $idea->user->name }} </a></h5>
                                        </div>
                                    </div>
                                    <a href={{ route('posts.show', $idea->id) }}> View </a>
                                    @can('edit-post', $idea)
                                        <a href={{ route('posts.edit', $idea->id) }}> Edit </a>
                                        <form action={{ route('posts.destroy', $idea->id) }} method="post">
                                            @method('delete')
                                            @csrf
                                            <button class="btn btn-danger" type="submit">X</button>
                                        </form>
                                    @endcan
                                </div>
                            </div>
                            <div class="card-body">
                                <p class="fs-6 fw-light text-muted">
                                    {{ $idea->content }}
                                </p>
                                <div class="d-flex justify-content-between">
                                    @include('posts.like')
                                    <div>
                                        <span class="fs-6 fw-light text-muted"> <span class="fas fa-clock"> </span>
                                            {{ $idea->created_at->diffForHumans() }} </span>
                                    </div>
                                </div>
                                @include('posts.comment')
                            </div>
                        </div>
                    @empty
                        <span class="">No result found.</span>
                    @endforelse
                    {{-- laravel's inbuilt function for pagination to change the style go to AppServiceProvider and add bootstrap for pagination --}}
                    <div class="m-2">
                        {{ $ideas->withQueryString()->links() }}
                    </div>
                </div>
            </div>
            <div class="col-3">
                @include('layout.searchbar')
                @include('layout.follow')

            </div>
        </div>
    </div>
@endsection
