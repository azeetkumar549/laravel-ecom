<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\AddressController;
use App\Http\Controllers\CouponController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\OrderItemController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PaytmController;

// Verb	    URI		        Action	Route Name
// GET	    /photos		    index	photos.index
// GET	    /photos/create	create	photos.create
// POST	    /photos/store	        photos.store
// GET	    /photos/{photo}/show	photos.show
// GET	    /photos/{photo}/edit	edit	photos.edit
// PUT/PATCH/photos/{photo}	update	photos.update
// DELETE	/photos/{photo}	destroy	photos.destroy


Route::resource("category",CategoryController::class);
Route::resource("product",ProductController::class);
Route::resource("coupon",CouponController::class);
Route::resource("address",AddressController::class);
Route::resource("order",OrderController::class);
Route::resource("order-item",OrderItemController::class);


Route::get("/",[HomeController::class,"home"])->name("home");
Route::get("/search",[HomeController::class,"search"])->name('search');
Route::get("/cart",[HomeController::class,"cart"])->name('cart');
Route::get("/view/{id}/",[HomeController::class,"product_view"])->name('view');


// auth required
Route::middleware('auth')->group(function () {
    Route::post("/add-to-cart/{id}",[HomeController::class, "add_to_cart"])->name("addCart");
    Route::post("/add-coupon",[HomeController::class, "addCoupon"])->name("addCoupon");
    Route::post("/store-address",[HomeController::class, "storeAddress"])->name("storeAddress");
    Route::get("/remove-coupon",[HomeController::class, "removeCoupon"])->name("removeCoupon");
    Route::get("/checkout",[HomeController::class,"checkout"])->name('checkout');
    Route::get("/payment",[HomeController::class,"payment"])->name('payment');
    Route::get("/remove-from-cart/{id}",[HomeController::class, "remove_from_cart"])->name("removeCart");
    Route::get("/remove-item-from-cart/{id}",[HomeController::class, "removeItemFromCart"])->name("removeItemCart");
    //payment routes
    Route::get("/payment/now",[PaytmController::class,"order"])->name('paynow');
    Route::post("/payment/callback",[PaytmController::class,"paymentCallback"])->name('paymentCallback');
});




// ---------------------------------------------- admin work -----------------
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';
