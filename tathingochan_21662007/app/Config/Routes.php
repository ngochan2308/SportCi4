<?php

use CodeIgniter\Router\RouteCollection;
use App\Controllers\AdminController;
use App\Controllers\CategoryController;
use App\Controllers\ProductController;
use App\Controllers\UserController;
// use App\Controllers\ShopController;
use App\Controllers\BadController;
use App\Controllers\RunController;
use App\Controllers\GolfController;
use App\Controllers\TennisController;
use App\Controllers\SnowController;
use App\Controllers\CartController;
use App\Controllers\ContactController;
use App\Controllers\AdminContactController;
use App\Controllers\AdminHoaDonController;
use App\Controllers\AdminChiTietHDController;
use App\Controllers\AdminProfileController;
use App\Controllers\AccountAdminController;
use App\Controllers\AccountUserController;
use App\Controllers\AboutUsController;
use App\Controllers\ThanhToanController;







//admin
// Đăng nhập
$routes->get('/', 'AdminController::login');
$routes->post('/admin/auth/processLogin', 'AdminController::processLogin');
// Đăng ký
$routes->get('/register', 'AdminController::register');
$routes->post('/admin/auth/processRegistration', 'AdminController::processRegistration');

// Đăng xuất
$routes->get('logout', 'AdminController::logout');
$routes->get('/admin', [AdminController::class, 'index']);
//category-admin
$routes->get('admin/category', 'CategoryController::index');
$routes->get('admin/category/edit/(:num)', 'CategoryController::edit/$1');
$routes->post('admin/category/update/(:num)', 'CategoryController::update/$1');
$routes->get('admin/category/delete/(:num)', 'CategoryController::delete/$1');
$routes->get('admin/category/create', 'CategoryController::create');
$routes->post('add_category', 'CategoryController::add');

//admin-> product
$routes->get('admin/product', 'ProductController::index');
$routes->get('admin/product/edit/(:num)', 'ProductController::edit/$1');
$routes->post('admin/product/update/(:num)', 'ProductController::update/$1');
$routes->get('admin/product/delete/(:num)', 'ProductController::delete/$1');
$routes->get('admin/product/create', 'ProductController::create');
$routes->post('add_product', 'ProductController::add');

//admin -> account
$routes->get('admin/acc_admin', 'AccountAdminController::index');
$routes->get('admin/acc_admin/create', 'AccountAdminController::create');
$routes->post('add_account','AccountAdminController::add');
$routes->get('admin/acc_admin/delete/(:num)','AccountAdminController::delete/$1');
$routes->get('admin/acc_admin/edit/(:num)','AccountAdminController::edit/$1');
$routes->post('admin/acc_admin/update/(:num)', 'AccountAdminController::update/$1');

//admin -> user
$routes->get('admin/acc_user', 'AccountUserController::index');
$routes->get('admin/acc_user/create', 'AccountUserController::create');
$routes->post('add_accountKH','AccountUserController::add');
$routes->get('admin/acc_user/delete/(:num)','AccountUserController::delete/$1');
$routes->get('admin/acc_user/edit/(:num)','AccountUserController::edit/$1');
$routes->post('admin/acc_user/update/(:num)', 'AccountUserController::update/$1');

//admin-> contact
$routes->get('admin/contact', 'AdminContactController::index');
$routes->get('admin/contact/delete/(:num)', 'AdminContactController::delete/$1');


//admin-> hóa đơn
$routes->get('admin/hoadon', 'AdminHoaDonController::index');
$routes->get('admin/hoadon/delete/(:num)', 'AdminHoaDonController::delete/$1');

//admin-> chi tiet hóa đơn
$routes->get('admin/chitiethd', 'AdminChiTietHDController::index');
$routes->get('admin/chitiethd/delete/(:num)', 'AdminChiTietHDController::delete/$1');


//admin -profile
$routes->get('/admin/profile', 'AdminProfileController::index');

//user
// app/Config/Routes.php

$routes->get('/user', 'UserController::index');

//user -> các sản phẩm 
$routes->get('/badminton', 'BadController::index');
$routes->post('badminton/search', 'BadController::search');

$routes->get('/running', 'RunController::index');
$routes->post('running/search', 'RunController::search');

$routes->get('/golf', 'GolfController::index');
$routes->post('golf/search', 'GolfController::search');

$routes->get('/snow', 'SnowController::index');
$routes->post('snow/search', 'SnowController::search');

$routes->get('/tennis', 'TennisController::index');
$routes->post('tennis/search', 'TennisController::search');


//user-> giỏ hàng
$routes->get('/cart', 'CartController::index');
$routes->post('cart/add', 'CartController::addToCart');
$routes->get('cart/removeItem/(:segment)', 'CartController::removeItem/$1');
$routes->post('cart/updateCart', 'CartController::updateCart');


//user->thanh toán
$routes->get('/thanhtoan', 'ThanhToanController::index');
$routes->post('thanh-toan', 'ThanhToanController::xuLyThanhToan');


//user -> contact
$routes->get('/contact', 'ContactController::index');
$routes->post('/submit-contact', 'ContactController::submitForm');

//user -> about us
$routes->get('/about', 'AboutUsController::index');

//user -> profile
$routes->get('/profile', 'ProfileController::index');
$routes->get('profile/edit-profile', 'ProfileController::edit');
$routes->post('profile/update-profile', 'ProfileController::update');












