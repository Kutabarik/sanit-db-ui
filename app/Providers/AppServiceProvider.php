<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Kutabarik\SanitDb\Database\EloquentRepository;
use Kutabarik\SanitDb\Database\RepositoryInterface;
use Kutabarik\SanitDb\Rules\RulesManager;

class AppServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        $this->app->bind(
            RepositoryInterface::class,
            EloquentRepository::class
        );

        $this->app->bind(RulesManager::class, function () {
            return new RulesManager(config('sanitdb.rules'));
        });
    }

    public function boot(): void {}
}
