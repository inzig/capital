<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\Admin\CategoryRepository;
use App\Repositories\Admin\PostRepository;

class BlogController extends Controller
{
    /** @var  CategoryRepository */
    private $categoryRepository;

    /** @var  PostRepository */
    private $postRepository;

    public function __construct(
        CategoryRepository $categoryRepository,
        PostRepository $postRepository)
    {
        $this->categoryRepository = $categoryRepository;
        $this->postRepository = $postRepository;
    }

    /**
     * Show the application dashboard.
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

        $categories = $this->categoryRepository->findByField('type', 'categories')->all();
        $posts = $this->postRepository->orderBy('weight', 'asc')->findByField('status', 1)->take(3);

        return view('blog.view', compact( 'posts', 'categories', 'contact_us', 'newsletter_footer', 'social_networks', 'current_language'));
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function view(Request $request, $slug)
    {
        $lang = $request->get('lang', 'en');

        if(!key_exists($lang, config('app.locales'))) {
            $lang = 'en';
        }

        app()->setLocale($lang);

        $categories = $this->categoryRepository->findByField('type', 'categories')->all();
        $post = $this->postRepository->findWhere(['status' => 1, 'slug' => $slug])->first();

        if (empty($post)) {
            return abort(404);
        }

        return view('blog.view', compact('navbar', 'post', 'categories'));
    }
}
