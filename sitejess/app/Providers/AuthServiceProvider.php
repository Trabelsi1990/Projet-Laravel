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

        Gate::define('manage-users',function($user){
            return $user->isAdmin();
            //return $user->hasAnyRole(['admin']);
        });
        Gate::define('auteur-manage',function($user){
            return $user->hasAnyRole(['auteur']);
        });
   // une gate pour donner acces au role
   // donne acces ou pas pour la modif d'un utilisateur au cas ou c'est un admin
        Gate::define('edit-users', function ($user) {
            //return $user->isAdmin();
            return $user->hasAnyRole(['admin']);
        });
        // donne acces ou pas a a supp d'un utilisateur au cas ou c'est un admin
        Gate::define('delete-users', function ($user) {
            return $user->isAdmin();
        });
        Gate::define('create-shop', function ($user) {
            return $user->hasAnyRole(['admin']);
        });
        Gate::define('edit-shop', function ($user) {
            return $user->hasAnyRole(['admin']);
        });
        Gate::define('delete-shop', function ($user) {
            return $user->hasAnyRole(['admin']);
        });
      
    }
}
