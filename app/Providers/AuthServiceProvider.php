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

        Gate::define('admin', function ($user) {
            return $user->hasAnyRole(['admin']);
        });
        Gate::define('medico', function ($user) {
            return $user->hasAnyRole(['admin','med']);
        });
        Gate::define('recep', function ($user) {
            return $user->hasAnyRole(['admin','recep']);
        });
        Gate::define('user', function ($user) {
            return $user->hasAnyRole(['user']);
        });
       
        //
    }
}
