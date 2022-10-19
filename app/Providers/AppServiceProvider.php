<?php

namespace App\Providers;

use App\Models\HomeAdvertisement;
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
        $header_ad_data = HomeAdvertisement::where('above_ad_position', 'header')->where('above_ad_status', 'Show')->first();
        $sidebar_ad_data = HomeAdvertisement::where('above_ad_position', 'sidebar')->where('above_ad_status', 'Show')->first();
        view()->share('global_header_ad_data', $header_ad_data);
        view()->share('global_sidebar_ad_data', $sidebar_ad_data);
    }
}
