<div>
        <form action={{ route('posts.comment.store', $idea->id) }}  method="post">
    <div class="mb-3">
            @csrf
            <textarea name="comment" class="fs-6 form-control" rows="1"></textarea>
    </div>
    <div>
        <button class="btn btn-primary btn-sm"> Post Comment </button>
                </form>
    </div>

    <hr>
    @foreach ($idea->comments as $comment)
    <div class="d-flex align-items-start">
        <img class="avatar-img rounded-circle" style="width:50px"
        src="{{ asset('storage/' . $comment->user->image) }}" alt="">
        <div class="w-100">
            <div class="d-flex justify-content-between">
                <h6 class=""> {{$comment->user->name}}
                </h6>
                <small class="fs-6 fw-light text-muted"> {{$comment->created_at->diffForHumans()}} </small>
            </div>
            <p class="fs-6 mt-3 fw-light">
                {{$comment->comment}}
            </p>
        </div>
    </div>
    @endforeach
    
</div>
