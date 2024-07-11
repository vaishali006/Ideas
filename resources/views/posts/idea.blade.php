@extends('layout.layout')

@section('content')
<div class="container py-4">
    <div class="row">

        @include('layout.menu')
        <div class="col-6">         
            <div class="mt-3">
                @if (@session()->has('success'))
                @include('message.success')
                @endif
                <div class="card">
                    <div class="px-3 pt-4 pb-2">
                        {{-- {{$idea->user}} --}}
                        <div class="d-flex align-items-center justify-content-between">
                            <div class="d-flex align-items-center">
                                <img class="avatar-img rounded-circle" style="width:50px"
                                src="{{ asset('storage/' . $idea->user->image) }}" alt="">
                                <div>
                                    <h5 class="card-title mb-0"><a href="#"> {{$idea->user->name}} </a></h5>       
                                </div>
                            </div>
                            <a href={{ route('posts.edit', $idea->id) }}> Edit </a> 
                            <a href={{ route('posts.show', $idea->id) }}> View </a> 
                            <form action= {{ route('posts.destroy', $idea->id) }} method="post">
                                @method('delete')
                                @csrf
                                <button class="btn btn-danger" type="submit">X</button>
                            </form>
                        </div>
                    </div>
                    <div class="card-body">
                        @if ($editing ?? null)
                        <div class="row">
                            <form action={{ route('posts.update', $idea->id) }} method="post">
                                @method('put')
                                @csrf
                                <div class="mb-3">
                                    <textarea class="form-control" name="content" id="idea" rows="3"></textarea>
                                    @error('content')
                                    <span class="m-1 text-danger"> {{$message}} </span>
                                    @enderror
                                </div>
                                <div class="">
                                    <button type="submit" class="btn btn-dark">Update</button>
                                </div>
                            </form>
                        </div>
                        @else
                        <p class="fs-6 fw-light text-muted">
                            {{$idea->content}}
                        </p>
                        @endif
                        
                        <div class="d-flex justify-content-between">
                            @include('posts.like')
                            <div>
                                <span class="fs-6 fw-light text-muted"> <span class="fas fa-clock"> </span>
                                {{$idea->created_at->diffForHumans()}}  </span>
                            </div>
                        </div>
                        <div>
                            <form action={{ route('posts.comment.store', $idea->id) }}  method="post">
                            @csrf
                            <div class="mb-3">
                                <textarea class="fs-6 form-control" rows="1"></textarea>
                            </div>
                            <div>
                                <button class="btn btn-primary btn-sm"> Post Comment </button>
                            </div>
                            </form>
                            <hr>
                            @foreach  ($idea->comments as $comment)
                            <div class="d-flex align-items-start">
                                <img class="avatar-img rounded-circle" style="width:50px"
                                src="{{ asset('storage/' . $comment->user->image) }}" alt="">
                                <div class="w-100">
                                    <div class="d-flex justify-content-between">
                                        <h6 class="">{{$comment->user->name}}
                                        </h6>
                                        <small class="fs-6 fw-light text-muted">{{$comment->created_at}}</small>
                                    </div>
                                    <p class="fs-6 mt-3 fw-light">
                                        {{$comment->comment}}
                                    </p>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
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