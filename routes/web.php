<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\productController;
use App\Http\Controllers\TemplateController;
use App\Http\Controllers\brandController;
use App\Http\Controllers\categoryController;
use App\Http\Controllers\CustomAuthController;
use App\Http\Controllers\adminController;
use App\Http\Controllers\ManagerAuthController;;
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

Route::get('product-list', [productController::class,'index']);
Route::get('add-product', [productController::class,'addProduct']);
Route::post('save-product', [productController::class,'saveProduct']);
Route::get('edit-product/{id}', [productController::class,'editProduct']);
Route::post('update-product', [productController::class,'updateProduct']);
Route::get('delete-product/{id}', [productController::class,'deleteProduct']);

Route::get('brand-list', [brandController::class,'index']);
Route::get('add-brand', [brandController::class,'addBrand']);
Route::post('save-brand', [brandController::class,'saveBrand']);
Route::get('edit-brand/{id}', [brandController::class,'editBrand']);
Route::post('update-brand', [brandController::class,'updateBrand']);
Route::get('delete-brand/{id}', [brandController::class,'deleteBrand']);

Route::get('category-list', [categoryController::class,'index']);
Route::get('add-category', [categoryController::class,'addCategory']);
Route::post('save-category', [categoryController::class,'saveCategory']);
Route::get('edit-category/{id}', [categoryController::class,'editCategory']);
Route::post('update-category', [categoryController::class,'updateCategory']);
Route::get('delete-category/{id}', [categoryController::class,'deleteCategory']);

route::get('/login',[CustomAuthController::class,'login']);
route::get('/registration',[CustomAuthController::class,'registration']);
route::post('/register-user',[CustomAuthController::class,'registerUser'])->name('register-user');
route::post('/login-user',[CustomAuthController::class,'loginUser'])->name('login-user');
route::get('/dashboard',[CustomAuthController::class,'dashboard']);
route::get('/logout',[CustomAuthController::class,'logout']);
route::get('/information.blade.php/{id}',[CustomAuthController::class,'information']);
route::post('/saveinformation.blade.php',[CustomAuthController::class,'saveinformation'])->name('save-information');
Route::get('delete-user/{id}', [CustomAuthController::class,'deleteUser']);


Route::get('admin-list', [adminController::class,'index']);
Route::get('add-admin', [adminController::class,'addAdmin']);
Route::post('save-admin', [adminController::class,'saveAdmin']);
Route::get('edit-admin/{id}', [adminController::class,'editAdmin']);
Route::post('update-admin', [adminController::class,'updateAdmin']);
Route::get('delete-admin/{id}', [adminController::class,'deleteAdmin']);

route::get('/manager-login',[ManagerAuthController::class,'login']);
route::get('/manager-registration',[ManagerAuthController::class,'registration']);
route::post('/register-manager',[ManagerAuthController::class,'registerManager'])->name('register-manager');
route::post('/manager-login',[ManagerAuthController::class,'loginManager'])->name('login-manager');

route::get('/logout',[ManagerAuthController::class,'logout']);


Route::get("/",[TemplateController::class,"index"]);
