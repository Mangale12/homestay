<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CkeditorController;
use App\Http\Controllers\CustomPageController;
use App\Http\Controllers\frontend\FrontendController;
use App\Http\Controllers\HomePageSettingController;
use App\Http\Controllers\MediaController;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\PermissionController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RoleController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SocialSettingsController;
use App\Http\Controllers\SiteSettingsController;
use App\Http\Controllers\SocialController;
use App\Http\Controllers\SubCategoryController;
use App\Http\Controllers\UserController;
use Illuminate\Http\Request;

use App\Http\Controllers\HomebannerController;
use App\Http\Controllers\RoomController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\TestimonialController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\FoodController;
use App\Http\Controllers\AboutUsController;
use App\Http\Controllers\SocialShareController;
use App\Http\Controllers\ReviewsController;


// use Analytics;
use Spatie\Analytics\Period;
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
Route::get('clear', function () {
	Artisan::call('cache:clear');
	Artisan::call('config:clear');
	Artisan::call('config:cache');
});
Route::get('tests', function(){
    return view("test");
})->name("test.file");
Route::post("post/test", [PostController::class, "testf"])->name("test.file");

Route::get('/test',function(){
	//fetch the most visited pages for today and the past week
	$a = Analytics::fetchMostVisitedPages(Period::days(7));

	//fetch visitors and page views for the past week
	$b = Analytics::fetchVisitorsAndPageViews(Period::days(7));
  	echo "<pre>"; print_r($a); die();
});
Route::group(['prefix' => 'dashboard',  'middleware' => 'auth'], function () {



    Route::group(['middleware' => ['role:Super Admin']],function(){
        Route::get('/social_settings', [SocialSettingsController::class, 'index'])->name('social');
        Route::patch('/social_settings/edit/{id}', [SocialSettingsController::class, 'update'])->name('socialUpdate');
        Route::resource('/settings', SiteSettingsController::class);
        Route::resource('/roles', RoleController::class);
        Route::resource('/permissions', PermissionController::class);
        Route::get('/homepageSettings',[HomePageSettingController::class,'index'])->name('homepageSetting.index');
        Route::get('/homepageSettings/create',[HomePageSettingController::class,'create'])->name('homepageSetting.create');
        Route::post('/homepageSettings',[HomePageSettingController::class,'store'])->name('homepageSetting.store');
        Route::get('/homepageSettings/{id}/edit',[HomePageSettingController::class,'edit'])->name('homepageSetting.edit');
        Route::post('/homepageSettings/{id}/edit',[HomePageSettingController::class,'update'])->name('homepageSetting.update');
        Route::delete('/homepageSettings/{id}/delete',[HomePageSettingController::class,'destroy'])->name('homepageSetting.destroy');
        Route::resource('about-us', AboutUsController::class);

        Route::get('/homepageSettings/update-status',[HomePageSettingController::class,'update_status'])->name('cat_section.update_status');




        Route::get('/homepageAdSettings',[HomePageSettingController::class,'ad'])->name('homepageAd');
        Route::get('/singleNewsAdSettings',[HomePageSettingController::class,'ad'])->name('singleNewsAd');
        Route::get('/CategoryAdSettings',[HomePageSettingController::class,'ad'])->name('categoryAd');
        Route::get('/CategoryAdSettings/delete',[HomePageSettingController::class,'ad_delete'])->name('add.delete_image');

        Route::patch('/homepageAdSettings/edit/{id}', [HomePageSettingController::class, 'adStore'])->name('homepageAd.store');
        Route::patch('/singleNewsAdSettings/edit/{id}', [HomePageSettingController::class, 'adStore'])->name('singleNewsAd.store');
        Route::patch('/CategoryAdSettings/edit/{id}', [HomePageSettingController::class, 'adStore'])->name('categoryAd.store');




        Route::get('/categories/update-status',[CategoryController::class,'update_status'])->name('category.update_status');
        Route::get('/categories/update-feature',[CategoryController::class,'update_feature'])->name('category.update_feature');

        Route::get('/sub-categories/update-status',[SubCategoryController::class,'update_status'])->name('sub-category.update_status');

        Route::resource('/categories', CategoryController::class);
        Route::get('category/food/create',[CategoryController::class, 'food_create'])->name('foodcategories.create');
        Route::get('category/food',[CategoryController::class, 'food_index'])->name('foodcategories.index');
        Route::post('category/create',[CategoryController::class, 'food_store'])->name('foodcategories.store');
        Route::get('category/edit/{id}',[CategoryController::class, 'food_edit'])->name('foodcategories.edit');
        Route::post('category/update/{id}',[CategoryController::class, 'food_update'])->name('foodcategories.update');
        Route::delete('category/delete/{id}',[CategoryController::class, 'food_destroy'])->name('foodcategories.delete');
        Route::resource('/sub-categories', SubCategoryController::class);
        Route::resource('/pages', PageController::class);

        Route::get('/menu_settings',[MenuController::class,'index'])->name('menu_settings');
        Route::get('/menu_settings/create', [MenuController::class,'create'])->name('menu_settings.create');
        Route::post('/menu_settings/create', [MenuController::class,'store'])->name('menu_settings.store');
        Route::get('/menu_settings/edit/{slug}', [MenuController::class,'edit'])->name('menu_settings.edit');
        Route::post('/menu_settings/edit/{slug}', [MenuController::class,'update'])->name('menu_settings.update');
        Route::get('/menu_settings/delete/{slug}', [MenuController::class,'destroy'])->name('menu_settings.destroy');
        Route::post('/menu_settings/get_menu_items',[MenuController::class,'get_menu_items'])->name('get_menu_items');


        Route::get('/medias',[MediaController::class,'index'])->name('medias');
        Route::post('/delete',[MediaController::class,'delete'])->name('medias.delete');
        Route::get('/medias/create',[MediaController::class, 'create'])->name('medias.create');
        Route::post('/medias/store',[MediaController::class, 'store'])->name('medias.store');


        //home stay yogi bolta haistart
        Route::resource('homebanner', HomebannerController::class);
        Route::get('homebanner/delete/{id}',[HomebannerController::class, 'delete'])->name('homebanners.delete');

        Route::resource('room', RoomController::class);
        Route::get('room/delete/{id}',[RoomController::class,'delete'])->name('rooms.delete');
        Route::post('room/image',[RoomController::class, 'removeImage'])->name('roomimage.remove');

        Route::resource('service', ServiceController::class);
        Route::get('service/delete/{id}',[ServiceController::class, 'delete'])->name('services.delete');

        Route::resource('testimonial', TestimonialController::class);
        Route::get('testimonials/delete/{id}',[TestimonialController::class,'delete'])->name('testimonials.delete');

        Route::get('inquiry', [HomeController::class, 'inquiry'])->name('inquiry.index');
        Route::get('new_inquiry', [HomeController::class, 'inquiry'])->name('inquiry.new');
        Route::get('old_inquiry', [HomeController::class, 'inquiry'])->name('inquiry.old');
        Route::post('inquiry/view', [HomeController::class, 'inquiryView'])->name('inquiry.view');
        Route::get('inquiry/delete/{id}', [HomeController::class, 'inquiryDelete'])->name('inquiry.delete');

        Route::resource('food',FoodController::class);
        Route::get('food/delete/{id}',[FoodController::class,'delete'])->name("food.delete");
        Route::get('subscribers',[HomeController::class,'subscriber'])->name('admin.subscriber');
        Route::get('video/create',[MediaController::class, 'createVideo'])->name('video.create');
        Route::get('video',[MediaController::class, 'videoIndex'])->name('video.index');
        Route::post('video/store',[MediaController::class, 'storeVideo'])->name('video.store');
        Route::get('video/edit/{id}',[MediaController::class, 'videoEdit'])->name('video.edit');
        Route::get('video/update/{id}',[MediaController::class, 'videoUpdate'])->name('video.update');
        Route::get('video/delete/{id}',[MediaController::class, 'videoDelete'])->name('video.delete');

        Route::get('document',[HomeController::class, 'documentIndex'])->name('document.index');
        Route::get('document/create',[HomeController::class, 'documentCreate'])->name('document.create');
        Route::post('document/store',[HomeController::class, 'documentStore'])->name('document.store');
        Route::get('document/edit/{id}',[HomeController::class, 'documentEdit'])->name('document.edit');
        Route::post('document/update/{id}',[HomeController::class, 'documentUpdate'])->name('document.update');
        Route::get('document/delete/{id}',[HomeController::class, 'documentDelete'])->name('document.delete');
        Route::get('/', function () {
            return view('admin.dashboard');
        })->name('dashboard');

    });



	Route::post('ckeditor/upload', [CkeditorController::class,'upload'])->name('ckeditor.upload');
    Route::get('/posts/update-feature',[PostController::class,'update_feature'])->name('post.update_feature');
    Route::get('/posts/update-trending',[PostController::class,'update_trending'])->name('post.update_trending');
    Route::get('/posts/update-banner-news',[PostController::class,'update_banner'])->name('post.update_banner_news');
    Route::post('/deleteall', [PostController::class,'deleteAll'])->name('delete_all');
    Route::get('/posts/delete/{slug}',[PostController::class,'delete'])->name('delete.post');
  	Route::post('file-upload/upload-large-files', [PostController::class, 'uploadLargeFiles'])->name('files.upload.large');
  	Route::post('featured-image/get', [PostController::class, 'get_featured_img'])->name('featured_img.get');
    Route::resource('/posts',PostController::class);
    Route::get('/profile',[ProfileController::class,'edit_profile'])->name('profile.edit');
    Route::post('/profile',[ProfileController::class,'update_profile'])->name('profile.update');
    Route::get('/profile/change_password',[ProfileController::class,'changePassword'])->name('profile.change_password');
    Route::post('/profile/change_password',[ProfileController::class,'updatePassword'])->name('profile.update_password');
    Route::get('pagination/fetch_data',[PostController::class,'modal_pagination'])->name('ajax.pagination');
    Route::get('post/view/pdf/{id}',[PostController::class,'view_pdf'])->name('post.view_pdf');




    // Route::get('/newsletter', [NewsletterController::class,'index'])->name('newsletters.index');
	// Route::post('/newsletter/send', [NewsletterController::class,'send'])->name('newsletters.send');

    Route::post('/subcat/get_subcat_by_category',[SubCategoryController::class,'sub_cat_by_category'])->name('subcat.get_subcat_by_category');



    // Route::get('/blogs/update-status',[BlogController::class,'update_status'])->name('blog.update_status');
    // Route::get('/programs/update-status',[ProgramController::class,'update_status'])->name('program.update_status');

    // Route::get('/banners/update-status',[BannerController::class,'update_status'])->name('banner.update_status');
    // Route::get('/sliders/update-status',[SliderController::class,'update_status'])->name('slider.update_status');





    // Route::resource('/blogs',BlogController::class);



    // Route::resource('/testimonials', TestimonialController::class);
    // Route::resource('/teams', TeamController::class);
    // Route::resource('/events', EventController::class);
    // Route::resource('/banners', BannerController::class);
    // Route::resource('/sliders', SliderController::class);
    // Route::resource('/steps', StepController::class);
    // Route::resource('/medias', MediaController::class);

	// Route::resource('/gallery', GalleryController::class);

    // Route::get('gallery/photo',[GalleryController::class,'index'])->name('photo.index');
    // Route::get('gallery/video',[GalleryController::class,'index'])->name('video.index');
    // Route::get('gallery/add-photo',[GalleryController::class,'create'])->name('photo.create');
    // Route::get('gallery/add-video',[GalleryController::class,'create'])->name('video.create');
    // Route::post('/gallery/photo',[GalleryController::class,'upload_photo'])->name('upload_photo');
    // Route::post('/gallery/video',[GalleryController::class,'upload_video'])->name('upload_video');
    // Route::delete('/photo/destroy/{id}', [GalleryController::class,'delete_photo'])->name('delete.photo');
    // Route::delete('/video/destroy/{id}', [GalleryController::class,'delete_video'])->name('delete.video');



    // Route::get('/contact', [MessageController::class,'index'])->name('messages.index');
	// Route::get('/contact/{id}', [MessageController::class,'show'])->name('messages.show');
	// Route::delete('/contact/{id}', [MessageController::class,'delete'])->name('messages.destroy');

    // Route::get('/jobs', [MessageController::class,'index'])->name('job.index');
	// Route::get('/jobs/{id}', [MessageController::class,'show'])->name('job.show');
	// Route::delete('/jobs/{id}', [MessageController::class,'delete'])->name('job.destroy');

    // Route::get('/volunteer', [MessageController::class,'index'])->name('volunteer.index');
	// Route::get('/volunteer/{id}', [MessageController::class,'show'])->name('volunteer.show');
	// Route::delete('/volunteer/{id}', [MessageController::class,'delete'])->name('volunteer.destroy');

    // Route::get('/admission', [MessageController::class,'index'])->name('admission.index');
	// Route::get('/admission/{id}', [MessageController::class,'show'])->name('admission.show');
	// Route::delete('/admission/{id}', [MessageController::class,'delete'])->name('admission.destroy');

	// Route::resource('/opportunity', OpportunityController::class);
	// Route::resource('/programs', ProgramController::class);


});

