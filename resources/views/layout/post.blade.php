@auth    
<h4> Share yours ideas </h4>
<div class="row">
    <form action={{ route('posts.store') }} method="post">
        @csrf
        <div class="mb-3">
            <textarea class="form-control" name="content" id="idea" rows="3"></textarea>
            @error('content')
            <span class="m-1 text-danger"> {{$message}} </span>
            @enderror
        </div>
        <div class="">
            <button type="submit" class="btn btn-dark">Share</button>
        </div>
    </form>
</div>
@endauth

@guest
    <h4>Login To Share your Ideas</h4>
@endguest

