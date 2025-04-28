<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Kutabarik\SanitDb\Database\EloquentRepository;
use Kutabarik\SanitDb\Database\RepositoryInterface;

class AppServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        $this->app->bind(
            RepositoryInterface::class,
            EloquentRepository::class
        );
    }

    public function boot(): void {}
}