Route::resource('users', UserController::class);
Route::post('users/login',[UserController::class,'login'])->name('users.login');
Route::post('reviews',[ReviewsController::class,'store'])->name('reviews.store');
Route::get('/auth/github/redirect',[SocialController::class,'githubRedirect'])->name('githubLogin');
Route::get('/auth/github/callback',[SocialController::class,'callback']);
Route::get('/email-verification/{id}',[UserController::class,'email_verified'])->name("user.email_verification");

// Route::get('auth/facebook', [FacebookSocialiteController::class, 'redirectToFB']);
// Route::get('callback/facebook', [FacebookSocialiteController::class, 'handleCallback']);
require __DIR__ . '/auth.php';


Route::get('/',[FrontendController::class,'index'])->name('home');
Route::get('room/details/{id}',[FrontendController::class,'room_details'])->name('frontend.room_details');
Route::get('about-us/',[FrontendController::class,'about_us'])->name('frontend.about_us');
Route::get('contact-us/',[FrontendController::class,'contact_us'])->name('frontend.contact_us');
Route::get('room/',[FrontendController::class,'room'])->name('frontend.room');
Route::post('/layout1', [FrontendController::class,'layout'])->name('layout1');
Route::post('/layout2', [FrontendController::class,'layout'])->name('layout2');
Route::post('/layout3', [FrontendController::class,'layout'])->name('layout3');
Route::post('/layout4', [FrontendController::class,'layout'])->name('layout4');
Route::post('/layout5', [FrontendController::class,'layout'])->name('layout5');
Route::get('/news/single-news/{slug}',[FrontendController::class,'single_news'])->name('single_news');
Route::get('/category/{id}',[FrontendController::class,'news_category'])->name('news_category');
Route::get('/category/{category}/{id}',[CustomPageController::class,'sub_category'])->name('sub_category');
Route::get('/book',[FrontendController::class,'book'])->name('frontend.book');
Route::get('/food',[FrontendController::class,'food'])->name('frontend.food');
Route::get('/gallery',[FrontendController::class,'gallery'])->name('frontend.gallery');
Route::get('/gallery/video',[FrontendController::class,'videoGallery'])->name('frontend.video');
Route::post('/subscribers',[FrontendController::class,'subscriber'])->name('frontend.subscriber');
Route::get('/trekks',[FrontendController::class,'trekks'])->name('frontend.terkks');


