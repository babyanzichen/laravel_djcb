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


// ## =============================
// Message
// ================================ ##
Route::group(['prefix' => 'notifications', 'middleware' => 'auth'], function () {
    Route::get('unread', 'NotificationsController@unread')->name('notifications.unread');
    Route::get('/', 'NotificationsController@index')->name('notifications.index');
    Route::get('messages', 'NotificationsController@messages')->name('notifications.messages');
});

// ## =============================
// User center
// ================================ ##
Route::get('users/{user_name}/{view?}', 'ActivityController@index')->name('user_center');
Route::group(['prefix' => 'user', 'middleware' => 'auth'], function () {
    Route::get('/{id}/edit', 'UserController@edit')->name('users.edit');
    Route::patch('/{id}', 'UserController@update')->name('users.update');
    Route::get('/password/{id}/edit', 'UserController@editPassword')->name('users.edit_password');
    Route::patch('/password/{id}/update', 'UserController@updatePassword')->name('users.update_password');
    Route::get('/{id}/email', 'UserController@editEmail')->name('users.edit_email');
});


// ## =============================
// Api
// ================================ ##
Route::group(['namespace' => 'Api', 'middleware' => ['auth']], function () {
    // File Upload
    Route::post('file/upload', 'UploadController@fileUpload');
});

// ## =============================
// Authtication
// ================================ ##
Auth::routes();
Route::group(['middleware' => ['auth', 'admin']], function () {
    Route::get('logs', '\Rap2hpoutre\LaravelLogViewer\LogViewerController@index');
});
Route::get('login/github', 'Auth\LoginController@redirectToGithubProvider')->name('thirdlogin');
Route::get('login/github/callback', 'Auth\LoginController@handleGithubProviderCallback');
Route::get('/logout', 'Auth\LoginController@logout')->name('logout');
Route::get('/search', 'PagesController@search')->name('search');
Route::get('/about', 'PagesController@about')->name('about');

// ## =============================
// Home Pages
// ================================ ##
Route::get('/', 'PagesController@home')->name('home');
Route::get('/article/all', 'ArticlesController@allArticles')->name('article.all');
Route::get('/article/{slug}', 'ArticlesController@show')->name('article.show');
Route::get('/a/{slug}', 'ArticlesController@index')->name('article_list');

Route::get('/q/{slug}', 'QuestionsController@index')->name('question_list');
Route::get('/question/all', 'QuestionsController@allQuestions')->name('question.all'); // 注意的路由须序
Route::get('/question/{slug}', 'QuestionsController@show')->name('question.show');
// Tag
Route::group(['prefix' => 'tag'], function () {
    Route::get('/', 'TagController@index');
    Route::get('{tag}/{type?}', 'TagController@show')->where(['type' => '[q]']); //type 不存在则是从文章点进来的， type=q 则是从问题点进来的
});

// Questions push and update
Route::group(['prefix' => 'questions', 'middleware' => ['auth']], function () {
    Route::get('/', 'QuestionsController@create')->name('questions.create');
    Route::post('/store', 'QuestionsController@store')->name('questions.store');
    Route::get('/{id}/edit', 'QuestionsController@edit')->name('questions.edit')->middleware('admin')->middleware('role:supper_admin');
    Route::post('/{id}/update', 'QuestionsController@update')->name('questions.update')->middleware('admin')->middleware('role:supper_admin');
});
Route::group(['prefix' => 'articles', 'middleware' => ['auth', 'role:supper_admin', 'admin']], function () {
    Route::get('/', 'ArticlesController@create')->name('articles.create');
    Route::post('/store', 'ArticlesController@store')->name('articles.store');
    Route::get('/{id}/edit', 'ArticlesController@edit')->name('articles.edit');
    Route::post('/{id}/update', 'ArticlesController@update')->name('articles.update');
});
Route::post('/upload_image', 'QuestionsController@uploadImage')->name('upload_image')->middleware('auth');

// 语言配置


