<?php

namespace App\Providers;

use App\Models\Category;
use App\Models\Post;
use App\Models\Setting;
use App\Models\User;
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
        $settings = Setting::all();
        foreach ($settings as $key => $setting) {
            if ($key === 0) {
                $system_name = $setting->value;
            } elseif ($key === 1) {
                $favicon = $setting->value;
            } elseif ($key === 2) {
                $front_logo = $setting->value;
            } elseif ($key === 3) {
                $admin_logo = $setting->value;
            }
        }

        $categories = Category::where('status', 1)->orderBy('id', 'DESC')->get();
        $authors = User::where('id', '!=', 1)->get();
        $most_views = Post::orderBy('view_count', 'DESC')->where('status', 1)->limit(5)->get();
        $most_comments = Post::withCount('comment')->where('status', 1)->orderBy('comment_count', 'DESC')->limit(5)->get();
        $posts =
            $share_data = array(
                'system_name' => $system_name,
                'favicon' => $favicon,
                'front_logo' => $front_logo,
                'admin_logo' => $admin_logo,
                'categories' => $categories,
                'authors' => $authors,
                'most_views' => $most_views,
                'most_comments' => $most_comments,
            );
        view()->share('share_data', $share_data);
    }
}
