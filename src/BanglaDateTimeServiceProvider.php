<?php

namespace BanglaDateTime\Laravel;

use BanglaDateTime\BanglaDateTime;
use Illuminate\Support\Carbon;
use Illuminate\Support\ServiceProvider;

class BanglaDateTimeServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        // Register the Carbon macro here
        $this->registerMacros();

        $this->publishes([
            __DIR__.'/../config/bangladatetime.php' => config_path('bangladatetime.php'),
        ]);

        $this->mergeConfigFrom(
            __DIR__.'/../config/bangladatetime.php', 'bangladatetime'
        );

    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        // Register the service provider's bindings or dependencies here if needed
    }

    /**
     * Register the Carbon macros.
     *
     * @return void
     */
    protected function registerMacros()
    {
        Carbon::macro('formatBangla', function (?string $format = null, ?string $timezone = null) {
            // Use default format if none is provided
            $format = $format ?? config('bangladatetime.format', 'Y-m-d');

            // Use default timezone if none is provided
            $timezone = $timezone ?? config('bangladatetime.timezone', 'UTC');

            // Create a new instance of BanglaDateTime using the Carbon time and given (or default) timezone
            $banglaDateTime = BanglaDateTime::create($this->toDateTimeString(), $timezone);

            // Return the formatted date in Bangla
            return $banglaDateTime->format($format);
        });

        Carbon::macro('toBangla', function (?string $format = null, ?string $timezone = null) {
            // Use default bangla format if none is provided
            $format = $format ?? config('bangladatetime.bangla_format', 'jS F, Y');

            // Use default timezone if none is provided
            $timezone = $timezone ?? config('bangladatetime.timezone', 'UTC');

            // Create a new instance of BanglaDateTime using the Carbon time and given (or default) timezone
            $banglaDateTime = BanglaDateTime::create($this->toDateTimeString(), $timezone);

            // Return the formatted date in Bangla
            return $banglaDateTime->toBangla($format);
        });
    }
}
