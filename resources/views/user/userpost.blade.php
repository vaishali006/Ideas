@foreach ($user->posts as $idea)
<div class="card">
    <div class="px-3 pt-4 pb-2">
        <div class="d-flex align-items-center justify-content-between">
            <div class="d-flex align-items-center">
                <img class="avatar-img rounded-circle" style="width:50px"
                src="{{ asset('storage/' . $user->image) }}" alt="">
                <div>
                    <h5 class="card-title mb-0"><a href="#">  {{$idea->user->name}} </a></h5>       
                </div>
            </div>
            <a href={{ route('posts.show', $idea->id) }}> View </a> 
            <form action= {{ route('posts.destroy', $idea->id) }} method="post">
                @method('delete')
                @csrf
                <button class="btn btn-danger" type="submit">X</button>
            </form>
        </div>
    </div>
    <div class="card-body">
        <p class="fs-6 fw-light text-muted">
            {{$idea->content}}
        </p>
        <div class="d-flex justify-content-between">
            <div>
               @include('posts.like')
            </div>
            <div>
                <span class="fs-6 fw-light text-muted"> <span class="fas fa-clock"> </span>
                {{$idea->created_at->diffForHumans()}}  </span>
            </div>
        </div>
        @include('posts.comment')
    </div>
</div>

@endforeach
