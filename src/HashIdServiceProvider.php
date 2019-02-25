<?php

namespace akr4m\hashid;

use Illuminate\Support\ServiceProvider;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Foundation\Application as LaravelApplication;
use Laravel\Lumen\Application as LumenApplication;

class HashIdServiceProvider extends ServiceProvider
{
    /**
     * Setup the config.
     *
     * @return void
     */

    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services for creating hash id on database schema.
     * Example:
     *
     * $table->hashid();
     *
     * Sample of Users table Schema
     *
     * Schema::create('users', function (Blueprint $table) {
     *  $table->increments('id');
     *  $table->hashid(); //Hash Id
     *  $table->string('name');
     *  $table->string('phone')->nullable();
     *  $table->string('avatar')->nullable();
     *  $table->string('email')->unique();
     *  $table->timestamp('email_verified_at')->nullable();
     *  $table->string('password');
     *  $table->rememberToken();
     *  $table->timestamps();
     *  $table->softDeletes();
     * });
     *
     * @return void
     */
    public function boot()
    {
        $this->setupConfig();

        Blueprint::macro('hashid', function () {
            $this->string('hash_id')->unique()->nullable()->index();
        });
    }

    /**
     * This config file is from
     * https://github.com/vinkla/laravel-hashids
     *
     * You can also import Vinkla\Hashids's config file
     * But you may have to configure
     * php artisan vendor:publish --provider=Vinkla\Hashids\HashidsServiceProvider
     *
     * Otherwise import his/her modified config
     * php artisan vendor:publish --provider=akr4m\hashid\HashIdServiceProvider
     */

    protected function setupConfig(): void
    {
        $source = realpath($raw = __DIR__.'/../config/hashids.php') ?: $raw;

        if ($this->app instanceof LaravelApplication && $this->app->runningInConsole()) {
            $this->publishes([$source => config_path('hashids.php')]);
        } elseif ($this->app instanceof LumenApplication) {
            $this->app->configure('hashids');
        }

        $this->mergeConfigFrom($source, 'hashids');
    }
}
