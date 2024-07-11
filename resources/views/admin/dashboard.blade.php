@extends('layout.layout')
@section('title', 'Admin Dashboard')

@section('content')
    <div class="container py-4">
        <div class="row">
            <div class="col-3">
                @include('admin.layout.sidebar')
            </div>
            <div class="col-9">
                <h1>ADMIN PANEL</h1>
                <div class="row">
                    <div class="col-sm-6 col-md-4">
                        <div class="card">
                            <div class="card-body">
                              <h5 class="card-title"> <span class="fas fa-users"></span> Users </h5>
                              <h2>{{$user}}</h2>
                            </div>
                          </div>
                    </div>
                    
                    <div class="col-sm-6 col-md-4">
                        <div class="card">
                            <div class="card-body">
                              <h5 class="card-title"> <span class="fas fa-brain"></span> Posts </h5>
                              <h2>{{$post}}</h2>
                            </div>
                          </div>
                    </div>
                    <div class="col-sm-6 col-md-4">
                        <div class="card">
                            <div class="card-body">
                              <h5 class="card-title"> <span class="fas fa-comment"></span> Comments </h5>
                              <h2>{{$comment}}</h2>
                            </div>
                          </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection