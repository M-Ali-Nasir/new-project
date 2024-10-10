<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\auth\AuthController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'homeView'])->name('home');
Route::get('/about-us', [HomeController::class, 'aboutView'])->name('about');
Route::get('/gallery', [HomeController::class, 'galleryView'])->name('gallery');
Route::get('/contact-us', [HomeController::class, 'contactView'])->name('contact');
Route::get('/blogs', [HomeController::class, 'blogsView'])->name('blogs');
Route::get('/rent', [HomeController::class, 'rentView'])->name('rent');
Route::get('/ladies-top', [HomeController::class, 'ladiesTopView'])->name('ladies-top');

Route::get('/women-heels', [HomeController::class, 'heelsView'])->name('women-heels');
Route::get('/ladies-shoes', [HomeController::class, 'ladiesShoesView'])->name('ladies-shoes');
Route::get('/ladies-flats', [HomeController::class, 'ladiesFlatsView'])->name('ladies-flats');
Route::get('/t-shirts', [HomeController::class, 'tShirtsView'])->name('t-shirts');
Route::get('/diner-suits', [HomeController::class, 'dinerSuitView'])->name('diner-suits');
Route::get('/mens-shoes', [HomeController::class, 'mensShoesView'])->name('mens-shoes');
Route::get('/mens-leather-shoes', [HomeController::class, 'mensLeatherShoesView'])->name('mens-leather-shoes');
Route::get('/lipsticks', [HomeController::class, 'lipsticksView'])->name('lipsticks');
Route::get('/maskara', [HomeController::class, 'maskaraView'])->name('maskara');
Route::get('/liner', [HomeController::class, 'linerView'])->name('liner');
Route::get('/blush-on', [HomeController::class, 'blushOnView'])->name('blushon');
Route::get('/eyeshadows', [HomeController::class, 'eyeshadowsView'])->name('eyeshadows');
Route::get('/brushes', [HomeController::class, 'brushesView'])->name('brushes');
Route::get('/perfuems', [HomeController::class, 'perfuemsView'])->name('perfuems');
Route::get('/anklets', [HomeController::class, 'ankletsView'])->name('anklets');
Route::get('/bracelates', [HomeController::class, 'bracelatesView'])->name('bracelates');
Route::get('/pendents', [HomeController::class, 'pendentsView'])->name('pendents');
Route::get('/rings', [HomeController::class, 'ringsView'])->name('rings');
Route::get('/earings', [HomeController::class, 'earingsView'])->name('earings');
Route::get('/watches', [HomeController::class, 'watchesView'])->name('watches');
Route::get('/vases', [HomeController::class, 'vasesView'])->name('vases');
Route::get('/paintings', [HomeController::class, 'paintingsView'])->name('paintings');
Route::get('/clocks', [HomeController::class, 'clocksView'])->name('clocks');
Route::get('/checkout/{product_id}/{iscart}', [HomeController::class, 'checkoutView'])->name('checkout');

//auth

Route::get('/login', [HomeController::class, 'loginView'])->name('login');
Route::get('/sign-up', [HomeController::class, 'signupView'])->name('signup');

Route::post('/register-user', [AuthController::class, 'registerUser'])->name('register-user');
Route::post('/login-user', [AuthController::class, 'loginUser'])->name('login-user');

Route::post('/logout-user', [AuthController::class, 'logoutUser'])->name('logout-user');

//contact us
Route::post('/contactusmail', [HomeController::class, 'sendContactUsMail'])->name('contact-us-mail');

//product page

Route::get('/product-page/{id}', [ProductController::class, 'productView'])->name('product-view');
Route::get('/product-view/{id}/comments', [ProductController::class, 'commentView'])->name('comment-view');

Route::post('/product-view/create-comment', [ProductController::class, 'createComment'])->name('create-comment');


//Order route
Route::post('/place-order', [OrderController::class, 'placeOrder'])->name('order-place');
Route::get('/order-success/{order_id}', [OrderController::class, 'orderSuccessView'])->name('order-success');


//cart
Route::post('add-to-cart', [ProductController::class, 'addToCart'])->name('add-to-cart');
Route::get('delete-from-cart/{id}', [ProductController::class, 'deleteFromCart'])->name('delete-from-cart');



//admin pannel
Route::get('/admin', [AdminController::class, 'dashboardView'])->name('dashboard');
Route::get('/admin/process-orders', [AdminController::class, 'processOrders'])->name('process-orders');
Route::get('/admin/pending-orders', [AdminController::class, 'pendingOrders'])->name('pending-orders');
Route::get('/admin/shipped-orders', [AdminController::class, 'shippedOrders'])->name('shipped-orders');
Route::get('/admin/completed-orders', [AdminController::class, 'completedOrders'])->name('completed-orders');
Route::get('/admin/orders-history', [AdminController::class, 'orderHistory'])->name('order-history');
Route::get('/admin/orders/{order_id}', [AdminController::class, 'singleOrderView'])->name('single-order');
Route::post('/order/{id}/mark-shipped', [AdminController::class, 'markAsShipped'])->name('order-shipped');
Route::post('/order/{id}/mark-completed', [AdminController::class, 'markAsCompleted'])->name('order-completed');
Route::get('/admin/all-categories', [CategoryController::class, 'allCategoriesView'])->name('all-categories');
Route::get('/admin/create-categories', [CategoryController::class, 'createCategoryView'])->name('create-categories');
Route::get('/admin/edit-categories/{id}', [CategoryController::class, 'editCategoryView'])->name('edit-categories');
Route::post('/admin/createcategory', [CategoryController::class, 'createCategory'])->name('create-new-category');
Route::post('/admin/editcategory', [CategoryController::class, 'editCategory'])->name('edit-existing-category');
Route::get('/admin/deletecategory/{id}', [CategoryController::class, 'deleteCategory'])->name('delete-category');

Route::get('/admin/all-customers', [AdminController::class, 'allCustomersView'])->name('all-customers');
Route::get('admin/all-comments', [AdminController::class, 'allCommentsView'])->name('all-comments');


Route::get('admin/create-product', [ProductController::class, 'createProductView'])->name('create-product-view');
Route::get('admin/edit-product/{id}', [ProductController::class, 'editProductView'])->name('edit-product-view');
Route::get('admin/all-product', [ProductController::class, 'allProductView'])->name('all-product-view');
Route::get('admin/inventory', [ProductController::class, 'inventoryView'])->name('inventory');
Route::get('admin/out-of-stock', [ProductController::class, 'outOfStockView'])->name('out-of-stock');
Route::post('/admin/createProduct', [ProductController::class, 'createProduct'])->name('create-product');
Route::post('/admin/editProduct/{id}', [ProductController::class, 'editProduct'])->name('edit-product');
Route::get('admin/delete-product/{id}', [ProductController::class, 'deleteProduct'])->name('delete-product');
