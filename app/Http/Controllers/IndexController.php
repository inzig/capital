<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\Admin\CategoryRepository;
use App\Repositories\Admin\DatedContentRepository;
use App\Repositories\Admin\PostRepository;
use App\Repositories\Admin\SimpleContentRepository;
use App\Repositories\Admin\SortableContentRepository;
use App\Repositories\Admin\TeamRepository;
use App\Repositories\Admin\SettingRepository;

class IndexController extends Controller
{
    /** @var  SimpleContentRepository */
    private $simpleContentRepository;

    /** @var  SortableContentRepository */
    private $sortableContentRepository;

    /** @var  DatedContentRepository */
    private $datedContentRepository;

    /** @var  CategoryRepository */
    private $categoryRepository;

    /** @var  PostRepository */
    private $postRepository;

    /** @var  TeamRepository */
    private $teamRepository;

    private $settingRepository;

    public function __construct(
        SimpleContentRepository $simpleContentRepository,
        SortableContentRepository $sortableContentRepository,
        DatedContentRepository $datedContentRepository,
        TeamRepository $teamRepository,
        CategoryRepository $categoryRepository,
        PostRepository $postRepository,
        SettingRepository $settingRepository)
    {
        $this->simpleContentRepository = $simpleContentRepository;
        $this->sortableContentRepository = $sortableContentRepository;
        $this->datedContentRepository = $datedContentRepository;
        $this->teamRepository = $teamRepository;
        $this->categoryRepository = $categoryRepository;
        $this->postRepository = $postRepository;
        $this->settingRepository = $settingRepository;
    }

    /**
     * Show the application front page.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $lang = $request->get('lang', 'en');

        if(!key_exists($lang, config('app.locales'))) {
            $lang = 'en';
        }

        app()->setLocale($lang);

        $currentStageObj = $this->settingRepository->findWhereIn('field', ['current_stage'])->first();
        $currentStage = isset($currentStageObj->value) ? $currentStageObj->value : 'private-sale';

        $titles = $this->simpleContentRepository->findWhere(['type' => ['type', 'like', '%title.%']])->keyBy('type')->all();
        $home = $this->simpleContentRepository->findWhere(['type' => ['type', '=', 'home'], 'stage' => ['stage', '=', $currentStage]])->first();
        $presale = $this->simpleContentRepository->findByField('type', 'pre-sale-timer')->first();
        $partners = $this->sortableContentRepository->orderBy('weight', 'asc')->findByField('type', 'partners');
        $about = $this->simpleContentRepository->findByField('type', 'about')->first();
        $problem_statement = $this->simpleContentRepository->findByField('type', 'problem-statement')->first();
        $newsletter = $this->simpleContentRepository->findByField('type', 'newsletter')->first();
        $roadmap = $this->datedContentRepository->orderBy('dated_on', 'asc')->findByField('type', 'roadmap')->all();
        $features = $this->sortableContentRepository->orderBy('weight', 'asc')->findByField('type', 'features')->chunk(3);
        $token_sale = $this->sortableContentRepository->orderBy('weight', 'asc')->findByField('type', 'token-sale')->all();
        $teams = $this->teamRepository->orderBy('weight', 'asc')->findByField('type', 'team')->chunk(5);
        $advisers = $this->teamRepository->orderBy('weight', 'asc')->findByField('type', 'advisers')->chunk(5);
        $news = $this->sortableContentRepository->orderBy('weight', 'asc')->findByField('type', 'news');
        $faqs = $this->sortableContentRepository->orderBy('weight', 'asc')->findByField('type', 'faq')->all();
        $posts = $this->postRepository->orderBy('weight', 'asc')->findByField('status', 1)->all();
        $follow_us = $this->simpleContentRepository->findByField('type', 'follow-us')->first();
        $social_networks = $this->simpleContentRepository->findByField('type', 'social-networks')->first();

        return view('index', compact('titles', 'home', 'presale', 'partners', 'about', 'problem_statement', 'newsletter', 'roadmap', 'features', 'token_sale', 'teams', 'advisers', 'news', 'faqs', 'posts', 'follow_us', 'social_networks', 'currentStage'));
    }
}