// ##  =================================
// Dashboard
// ===================================== ##
Route::group(['prefix' => 'dashboard', 'namespace' => 'Dashboard', 'middleware' => ['auth', 'admin']], function () {
    Route::get('/', 'IndexController@index');
    Route::get('welcome', 'IndexController@welcome');
    Route::get('commonStatus', 'IndexController@commonStatusHandle');

    // ## =================================
    // User manage
    // ================================ ##
    Route::group(['prefix' => 'user'], function () {
        Route::get('/', 'UsersController@users');
        Route::post('ajaxUsers/{page?}', 'UsersController@ajaxUsers');
        Route::get('create', 'UsersController@create');
        Route::post('store', 'UsersController@store');
        Route::get('{id}/edit', 'UsersController@edit')->name('users.show');
        Route::post('{id}/update', 'UsersController@update');
        Route::post('{id}/delete', 'UsersController@destroy');
        Route::get('roles', 'UsersController@giveUserRoles');
        Route::post('roles', 'UsersController@giveUserRolesStore');

    });


    Route::group(['prefix' => 'vote'], function () {
        Route::get('/', 'VoteController@lists');
        Route::post('ajaxGets/{page?}', 'VoteController@ajaxGets');
        Route::get('create', 'VoteController@create');
        Route::post('store', 'VoteController@store');
        Route::get('{id}/edit', 'VoteController@edit')->name('vote.show');
        Route::post('{id}/update', 'VoteController@update');
        Route::post('{id}/delete', 'VoteController@destroy');
        Route::get('infos', 'VoteController@infos');
        Route::post('ajaxGetInfos/{page?}', 'VoteController@ajaxGetInfos');
        Route::get('info/{id}/edit', 'VoteController@info_edit');
        Route::post('info/{id}/update', 'VoteController@info_update');

         Route::get('awards', 'VoteController@awards');
        Route::post('/awards/ajaxGetAwards/{page?}', 'VoteController@ajaxGetAwards');
        Route::get('award/{id}/edit', 'VoteController@award_edit');
        Route::post('award/{id}/update', 'VoteController@award_update');
        Route::get('award/create', 'VoteController@award_create');
        Route::post('award/store', 'VoteController@award_store');

        Route::get('categorys', 'VoteController@categorys');
        Route::post('ajaxGetCategorys/{page?}', 'VoteController@ajaxGetCategorys');
        Route::get('category/{id}/edit', 'VoteController@category_edit')->name('category.show');
        Route::post('category/{id}/update', 'VoteController@category_update');
         Route::get('category/create', 'VoteController@category_create');
        Route::post('category/store', 'VoteController@category_store');
    });


    //漂移体验报名管理
    Route::group(['prefix' => 'race'], function () {
        Route::get('/', 'RaceController@lists');
        Route::post('ajaxGets/{page?}', 'RaceController@ajaxGets');
       

    });

     //改装车展售票管理
    Route::group(['prefix' => 'ticket'], function () {
        Route::get('/', 'TicketController@lists');
        Route::post('ajaxGets/{page?}', 'TicketController@ajaxGets');
       

    });



    Route::group(['prefix' => 'role'], function () {
        Route::get('/', 'RolesController@roles');
        Route::post('ajaxRoles/{page?}', 'RolesController@ajaxRoles');
        Route::get('create', 'RolesController@create');
        Route::post('store', 'RolesController@store');
        Route::get('{id}/edit', 'RolesController@edit');
        Route::post('{id}/update', 'RolesController@update');
        Route::post('{id}/delete', 'RolesController@destroy');
        Route::get('permissions', 'RolesController@giveRolePermissions');
        Route::post('permissions', 'RolesController@giveRolePermissionsStore');
    });
    Route::group(['prefix' => 'permission'], function () {
        Route::get('/', 'PermissionsController@roles');
        Route::post('ajaxPermissions/{page?}', 'PermissionsController@ajaxPermissions');
        Route::get('create', 'PermissionsController@create');
        Route::post('store', 'PermissionsController@store');
        Route::get('{id}/edit', 'PermissionsController@edit');
        Route::post('{id}/update', 'PermissionsController@update');
        Route::post('{id}/delete', 'PermissionsController@destroy');
    });

    // ## =================================
    // Content manage
    // ================================ ##
    Route::group(['prefix' => 'articleCategory'], function () {
        Route::get('/', 'ArticleCategoryController@articleCategories');
        Route::post('ajaxArticleCategories/{page?}', 'ArticleCategoryController@ajaxArticleCategories');
        Route::get('create', 'ArticleCategoryController@create');
        Route::post('store', 'ArticleCategoryController@store');
        Route::get('{id}/edit', 'ArticleCategoryController@edit');
        Route::post('{id}/update', 'ArticleCategoryController@update');
        Route::post('{id}/delete', 'ArticleCategoryController@destroy');
    });
    Route::group(['prefix' => 'article'], function () {
        Route::get('/', 'ArticlesController@articles');
        Route::post('ajaxArticles/{page?}', 'ArticlesController@ajaxArticles');
        Route::get('create', 'ArticlesController@create');
        Route::post('store', 'ArticlesController@store');
        Route::get('{id}/edit', 'ArticlesController@edit');
        Route::post('{id}/update', 'ArticlesController@update');
        Route::post('{id}/delete', 'ArticlesController@destroy');
    });
    Route::group(['prefix' => 'tag'], function () {
        Route::get('/', 'TagsController@tags');
        Route::get('create', 'TagsController@create');
        Route::post('store', 'TagsController@store');
        Route::get('{id}/edit', 'TagsController@edit');
        Route::post('{id}/update', 'TagsController@update');
        Route::post('{id}/delete', 'TagsController@destroy');
    });



    // ## =================================
    // Question manage
    // ================================ ##
    Route::group(['prefix' => 'questionCategory'], function () {
        Route::get('/', 'QuestionCategoryController@questionCategories');
        Route::post('ajaxQuestionCategories/{page?}', 'QuestionCategoryController@ajaxQuestionCategories');
        Route::get('create', 'QuestionCategoryController@create');
        Route::post('store', 'QuestionCategoryController@store');
        Route::get('{id}/edit', 'QuestionCategoryController@edit');
        Route::post('{id}/update', 'QuestionCategoryController@update');
        Route::post('{id}/delete', 'QuestionCategoryController@destroy');
    });
    Route::group(['prefix' => 'question'], function () {
        Route::get('/', 'QuestionsController@questions');
        Route::post('ajaxQuestions/{page?}', 'QuestionsController@ajaxQuestions');
        Route::get('create', 'QuestionsController@create');
        Route::post('store', 'QuestionsController@store');
        Route::get('{id}/edit', 'QuestionsController@edit');
        Route::post('{id}/update', 'QuestionsController@update');
        Route::post('{id}/delete', 'QuestionsController@destroy');
    });

    // Links manage
    Route::group(['prefix' => 'links'], function () {
        Route::get('/', 'LinksController@links');
        Route::get('create', 'LinksController@create');
        Route::post('store', 'LinksController@store');
        Route::get('{id}/edit', 'LinksController@edit');
        Route::post('{id}/update', 'LinksController@update');
        Route::post('{id}/delete', 'LinksController@destroy');
    });
    Route::group(['prefix' => 'abouts', 'middleware' => 'role:supper_admin'], function () {
        Route::get('/', 'AboutsController@abouts');
        Route::get('create', 'AboutsController@create');
        Route::post('store', 'AboutsController@store');
        Route::get('{id}/edit', 'AboutsController@edit');
        Route::post('{id}/update', 'AboutsController@update');
        Route::post('{id}/delete', 'AboutsController@destroy');
    });

});







