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
      blade::directive('color',function($expression){
    //    return $expression;
    
       return '<?php 
        $pseudo = '.$expression.';
        $lettres = str_split ($pseudo);
        $elt = "";
       foreach ($lettres as $lettre) {
        $style = "rgb(".rand(0,255).",".rand(0,255).",".rand(0,255).")";
        echo "<b style=\"color:".$style."\">".$lettre."</b>";
      } 
      ?>';
  
    });
  }
}
