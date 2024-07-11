<div class="card mt-3">
    <div class="card-header pb-0 border-0">
        <h5 class="">Top Users</h5>
    </div>
  
    <div class="card-body">
        @foreach ($topUsers as $topUser)   

        <div class="hstack gap-2 mb-3">

            <div class="avatar">
                <a href="{{ route('profiles.show', $topUser->id) }}"><img class="avatar-img rounded-circle" style="width:50px"
                        src="{{ asset('storage/' . $topUser->image) }}" alt=""></a>
            </div>
            <div class="overflow-hidden">
                <a class="h6 mb-0" href="{{ route('profiles.show', $topUser->id) }}">{{$topUser->name}}</a>
                <p class="mb-0 small text-truncate">{{$topUser->email}}</p>
            </div>
        </div> 
        @endforeach
    </div>
</div>