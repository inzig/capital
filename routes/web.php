<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

/**
 * @var \Illuminate\Support\Facades\Route Route
 */

Route::post('purchase', 'CoinpaymentsController@purchaseItems');
Route::get('docs/technical', function() {
    return redirect()->to('https://drive.google.com/file/d/16qnLkfR6WxoITTlqs5IfHpXmlyyHpaP7/view');
});
Route::get('docs/crowdsale', function() {
    return redirect()->to('https://drive.google.com/file/d/1HPgHL_a_uduJny7TgjJPuNtAKLXDojCX/view');
});
Route::get('docs/press-releases', function() {
    return redirect()->to('https://docs.google.com/document/d/1wXIMJRNXB6OBlSswI4HHU9TRzL-7i2ksCbKdZoi13gA/edit?usp=sharing');
});
Route::get('docs/en/one-pager', function() {
    return redirect()->to('https://drive.google.com/file/d/1Yj-KVuzJO6qFSL3vCuAuecHyC7XWVa9v/view?usp=sharing');
});
Route::get('/', 'IndexController@index')->name('front');
Route::get('blog/{slug}', 'BlogController@view');

Route::post('savenewsletter', 'AppBaseController@save');
Route::post('savenewsletteremail', 'AppBaseController@saveemail');

Route::get('terms-and-conditions', function(){
    $lang = request()->get('lang', 'en');

    if(!key_exists($lang, config('app.locales'))) {
        $lang = 'en';
    }

    app()->setLocale($lang);

    $simpleContentRepository = app()->make(\App\Repositories\Admin\SimpleContentRepository::class);
    $page = $simpleContentRepository->findByField('type', 'terms-and-conditions')->first();

    $title = 'Terms and Conditions';

    if (empty($page)) {
        return abort(404);
    }

    return view('page', compact('page' ,'title'));
});

Route::get('privacy-policy', function(){
    $lang = request()->get('lang', 'en');

    if(!key_exists($lang, config('app.locales'))) {
        $lang = 'en';
    }

    app()->setLocale($lang);

    $simpleContentRepository = app()->make(\App\Repositories\Admin\SimpleContentRepository::class);
    $page = $simpleContentRepository->findByField('type', 'privacy-policy')->first();

    $title = 'Privacy Policy';

    if (empty($page)) {
        return abort(404);
    }

    return view('page', compact('page' ,'title'));
});

Auth::routes();
Route::get('logout', 'ProfileController@logout')->name('logout');

Route::get('register/success', 'Auth\RegisterController@registerSuccess')->name('register-success');
Route::get('email-verification/error', 'Auth\RegisterController@getVerificationError')->name('email-verification.error');
Route::get('email-verification/check/{token}', 'Auth\RegisterController@getVerification')->name('email-verification.check');

Route::post('newsletter-subscribe', function(\App\Http\Requests\NewsletterSubscriptionRequest $request){
    $data = $request->all();
    \App\Models\NewsletterSubscription::create($data);

    return json_encode(['status' => 'success']);
})->middleware('throttle');

Route::group(['middleware' => ['isVerified', 'auth']], function() {
    Route::get('profile', 'ProfileController@index')->name('profile');
    Route::post('profile', 'ProfileController@update');
    Route::post('change-password', 'ProfileController@updatePassword')->name('change-password');
});

Route::group(['middleware' => ['isVerified', 'auth'], 'prefix' => 'dashboard'], function() {
    Route::get('/', 'MyDashboardController@index')->name('dashboard');
    Route::post('/', 'MyDashboardController@update');
    Route::get('buy-tokens', 'MyDashboardController@contribute')->name('buy-tokens');
    Route::post('buy-tokens', 'MyDashboardController@recordTransaction');
    Route::post('pay', 'MyDashboardController@charge')->name('stripe-pay');
    Route::get('token-calculator', 'MyDashboardController@calculator')->name('token-calculator');
    Route::get('transactions-history', 'MyDashboardController@transactions')->name('transactions-history');
});

