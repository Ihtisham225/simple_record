<?php

use App\Http\Controllers\BrandController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\SellerController;
use Facade\FlareClient\View;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

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

Route::get('/', function () {
    
    return Redirect::route('login' 
    // [
    //     'canLogin' => Route::has('login'),
    //     'canRegister' => Route::has('register'),
    //     'laravelVersion' => Application::VERSION,
    //     'phpVersion' => PHP_VERSION,
    // ]
);
});

// Route::get('register', function() {
//     return Redirect::route('login');
// });


Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard2', function () {
    return Redirect::route('list-product'); //old: Inertia::render('dashboard')
})->name('dashboard2');


//Choosing a plain route
Route::get('select_plain', function(){
    return Inertia::render('Auth/SelectPlain');
})->name('select_plain');

//Checkout route
Route::get('/checkout', [CustomerController::class, 'checkout'])->name('checkout');
Route::post('/new-user', [CustomerController::class, 'newUser'])->name('newUser');



/**
 * 
 * Custom Routes
*/


/**
 * 
 * Dashboard Routes Starts here
 */

Route::get('/dashboard', [DashboardController::class, 'dashboard'])->name('dashboard')->middleware('auth');


////////////////////////////// END OF Dashboard ROUTE //////////////////////////////////////////////////////////


/**
 * 
 * Products Routes Starts here
 */
Route::get('/list', [ProductController::class, 'list'])->name('list-product')->middleware('auth');
Route::get('/create-product', [ProductController::class, 'create'])->name('create-product')->middleware('auth');
Route::post('/save-product', [ProductController::class, 'save'])->name('save-product')->middleware('auth');
Route::get('/edit-product/{id}', [ProductController::class, 'edit'])->name('edit-product')->middleware('auth');
Route::post('/update-product', [ProductController::class, 'update'])->name('update-product')->middleware('auth');
Route::get('/product-detail/{id}', [ProductController::class, 'detail'])->name('product-detail')->middleware('auth');
Route::delete('/delete-product/{id}', [ProductController::class, 'delete'])->name('delete-product')->middleware('auth');
Route::get('/sell-product/{id}', [ProductController::class, 'sell'])->name('sell-product')->middleware('auth');
Route::post('/sold-product', [ProductController::class, 'sold'])->name('sold-product')->middleware('auth');
Route::delete('/return-product/{id}', [ProductController::class, 'return'])->name('return-product')->middleware('auth');
Route::get('/invoice-product/{id}', [ProductController::class, 'invoice'])->name('invoice-product')->middleware('auth');

////////////////////////////// END OF PRODUCT ROUTES //////////////////////////////////////////////////////////




/**
 * 
 * Brands Routes Starts here
 */
Route::get('/list-brand', [BrandController::class, 'list'])->name('list-brand')->middleware('auth');
Route::get('/create-brand', [BrandController::class, 'create'])->name('create-brand')->middleware('auth');
Route::post('/save-brand', [BrandController::class, 'save'])->name('save-brand')->middleware('auth');
Route::get('/edit-brand/{id}', [BrandController::class, 'edit'])->name('edit-brand')->middleware('auth');
Route::post('/update-brand', [BrandController::class, 'update'])->name('update-brand')->middleware('auth');
Route::delete('/delete-brand/{id}', [BrandController::class, 'delete'])->name('delete-brand')->middleware('auth');

////////////////////////////// END OF BRAND ROUTES //////////////////////////////////////////////////////////




/**
 * 
 * Sellers Routes Starts here
 */
Route::get('/list-seller', [SellerController::class, 'list'])->name('list-seller')->middleware('auth');
Route::get('/create-seller', [SellerController::class, 'create'])->name('create-seller')->middleware('auth');
Route::post('/save-seller', [SellerController::class, 'save'])->name('save-seller')->middleware('auth');
Route::get('/edit-seller/{id}', [SellerController::class, 'edit'])->name('edit-seller')->middleware('auth');
Route::post('/update-seller', [SellerController::class, 'update'])->name('update-seller')->middleware('auth');
Route::get('/seller-detail/{id}', [SellerController::class, 'detail'])->name('seller-detail')->middleware('auth');
Route::delete('/delete-seller/{id}', [SellerController::class, 'delete'])->name('delete-seller')->middleware('auth');

////////////////////////////// END OF SELLER ROUTES //////////////////////////////////////////////////////////




/**
 * 
 * Customer Routes Starts here
 */
Route::get('/list-customer', [CustomerController::class, 'list'])->name('list-customer')->middleware('auth');
Route::get('/create-customer', [CustomerController::class, 'create'])->name('create-customer')->middleware('auth');
Route::post('/save-customer', [CustomerController::class, 'save'])->name('save-customer')->middleware('auth');
Route::get('/edit-customer/{id}', [CustomerController::class, 'edit'])->name('edit-customer')->middleware('auth');
Route::post('/update-customer', [CustomerController::class, 'update'])->name('update-customer')->middleware('auth');
Route::get('/customer-detail/{id}', [CustomerController::class, 'detail'])->name('customer-detail')->middleware('auth');
Route::delete('/delete-customer/{id}', [CustomerController::class, 'delete'])->name('delete-customer')->middleware('auth');

////////////////////////////// END OF CUSTOMER ROUTES //////////////////////////////////////////////////////////


/******************************************* END OF CUSTOM ROUTES *********************************************************************************** */


