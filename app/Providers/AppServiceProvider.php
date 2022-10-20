<?php

namespace App\Providers;

use App\Models\HomeAdvertisement;
use App\Models\Post;
use App\Models\SubCategory;
use App\Models\Tag;
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
        $news_sub_category = SubCategory::withCount('rFrontPost')->where('show_on_home', 'Show')->orderBy('sub_category_order', 'asc')->get();
        $news_tags = Tag::select('tag_name')->distinct()->get();
        $news_tranding = Post::with('rSubCategory')->where('is_publish', 1)->orderBy('visitor', 'DESC')->limit(5)->get();
        $footer_news_popular = Post::with('rSubCategory')->where('is_publish', 1)->orderBy('visitor', 'DESC')->limit(3)->get();
        view()->share('global_header_ad_data', $header_ad_data);
        view()->share('global_sidebar_ad_data', $sidebar_ad_data);
        view()->share('global_news_sub_category', $news_sub_category);
        view()->share('global_news_tags', $news_tags);
        view()->share('global_news_tranding', $news_tranding);
        view()->share('global_footer_news_popular', $footer_news_popular);
    }
}
