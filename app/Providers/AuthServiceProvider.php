<?php

namespace App\Providers;

// use Illuminate\Support\Facades\Gate;
use App\Models\Post;
use App\Policies\PostPolicy;
use Auth;
use Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The model to policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        // 'App\Models\Model' => 'App\Policies\ModelPolicy',
        Post::class => PostPolicy::class,
    ];

    /**
     * Register any authentication / authorization services.
     */
    public function boot(): void
    {
        $this->registerPolicies();

        // Gate::define('create_post', function () {
        //     // return $user->is_admin === 1;
        //     return Auth::user()->is_admin === 1;
        // });
        // Gate::define('edit_post', function () {
        //     // return $user->is_admin === 1;
        //     return Auth::user()->is_admin ;
        // });
        // Gate::define('delete_post', function () {
        //     // return $user->is_admin === 1;
        //     return Auth::user()->is_admin ;
        // });

        //
    }
}
