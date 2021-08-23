<?php

use App\Http\Controllers\Admin\AuthorController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\CkeditorFileUploadController;
use App\Http\Controllers\Admin\CommentController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\PermissionController;
use App\Http\Controllers\Admin\PostController;
use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\Admin\SettingController;
use App\Http\Controllers\DetailsPageController;
use App\Http\Controllers\ExampleController;
use App\Http\Controllers\HomePageController;
use App\Http\Controllers\ListingPageController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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

Route::get('/', [HomePageController::class, 'index']);
Route::get('/category/{id}', [ListingPageController::class, 'listing']);
Route::get('/author/{id}', [ListingPageController::class, 'listing']);
Route::get('/listing', [ListingPageController::class, 'index']);
Route::get('/details/{slug}', [DetailsPageController::class, 'index'])->name('details');
Route::post('/comment', [DetailsPageController::class, 'comment'])->name('comment');

// Mail
Route::get('/mail/basic', [ExampleController::class, 'basic']);
Route::get('/mail/html', [ExampleController::class, 'html']);
Route::get('/mail/attachment', [ExampleController::class, 'mailAtachment']);

// SESSION ROUTE
Route::get('/session/set', [ExampleController::class, 'session_set']);
Route::get('/session/get', [ExampleController::class, 'session_get']);
Route::get('/session/delete', [ExampleController::class, 'session_delete']);

// COOCKIE ROUTE
Route::get('/cookie/set', [ExampleController::class, 'cookie_set']);
Route::get('/cookie/get', [ExampleController::class, 'cookie_get']);


Auth::routes();
// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::group(['prefix' => 'back', 'middleware' => 'auth'], function () {

    Route::get('/', [DashboardController::class, 'index']);

    // <!-- Category Route List -->
    Route::get('/categories', [CategoryController::class, 'index'])->name('category.index')->middleware('permission:Category List|All');
    Route::get('/category/create', [CategoryController::class, 'create'])->name('category.create')->middleware('permission:Category Add|All');
    Route::post('/category/store', [CategoryController::class, 'store'])->name('category.store')->middleware('permission:Category Add|All');
    Route::get('/category/edit/{id}', [CategoryController::class, 'edit'])->name('category.edit')->middleware('permission:Category Update|All');
    Route::post('/category/update/{id}', [CategoryController::class, 'update'])->name('category.update')->middleware('permission:Category Update|All');
    Route::post('/category/destroy/{id}', [CategoryController::class, 'destroy'])->name('category.destroy')->middleware('permission:Category Delete|All');

    Route::post('/category/status/{id}', [CategoryController::class, 'category_status'])->name('category.category-status')->middleware('permission:Category List|All');

    // <!-- Post Route List -->
    Route::get('/posts', [PostController::class, 'index'])->name('post.index')->middleware('permission:Post List|All');
    Route::get('/post/create', [PostController::class, 'create'])->name('post.create')->middleware('permission:Post Add|All');
    Route::post('/post/store', [PostController::class, 'store'])->name('post.store')->middleware('permission:Post Add|All');
    Route::get('/post/edit/{id}', [PostController::class, 'edit'])->name('post.edit')->middleware('permission:Post Update|All');
    Route::post('/post/update/{id}', [PostController::class, 'update'])->name('post.update')->middleware('permission:Post Update|All');
    Route::post('/post/destroy/{id}', [PostController::class, 'destroy'])->name('post.destroy')->middleware('permission:Post Delete|All');

    Route::post('/post/status/{id}', [PostController::class, 'post_status'])->name('post.post-status')->middleware('permission:Post List|All');
    Route::post('/post/hot/news/{id}', [PostController::class, 'hot_news'])->name('post.hot-news')->middleware('permission:Post Update|All');

    Route::post('/ckeditor', [CkeditorFileUploadController::class, 'store'])->name('ckeditor.store');
    // <!-- Comment Route List -->
    Route::get('/comment/{id}', [CommentController::class, 'index'])->name('comment.view')->middleware('permission:Comment View|All');
    Route::get('/comment/replay/{id}', [CommentController::class, 'replay'])->name('comment.replay')->middleware('permission:Comment Reply|All');
    Route::post('/comment/store', [CommentController::class, 'store'])->name('comment.store')->middleware('permission:Comment Reply|All');
    Route::post('/comment/status/{id}', [CommentController::class, 'status'])->name('comment.status')->middleware('permission:Comment Approval|All');

    // <!-- Permission Route List -->
    Route::get('/permissions', [PermissionController::class, 'index'])->name('permission.index')->middleware('permission:Permission List|All');
    Route::get('/permission/create', [PermissionController::class, 'create'])->name('permission.create')->middleware('permission:Permission Add|All');
    Route::post('/permission/store', [PermissionController::class, 'store'])->name('permission.store')->middleware('permission:Permission Add|All');
    Route::get('/permission/edit/{id}', [PermissionController::class, 'edit'])->name('permission.edit')->middleware('permission:Permission Update|All');
    Route::post('/permission/update/{id}', [PermissionController::class, 'update'])->name('permission.update')->middleware('permission:Permission Update|All');
    Route::post('/permission/destroy/{id}', [PermissionController::class, 'destroy'])->name('permission.destroy')->middleware('permission:Permission Delete|All');

    // <!-- Role Route List -->
    Route::get('/roles', [RoleController::class, 'index'])->name('role.index')->middleware('permission:Role List|All');
    Route::get('/role/create', [RoleController::class, 'create'])->name('role.create')->middleware('permission:Role Add|All');
    Route::post('/role/store', [RoleController::class, 'store'])->name('role.store')->middleware('permission:Role Add|All');
    Route::get('/role/edit/{id}', [RoleController::class, 'edit'])->name('role.edit')->middleware('permission:Role Update|All');
    Route::post('/role/update/{id}', [RoleController::class, 'update'])->name('role.update')->middleware('permission:Role Update|All');
    Route::post('/role/destroy/{id}', [RoleController::class, 'destroy'])->name('role.destroy')->middleware('permission:Role Delete|All');

    // <!-- Author Route List -->
    Route::get('/authors', [AuthorController::class, 'index'])->name('author.index')->middleware('permission:Author List|All');
    Route::get('/author/create', [AuthorController::class, 'create'])->name('author.create')->middleware('permission:Author Add|All');
    Route::post('/author/store', [AuthorController::class, 'store'])->name('author.store')->middleware('permission:Author Add|All');
    Route::get('/author/edit/{id}', [AuthorController::class, 'edit'])->name('author.edit')->middleware('permission:Author Update|All');
    Route::post('/author/update/{id}', [AuthorController::class, 'update'])->name('author.update')->middleware('permission:Author Update|All');
    Route::post('/author/destroy/{id}', [AuthorController::class, 'destroy'])->name('author.destroy')->middleware('permission:Author Delete|All');

    // Setting Route List
    Route::get('/setting/edit', [SettingController::class, 'index'])->name('setting.edit')->middleware('permission:System Settings|All');
    Route::post('/setting/update', [SettingController::class, 'update'])->name('setting.update')->middleware('permission:System Settings|All');
});

Route::group(['prefix' => 'laravel-filemanager', 'middleware' => ['permission:Post Add|All']], function () {
    \UniSharp\LaravelFilemanager\Lfm::routes();
});
