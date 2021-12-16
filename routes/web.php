<?php
use Illuminate\Support\Facades\Route;

/*
 * |--------------------------------------------------------------------------
 * | Web Routes
 * |--------------------------------------------------------------------------
 * |
 * | Here is where you can register web routes for your application. These
 * | routes are loaded by the RouteServiceProvider within a group which
 * | contains the "web" middleware group. Now create something great!
 * |
 */

// Main page routes
Route::get('/', function () {
    return view('welcome');
})->name('welcome.index');

// Lessons routes
Route::get('/lessons', 'App\Http\Controllers\LessonController@index')->name('lessons.index');
Route::post('/lessons', 'App\Http\Controllers\EnrollmentController@enrollment')->name('lessons.enrollment')->middleware('auth');
Route::get('/lessons/{id}', 'App\Http\Controllers\LessonController@show')->name('lessons.show');

// Products routes
Route::get('/products', 'App\Http\Controllers\ProductController@index')->name('products.index');
Route::post('/products', 'App\Http\Controllers\OrderController@order')->name('products.order')->middleware('auth');
Route::get('/products/{id}', 'App\Http\Controllers\ProductController@show')->name('products.show');

// Enrollments routes
Route::get('/enrollments', 'App\Http\Controllers\EnrollmentController@index')->name('enrollments.index')->middleware('auth', 'admin');
Route::delete('/enrollments/{id}', 'App\Http\Controllers\EnrollmentController@destroy')->name('enrollments.destroy')->middleware('auth', 'admin');

// Orders routes
Route::get('/orders', 'App\Http\Controllers\OrderController@index')->name('orders.index')->middleware('auth', 'admin');
Route::delete('/orders/{id}', 'App\Http\Controllers\OrderController@destroy')->name('orders.destroy')->middleware('auth', 'admin');

Auth::routes();

// Home routes
Route::get('/home', [
    App\Http\Controllers\HomeController::class,
    'index'
])->name('home');
