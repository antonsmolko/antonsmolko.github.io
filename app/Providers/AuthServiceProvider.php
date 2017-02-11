<?php

namespace App\Providers;

use App\Models\Article;
use App\Policies\ArticlePolicy;
use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        Article::class => ArticlePolicy::class,
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        // СОЗДАНИЕ ТЕСТОВЫХ GATE

        Gate::define('create_articles', function ($user) {

            foreach ($user->role[0]->permission as $permission) {
                if ($permission->name == 'create_articles') {
                    return true;
                }
            }

            return false;
        });
    }
}
