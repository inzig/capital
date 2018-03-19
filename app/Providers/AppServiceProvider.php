<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Schema::defaultStringLength(191);
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $request = app(\Illuminate\Http\Request::class);
        $contentType = $request->segment(2);
        $stage = $request->get('stage', null);

        if (!is_null($stage)) {
            $stageNameFound = false;

            foreach (config('app.stages') as $configStage) {
                if ($stage == str_slug($configStage)) {
                    $stageNameFound = true;
                }
            }

            if ($stageNameFound == false) {
                abort(404);
            }
        }

        $this->app->when('App\Http\Controllers\Admin\SimpleContentController')
            ->needs('$contentType')
            ->give($contentType);

        $this->app->when('App\Http\Controllers\Admin\SortableContentController')
            ->needs('$contentType')
            ->give($contentType);

        $this->app->when('App\Http\Controllers\Admin\DatedContentController')
            ->needs('$contentType')
            ->give($contentType);

        $this->app->when('App\Http\Controllers\Admin\TeamController')
            ->needs('$contentType')
            ->give($contentType);

        $this->app->when('App\Http\Controllers\Admin\CategoryController')
            ->needs('$contentType')
            ->give($contentType);


        $this->app->when('App\Http\Controllers\Admin\SimpleContentController')
            ->needs('$stage')
            ->give($stage);

        $this->app->when('App\Http\Controllers\Admin\SortableContentController')
            ->needs('$stage')
            ->give($stage);

        $this->app->when('App\Http\Controllers\Admin\DatedContentController')
            ->needs('$stage')
            ->give($stage);

        $this->app->when('App\Http\Controllers\Admin\TeamController')
            ->needs('$stage')
            ->give($stage);

        $this->app->when('App\Http\Controllers\Admin\CategoryController')
            ->needs('$stage')
            ->give($stage);


        $createRequestClassName = 'Create'.ucfirst(camel_case($contentType)).'Request';
        $updateRequestClassName = 'Update'.ucfirst(camel_case($contentType)).'Request';

        if (class_exists('App\Http\Requests\Admin\Content\\'.$createRequestClassName)) {
            $parentRequestClassName = get_parent_class('App\Http\Requests\Admin\Content\\'.$createRequestClassName);

            $this->app->bind(
                $parentRequestClassName,
                'App\Http\Requests\Admin\Content\\'.$createRequestClassName
            );
        }

        if (class_exists('App\Http\Requests\Admin\Content\\'.$updateRequestClassName)) {
            $parentRequestClassName = get_parent_class('App\Http\Requests\Admin\Content\\'.$updateRequestClassName);

            $this->app->bind(
                $parentRequestClassName,
                'App\Http\Requests\Admin\Content\\'.$updateRequestClassName
            );
        }
    }
}
