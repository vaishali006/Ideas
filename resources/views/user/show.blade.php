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
                        <div class="d-flex align-items-center justify-content-between">
                            <div class="d-flex align-items-center">
                                <img style="width:150px" class="me-3 avatar-sm rounded-circle"
                                    src="https://api.dicebear.com/6.x/fun-emoji/svg?seed=Mario" alt="Mario Avatar">
                                <div>
                                    <h3 class="card-title mb-0"><a href="#"> {{$user->name}}</a> 
                                    </h3>
                                    <span class="fs-6 text-muted">{{$user->email}}</span>
                                </div>
                            </div>
                            <div>
                                <a href="{{ route('profiles.edit', Auth::user()->id) }}">Edit</a>
                            </div>
                        </div>
                        <div class="px-2 mt-4">
                            <h5 class="fs-5"> Bio : </h5>
                            <p class="fs-6 fw-light">
                                {{$user->bio}}
                            </p>
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
                    </div>
                </div>
                <hr>
               
            </div>
        </div>
        <div class="col-3">
            @include('layout.searchbar')
            @include('layout.follow')

        </div>
    </div>
</div>
@endsection