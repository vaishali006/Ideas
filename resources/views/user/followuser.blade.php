@if (Auth::user()->follows($user))   
<form action="{{ route('user.unfollow', $user->id) }}" method="POST">
    @csrf
     <button class="btn btn-danger btn-sm"> Unfollow </button>
</form>
@else
<form action="{{ route('user.follow', $user->id) }}" method="POST">
    @csrf
     <button class="btn btn-primary btn-sm"> Follow </button>
</form>
@endif