Route::group(['middleware' => ['role:admin', 'auth'], 'prefix' => 'admin'], function() {
    Route::resource('media-gallery', 'Admin\MediaGalleryController', ['only' => [
        'index', 'store', 'destroy'
    ]]);

    Route::resource('seo', 'Admin\SimpleContentController', ['only' => [
        'index', 'store'
    ]]);

    Route::resource('navbar', 'Admin\SimpleContentController', ['only' => [
        'index', 'store'
    ]]);

    Route::resource('home', 'Admin\SimpleContentController', ['only' => [
        'index', 'store'
    ]]);

    Route::resource('pre-sale-timer', 'Admin\SimpleContentController', ['only' => [
        'index', 'store'
    ]]);

    Route::resource('newsletter', 'Admin\SimpleContentController', ['only' => [
        'index', 'store'
    ]]);

    Route::resource('follow-us', 'Admin\SimpleContentController', ['only' => [
        'index', 'store'
    ]]);

    Route::resource('about', 'Admin\SimpleContentController', ['only' => [
        'index', 'store'
    ]]);

    Route::resource('problem-statement', 'Admin\SimpleContentController', ['only' => [
        'index', 'store'
    ]]);

    Route::resource('solution', 'Admin\SimpleContentController', ['only' => [
        'index', 'store'
    ]]);

    Route::resource('social-networks', 'Admin\SimpleContentController', ['only' => [
        'index', 'store'
    ]]);

    Route::post('features/title', ['as'=> 'features.title', 'uses' => 'Admin\PageTitlesController@store']);
    Route::post('features/sort', ['as'=> 'features.sort', 'uses' => 'Admin\SortableContentController@sort']);
    Route::resource('features', 'Admin\SortableContentController', ['except' => [
        'show',
    ]]);

    Route::post('partners/title', ['as'=> 'partners.title', 'uses' => 'Admin\PageTitlesController@store']);
    Route::post('partners/sort', ['as'=> 'partners.sort', 'uses' => 'Admin\SortableContentController@sort']);
    Route::resource('partners', 'Admin\SortableContentController', ['except' => [
        'show',
    ]]);

    Route::post('news/title', ['as'=> 'news.title', 'uses' => 'Admin\PageTitlesController@store']);
    Route::post('news/sort', ['as'=> 'news.sort', 'uses' => 'Admin\SortableContentController@sort']);
    Route::resource('news', 'Admin\SortableContentController', ['except' => [
        'show',
    ]]);

    Route::post('roadmap/title', ['as'=> 'roadmap.title', 'uses' => 'Admin\PageTitlesController@store']);
    Route::post('roadmap/sort', ['as'=> 'roadmap.sort', 'uses' => 'Admin\SortableContentController@sort']);
    Route::resource('roadmap', 'Admin\DatedContentController', ['except' => [
        'show',
    ]]);

    Route::post('token-sale/title', ['as'=> 'token-sale.title', 'uses' => 'Admin\PageTitlesController@store']);
    Route::post('token-sale/sort', ['as'=> 'token-sale.sort', 'uses' => 'Admin\SortableContentController@sort']);
    Route::resource('token-sale', 'Admin\SortableContentController', ['except' => [
        'show',
    ]]);

    Route::post('team/title', ['as'=> 'team.title', 'uses' => 'Admin\PageTitlesController@store']);
    Route::post('team/sort', ['as'=> 'team.sort', 'uses' => 'Admin\TeamController@sort']);
    Route::resource('team', 'Admin\TeamController', ['except' => [
        'show',
    ]]);

    Route::post('advisers/title', ['as'=> 'advisers.title', 'uses' => 'Admin\PageTitlesController@store']);
    Route::post('advisers/sort', ['as'=> 'advisers.sort', 'uses' => 'Admin\TeamController@sort']);
    Route::resource('advisers', 'Admin\TeamController', ['except' => [
        'show',
    ]]);

    Route::post('faq/title', ['as'=> 'faq.title', 'uses' => 'Admin\PageTitlesController@store']);
    Route::post('faq/sort', ['as'=> 'faq.sort', 'uses' => 'Admin\SortableContentController@sort']);
    Route::resource('faq', 'Admin\SortableContentController', ['except' => [
        'show',
    ]]);

    Route::post('posts/title', ['as'=> 'posts.title', 'uses' => 'Admin\PageTitlesController@store']);
    Route::post('posts/sort', ['as'=> 'posts.sort', 'uses' => 'Admin\PostController@sort']);
    Route::resource('posts', 'Admin\PostController', ['except' => [
        'show',
    ]]);

    Route::resource('categories', 'Admin\CategoryController', ['except' => [
        'show',
    ]]);

    Route::resource('terms-and-conditions', 'Admin\SimpleContentController', ['only' => [
        'index', 'store'
    ]]);

    Route::resource('privacy-policy', 'Admin\SimpleContentController', ['only' => [
        'index', 'store'
    ]]);

    Route::resource('settings', 'Admin\SettingController', ['only' => [
        'index', 'store'
    ]]);

    Route::get('newsletter-subscriptions', function (){
        $csv = \League\Csv\Writer::createFromFileObject(new \SplTempFileObject());

        \App\Models\NewsletterSubscription::all()->each(function($person) use($csv) {
            $csv->insertOne([$person->email]);
        });

        $csv->output('newsletter-subscriptions.csv');
    })->name('newsletter-subscriptions');

    Route::resource('discounts', 'Admin\DiscountController', ['except' => [
        'show',
    ]]);

    Route::resource('discounts/{discountId}/rates', 'Admin\DiscountRateController', ['except' => [
        'show',
    ]]);

    Route::resource('transactions', 'Admin\TransactionController', ['only' => [
        'index', 'edit', 'update'
    ]]);

    Route::get('transactions/ethereum', function (){
        $address = \App\Models\Setting::where('field', 'ethereum')->first();

        return view('admin.transactions.ethereum', compact('address'));
    })->name('transactions.ethereum');

    Route::get('transactions/ethereum/sync', 'Admin\TransactionController@syncEthTransactions');
    
    Route::resource('users', 'Admin\UserController');
});
