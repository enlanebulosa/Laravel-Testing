<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

use App\Repositories\MemoRepositoryInterface;
use App\Repositories\MemoRepository;

class RepositoryServiceProvider extends ServiceProvider
{
    public function boot()
    {
        //
    }

    public function register()
    {
        $this->app->bind(MemoRepositoryInterface::class, MemoRepository::class);
    }
}
