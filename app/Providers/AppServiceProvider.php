<?php

namespace App\Providers;

use App\Models\Category;
use App\Models\FrontSetting;
use App\Models\HomeAdvertisement;
use App\Models\Language;
use App\Models\LiveChannel;
use App\Models\OnlinePoll;
use App\Models\Page;
use App\Models\Post;
use App\Models\SocialItem;
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
        $news_sub_category = SubCategory::withCount('rFrontPost')->where('show_on_home', 'Show')->whereHas('rFrontPost', function($q){ 
            $q->where('is_publish', 1);
        })->orderBy('sub_category_order', 'asc')->get();
        $news_tranding = Post::with('rSubCategory')->where('is_publish', 1)->orderBy('visitor', 'DESC')->limit(5)->get();

        $nav_categories = Category::with('rSubCategory')->where('show_on_menu', 'Show')
        ->whereHas('rSubCategory', function($q){ 
            $q->where('show_on_menu', 'Show');
        })->orderBy('category_order','asc')->get();

        
        

        $footer_social_items = SocialItem::where('status', 'Show')->get();

        $setting_data = FrontSetting::orderBy('id', 'asc')->first();
        $language_data = Language::orderBy('id', 'asc')->get();
        $lang_default_data = Language::where('is_default', 'Yes')->first();

        view()->share('global_header_ad_data', $header_ad_data);
        view()->share('global_sidebar_ad_data', $sidebar_ad_data);
        view()->share('global_news_sub_category', $news_sub_category);
        view()->share('global_news_tranding', $news_tranding);

        view()->share('global_nav_categories', $nav_categories);

        view()->share('global_footer_social_items', $footer_social_items);
        view()->share('global_setting_data', $setting_data);
        view()->share('global_language_data', $language_data);
        view()->share('global_lang_default_data', $lang_default_data);
    }
}