Route::get('now', function () {
    return date("Y-m-d H:i:s");
});

Route::auth();



/*
    点金车宝首页路由群组
 */
//Route::get('', 'HomeController@home');
//Route::get('home', 'HomeController@home');
//Route::get('home/home', 'HomeController@home');









/*
    车友电台路由群组

 */
Route::get('radio/index', 'RadioController@index');
Route::get('radio/lists', 'RadioController@lists');
/*
Route::get('/', function()
{
    Blade::setEscapedContentTags('[[', ']]');
    Blade::setContentTags('[[[', ']]]');

    return View::make('home');
});

*/
/*
    微信授权登录相关业务逻辑路由群组
 */
Route::get('authe', 'HomeController@authe');
Route::get('callback', 'HomeController@callback');
Route::any('wechat/api', 'WechatController@serve');

/*
    微信支付测试demo

 */
Route::any('home/pay', 'HomeController@pay');
Route::any('home/notify', 'HomeController@notify');




Route::get('brandregist', 'HomeController@brandregist');
Route::post('home/brandadd', 'HomeController@brandadd');
Route::get('article/{id}', 'ArticleController@show');

Route::post('comment', 'CommentController@store');



Route::get('shop/shop/index', 'HomeController@index');
Route::get('shop/shop/{id}', 'HomeController@shop');


Route::post('home/count', 'HomeController@count');
Route::get('home/getmore', 'HomeController@getmore');




/*
    改装车展售票系统路由群组
 */
Route::get('ticket', 'TicketController@index');

Route::get('ticket/success', 'TicketController@success');
Route::post('ticket/infosubmit', 'TicketController@infosubmit');
Route::any('ticket/notify', 'TicketController@notify');
Route::get('ticket/show', 'TicketController@show');
/*
    赛车漂移资格投票
 */
Route::get('race', 'RaceController@index');

Route::get('race/detail/{id}', 'RaceController@detail');
Route::post('race/infosubmit', 'RaceController@infosubmit');
Route::get('race/vote/{id}', 'RaceController@vote');


    Route::middleware('wechat.oauth:snsapi_base')->group(function () {
        // Route::get('/login', 'SelfAuthController@autoLogin')->name('login');
    });
    Route::middleware('wechat.oauth:snsapi_userinfo')->group(function () {
      //  Route::get('/vote','SelfAuthController@autoLogin');
        /*
            财富金字塔投票路由群组
         */
        Route::get('vote', 'VoteController@index');
        Route::get('vote/send', 'voteController@send');
        Route::get('vote/index', 'VoteController@index');
        Route::get('vote/my', 'VoteController@my');
        Route::get('vote/lists', 'VoteController@lists');
        Route::get('vote/positive', 'VoteController@positive');
        Route::get('vote/reg', 'voteController@reg');
        Route::get('vote/regs', 'voteController@regs');
        Route::get('vote/newslist', 'voteController@newslist');
        Route::get('vote/scroll', 'voteController@scroll');
        Route::get('vote/articledetail/{id}', 'voteController@articledetail');
        Route::post('upload/upimg','UploadController@upimg');    
        Route::post('vote/sub','VoteController@sub');  
        Route::get('vote/laws','VoteController@laws');
        Route::get('vote/get','VoteController@get'); 
        Route::post('vote/vote/{id}', 'voteController@vote');
        Route::get('vote/contact', 'voteController@contact')->name('contact');
        Route::get('vote/subs', 'voteController@subs'); 
        Route::get('vote/expXls', 'voteController@expXls'); 
        Route::get('vote/detail/{id}', 'voteController@detail');

    });





Route::get('/', function () {
    return view('welcome');
});

