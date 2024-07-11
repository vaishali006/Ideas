<?php

namespace App\Providers;

// use Illuminate\Support\Facades\Gate;

use App\Models\Post;
use App\Models\User;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The model to policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        // 'App\Models\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     */
    public function boot(): void
    {
        $this->registerPolicies();

        //role based
        Gate::define('admin',function(User $user) : bool{
            return (bool) $user->is_admin;
        });

        //permission based

        Gate::define('edit-profile',function(User $loggedInUser, User $profileUser) : bool{
            return $loggedInUser->id === $profileUser->id;
        });


        Gate::define('delete-post',function(User $user,Post $post) : bool{
            dd();
            return ((bool) $user->is_admin || $user->id === $post->user_id);
        });

        Gate::define('edit-post',function(User $user,Post $post) : bool{
            return ((bool) $user->is_admin || $user->id === $post->user_id);
        });
    }
}
