<div class="card overflow-hidden">
    <div class="card-body pt-3">
        <ul class="nav nav-link-secondary flex-column fw-bold gap-2">
            <li class="nav-item">
                <a class="{{ (Route::is('admin.dashboard')) ? 'text-white bg-black rounded' : ''}} nav-link" href="/admin">
                    <span>  Dashboard</span></a>
            </li>
            <li class="nav-item">
                <a class="{{ (Route::is('admin.users')) ? 'text-white bg-black rounded' : ''}} nav-link" href="/admin/users">
                    <span>Users</span></a>
            </li>
            <li class="nav-item">
                <a class="{{ (Route::is('admin.posts')) ? 'text-white bg-black rounded' : ''}} nav-link" href="/admin/posts">
                    <span>Post</span></a>
            </li>
            <li class="nav-item">
                <a class="{{ (Route::is('admin.comments')) ? 'text-white bg-black rounded' : ''}} nav-link" href="/admin/comments ">
                    <span>Comment</span></a>
            </li>
        </ul>
    </div>
    <div class="card-footer text-center py-2">
        <a class="btn btn-link btn-sm" href="#">View Profile </a>
    </div>
</div>