Route::post('inquiry/store', [HomeController::class, 'inquiryStore'])->name('inquery.store');

Route::get('/search', [FrontendController::class,'search'])->name('search');



Route::get('/{slug}',[CustomPageController::class,'index'])->name('custom_page');

// Route::get('/programs',[FrontendController::class,'program'])->name('programs');
// Route::get('/events',[FrontendController::class,'events'])->name('events');
// Route::get('/events/{id}',[FrontendController::class,'event_detail'])->name('event.detail');
// Route::get('/programs/{id}',[FrontendController::class,'program_detail'])->name('program.detail');
// Route::get('/videos',[FrontendController::class,'video_gallery'])->name('videos');
// Route::get('/photos',[FrontendController::class,'photo_gallery'])->name('photos');
// Route::get('/teams',[FrontendController::class,'teams'])->name('teams');
// Route::get('/team/{id}',[FrontendController::class,'team_detail'])->name('team.detail');

// Route::get('/contact',[FrontendController::class,'contact'])->name('contact');

// Route::post('/contact-us',[FrontendController::class,'contact_us'])->name('contact_us');
// Route::get('/admission-procedure',[FrontendController::class,'admission'])->name('admission');
// Route::get('/job-vacancy',[FrontendController::class,'job'])->name('job');
// Route::get('/job-detail/{id}',[FrontendController::class,'job_detail'])->name('job-detail');
// Route::get('/volunteer',[FrontendController::class,'volunteer'])->name('volunteer');
// Route::get('/donate-us',[FrontendController::class,'donate'])->name('donate');
// Route::post('/subscribers', [NewsletterController::class,'subscriber'])->name('subscriber');


// Route::get('/media-coverages',[FrontendController::class,'mediaCoverages'])->name('media-coverages');
// Route::get('/media-coverages/{id}',[FrontendController::class,'mediaCoveragesDetail'])->name('media-coverage.detail');


Route::get('social/share', [SocialController::class, 'index'])->name('socialshare');
