<?php

namespace SpkApp\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Validator;
use DB;
use Event;


class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        if (env('APP_ENV') === 'local') {
            DB::connection()->enableQueryLog();
            Event::listen('kernel.handled', function ($request, $response) {
                if ( $request->has('sql-debug') ) {
                    $queries = DB::getQueryLog();
                    dd($queries);
                }
            });
        }

        \Illuminate\Support\Facades\Schema::defaultStringLength(191);

        Validator::extend('sum_equals', function ($attribute, $value, $parameters, $validator) {
            if (count($parameters) !== 1) {
                throw new InvalidArgumentException('Validation rule sum equals requires exactly 1 parameter.');
            }

            $validator->addReplacer('sum_equals', function ($message, $attribute, $rule, $parameters){
                return str_replace([':sum_equals'], $parameters, $message);
            });

            return array_sum($value) == $parameters[0];
        });
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
