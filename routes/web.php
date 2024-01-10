<?php

use App\Livewire\Admin\Brand\Index as BrandIndex;
use App\Livewire\Admin\Category\Index;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Livewire\Livewire;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome'); 
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();   

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::prefix('/admin')->middleware(['auth','is_admin'])->group(function()
{

    Route::get('/dashboard',[App\Http\Controllers\Admin\DashboardController::class,'index'])->name('admin.index');
    
    //Category Route
    Route::controller(App\Http\Controllers\Admin\CategoryController::class)->group(function()
    {
    Route::get('/category','index')->name('admin.category');
    Route::get('/category/create','create')->name('admin.category.create'); 
    Route::post('/category/store','store')->name('admin.category.store');
    Route::get('/category/{category}/edit','edit');
    Route::put('/category/{category}/update','update');

    });



    Route::get('/brand/index',App\Livewire\Admin\Brand\Index::class)->name('admin.brand.index');
    Route::get('/brand/create',[App\Livewire\Admin\Brand\Index::class,'createBrand'])->name('admin.brand.create');
    Route::post('/brand/store',[App\Livewire\Admin\Brand\Index::class,'storeBrand'])->name('admin.brand.store');
    
    // Route::put('/brand/update',[App\Livewire\Admin\Brand\Index::class,'updateBrand'])->name('admin.brand.update');
    
    
});

// Route::get('/factory',App\Livewire\FactoryPost::class)->name('admin.factory');