<?php

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

Route::get('/', function () {
    return view('welcome');
});
 


Route::get('/insertCategory', function () {
    return view('insertCategory');
});

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
//main page
Route::get('/', [App\Http\Controllers\welcomeController::class, 'index'])->name('welcome');
//Category
Route::post('/insertCategory', [App\Http\Controllers\CategoryController::class, 'store'])->name('insertCategory'); 
Route::post('/insertCategory/store', [App\Http\Controllers\CategoryController::class, 'store'])->name('addCategory'); 
Route::get('/showCategory', [App\Http\Controllers\CategoryController::class, 'show'])->name('showCategory');
Route::get('/deleteCategory/{id}', [App\Http\Controllers\CategoryController::class, 'delete'])->name('deleteCategory');
//Phone(seller)
Route::post('/insertPhone/store', [App\Http\Controllers\PhoneController::class, 'store'])->name('addPhone');
Route::get('/showPhone', [App\Http\Controllers\PhoneController::class, 'showProduct'])->name('showPhone');
Route::get('/insertPhone', [App\Http\Controllers\PhoneController::class, 'create'])->name('insertPhone');
Route::get('/editPhone/{id}', [App\Http\Controllers\PhoneController::class, 'edit'])->name('editPhone');
Route::get('/deleteProduct/{id}', [App\Http\Controllers\PhoneController::class, 'delete'])->name('deletePhone');
Route::post('/updatePhone', [App\Http\Controllers\PhoneController::class, 'update'])->name('updatePhone');

//phone(user)
Route::get('/userShowPhone', [App\Http\Controllers\userShowPhone::class, 'show'])->name('userShowPhone');
Route::get('/phone_detail/{id}', [App\Http\Controllers\PhoneController::class, 'showProductDetail'])->name('product.detail');
Route::get('/random', [App\Http\Controllers\randomPhoneController::class, 'show'])->name('random');

Route::post('/addToCart', [App\Http\Controllers\CartController::class, 'add'])->name('add.to.cart'); // when user click on add to cart in product detail, id and quantity add to cart
Route::get('/showmyCart', [App\Http\Controllers\CartController::class, 'showMyCart'])->name('show.Cart');  //user view all items added to cart
Route::get('/deleteCart/{id}', [App\Http\Controllers\CartController::class, 'delete'])->name('deleteCart');

Route::post('/createorder', [App\Http\Controllers\OrderController::class, 'add'])->name('create.order');
Route::get('/Order', [App\Http\Controllers\OrderController::class, 'show'])->name('my.order');
//rating
Route::post('/insertRate/store', [App\Http\Controllers\ratingController::class, 'store'])->name('addRate');
Route::get('/showRate', [App\Http\Controllers\ratingController::class, 'showRate'])->name('showRate');
Route::get('/insertRate', [App\Http\Controllers\ratingController::class, 'create'])->name('insertRate');
Route::get('/deleteRate/{id}', [App\Http\Controllers\ratingController::class, 'delete'])->name('deleteRate');
//services
Route::get('/service', function () {
    return view('service');
});

//search
Route::get('/searchProduct', [App\Http\Controllers\userShowPhone::class, 'search'])->name('search.product');

//register RepairServices
Route::get('/insertRepairServices', function () {
    return view('insertRepairServices');
});
Route::post('/insertRepairServices/store', [App\Http\Controllers\CompanyController::class, 'store'])->name('insertRepairServices'); 
Route::get('/registerStatus', function () {
    return view('registerStatus');
});
Route::get('/showCompanyRegister', [App\Http\Controllers\CompanyController::class, 'show'])->name('showRegisterCompany');
Route::get('/showCompanyRegister/{id}', [App\Http\Controllers\CompanyController::class, 'approve'])->name('approveRegisterCompany');



//register shop
Route::post('/insertrepairShop/store', [App\Http\Controllers\ShopController::class, 'store'])->name('addShop');
Route::get('/showShop', [App\Http\Controllers\ShopController::class, 'show'])->name('showShop');
Route::get('/insertrepairShop', [App\Http\Controllers\ShopController::class, 'create'])->name('insertShop');
Route::get('/editrepairShop/{id}', [App\Http\Controllers\ShopController::class, 'edit'])->name('editShop');
Route::get('/deleterepairShop/{id}', [App\Http\Controllers\ShopController::class, 'delete'])->name('deleteShop');
Route::post('/updaterepairShop', [App\Http\Controllers\ShopController::class, 'update'])->name('updateShop');


Route::get('/userShowShop', [App\Http\Controllers\userShowShop::class, 'show'])->name('userShowShop');
Route::get('/searchShop', [App\Http\Controllers\userShowShop::class, 'search'])->name('search.shop');
//paypal
Route::post('/paypal', [App\Http\Controllers\PaymentController::class, 'payWithpaypal'])->name('paypal');
// route for check status of the payment
Route::get('/status', [App\Http\Controllers\PaymentController::class, 'getPaymentStatus'])->name('status');

Auth::routes();


