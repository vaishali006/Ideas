@extends('layout.layout')
@section('title', 'Edit Profile')
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
                        <form enctype="multipart/form-data" action={{ route('profiles.update', $user->id) }} method="post">
                        @csrf
                        @method('put')
                        <div class="d-flex align-items-center justify-content-between">
                            <div class="d-flex align-items-center">
                                <img style="width: 150px;" class="me-3 avatar-sm rounded-circle"
                                src="{{ asset('storage/' . $user->image) }}" >
                               
                                <div>
                                    <div class="row">
                                            @method('put')
                                            @csrf
                                            <div class="mb-3">
                                                <input class="form-control" name="username" value="{{$user->name}}" id="idea" rows="1"></input>
                                                @error('content')
                                                <span class="m-1 text-danger"> {{$message}} </span>
                                                @enderror
                                            </div>                                         
                                    </div>                      
                                    <span class="fs-6 text-muted">{{$user->email}}</span>
                                </div>
                            </div>
                            <div>
                                <a href="{{ route('profiles.show', Auth::user()->id) }}">View</a>
                            </div>
                        </div>
                        <input type="file" name="image" id="">
             
                        <div class="px-2 mt-4">
                            <h5 class="fs-5"> About : </h5>
                            <div class="mb-3">
                                <textarea class="form-control" name="bio" id="idea" rows="3"></textarea>
                                @error('content')
                                <span class="m-1 text-danger"> {{$message}} </span>
                                @enderror
                            </div>
                            <div class="">
                                <button type="submit" class="btn btn-dark">Update</button>
                            </div>
                       
                            <div class="d-flex justify-content-start">
                                <a href="#" class="fw-light nav-link fs-6 me-3"> <span class="fas fa-user me-1">
                                    </span> 0 Followers </a>
                                <a href="#" class="fw-light nav-link fs-6 me-3"> <span class="fas fa-brain me-1">
                                    </span> {{$user->posts->count()}} </a>
                                <a href="#" class="fw-light nav-link fs-6"> <span class="fas fa-comment me-1">
                                    </span> {{$user->comments->count()}}  </a>
                            </div>
                            @auth()
                            @if (auth()->id() != $user->id)
                            <div class="mt-3">
                                <button class="btn btn-primary btn-sm"> Follow </button>
                            </div> 
                            @endif
                            @endauth
                        </div>
                    </form>
                    </div>
                </div>
                <hr>    
                @include('user.userpost') 
            </div>
        </div>
        <div class="col-3">
            @include('layout.searchbar')
            @include('layout.follow')

        </div>
    </div>
</div>
@endsection