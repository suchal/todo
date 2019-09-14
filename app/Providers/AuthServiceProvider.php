<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        // 'App\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        Gate::define('crud-owner', function ($user, $obj) {
            return $user->id == $obj->user_id;
        });

        Gate::define('viewable', function($user, $obj){
            return ($user->id == $obj->user_id || $obj->viewers()->where('user_id', $user->id)->count());
        });
    }
}
