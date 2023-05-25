<?php

namespace App\Providers;

use Illuminate\Support\Facades\Blade;
use Illuminate\Support\ServiceProvider;
class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Blade::directive('hasrole', function ($arguments) {
            $roles = explode('|', $arguments);
        
            return "<?php if (auth()->check() && in_array(auth()->user()->role, {$roles})): ?>";
        });
        
        Blade::directive('endhasrole', function () {
            return '<?php endif; ?>';
        });
    }
}
