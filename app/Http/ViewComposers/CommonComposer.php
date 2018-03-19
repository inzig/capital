<?php

namespace App\Http\ViewComposers;

use App\Repositories\Admin\SettingRepository;
use Illuminate\View\View;
use App\Repositories\Admin\SimpleContentRepository;

class CommonComposer
{
    protected $simpleContentRepository;
    protected $settingRepository;

    /**
     * Create a new profile composer.
     *
     * @param  SimpleContentRepository  $simpleContentRepository
     * @return void
     */
    public function __construct(SimpleContentRepository $simpleContentRepository, SettingRepository $settingRepository)
    {
        $this->simpleContentRepository = $simpleContentRepository;
        $this->settingRepository = $settingRepository;
    }

    /**
     * Bind data to the view.
     *
     * @param  View  $view
     * @return void
     */
    public function compose(View $view)
    {
        $lang = request()->get('lang', 'en');

        if(!key_exists($lang, config('app.locales'))) {
            $lang = 'en';
        }

        $current_language = [
            'code' => $lang,
            'label' => config('app.locales')[$lang],
        ];

        $seo = $this->simpleContentRepository->findByField('type', 'seo')->first();
        $navbar = $this->simpleContentRepository->findByField('type', 'navbar')->first();
        $home = $this->simpleContentRepository->findByField('type', 'home')->first();
        $logo = 'img/logo.png';
        if(isset($navbar->base_extra['logo'])){
            $logo = $navbar->base_extra['logo'];
        }

        $smartContractAddress = $this->settingRepository->findWhereIn('field', ['sc_address'])->first();
        $userWalletAddress = '';

        if(!auth()->guest()) {
            $userWalletAddress = auth()->user()->wallet_address;
        }

        $view->with('current_language', $current_language)
        ->with('seo', $seo)
        ->with('navbar', $navbar)
        ->with('logo', $logo)
        ->with('smartContractAddress', $smartContractAddress)
        ->with('userWalletAddress', $userWalletAddress);
    }
}