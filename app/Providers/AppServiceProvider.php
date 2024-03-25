<?php

namespace App\Providers;
use App\Models\Test;
use App\Observers\TestObserve;
use Illuminate\Support\Facades\View;
use Illuminate\view\View as MyVeiw;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Test::observe(new  TestObserve);
       View::composer('*',function(MyVeiw $view){
              return  $view->with (['myvar'=> 'Message from composer var']);
       }) ;
    }
}
