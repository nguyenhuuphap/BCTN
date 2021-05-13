<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\CategoryRoomController;
use App\Http\Controllers\CategoryServiceController;
use App\Http\Controllers\RoomController;
use App\Http\Controllers\OrderController;
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

// Route::get('/trang-chu', function () {
//     return view('welcome');
// });
//frontend
Route::get('/', [HomeController::class, 'index']);
Route::get('/trang-chu', [HomeController::class, 'index']);
Route::get('/dich-vu', [HomeController::class, 'service']);
Route::get('/phong', [HomeController::class, 'room_index']);
Route::get('/category-kind/{id}', [HomeController::class,'category_kind']);

//book
Route::get('/dat-phong/{id}', [HomeController::class, 'booking']);
Route::post('/dat-phong', [HomeController::class, 'bookingpost']);

//backend
Route::get('/admin-login', [AdminController::class, 'login']);
Route::get('/admin-dashboard', [AdminController::class, 'index']);
Route::get('/logout', [AdminController::class, 'logout']);
Route::get('/dashboard', [AdminController::class, 'show_dashboard']);
Route::post('/admin-dashboard', [AdminController::class, 'dashboard']);

//category room
Route::get('/add-category-room', [CategoryRoomController::class, 'add_category_room']);
Route::get('/edit-category-room/{category_room_id}', [CategoryRoomController::class, 'edit_category_room']);
Route::get('/delete-category-room/{category_room_id}', [CategoryRoomController::class, 'delete_category_room']);
Route::get('/all-category-room', [CategoryRoomController::class, 'all_category_room']);
Route::get('/unactive-category-room/{category_room_id}', [CategoryRoomController::class,'unactive_category_room']);
Route::get('/active-category-room/{category_room_id}', [CategoryRoomController::class,'active_category_room']);
Route::post('/save-category-room', [CategoryRoomController::class, 'save_category_room']);
Route::post('/update-category-room/{category_room_id}', [CategoryRoomController::class, 'update_category_room']);

//service room
Route::get('/add-category-service', [CategoryServiceController::class, 'add_category_service']);
Route::get('/edit-category-service/{category_service_id}', [CategoryServiceController::class, 'edit_category_service']);
Route::get('/delete-category-service/{category_serviceid}', [CategoryServiceController::class, 'delete_category_service']);
Route::get('/all-category-service', [CategoryServiceController::class, 'all_category_service']);
Route::get('/unactive-category-service/{category_service_id}', [CategoryServiceController::class,'unactive_category_service']);
Route::get('/active-category-service/{category_service_id}', [CategoryServiceController::class,'active_category_service']);
Route::post('/save-category-service', [CategoryServiceController::class, 'save_category_service']);
Route::post('/update-category-service/{category_service_id}', [CategoryServiceController::class, 'update_category_service']);

//room
Route::get('/add-room', [RoomController::class, 'add_room']);
Route::get('/edit-room/{room_id}', [RoomController::class, 'edit_room']);
Route::get('/delete-room/{room_id}', [RoomController::class, 'delete_room']);
Route::get('/all-room', [RoomController::class, 'all_room']);
Route::get('/unactive-room/{room_id}', [RoomController::class,'unactive_room']);
Route::get('/active-room/{room_id}', [RoomController::class,'active_room']);
Route::post('/save-room', [RoomController::class, 'save_room']);
Route::post('/update-room/{room_id}', [RoomController::class, 'update_room']);


//order
Route::get('/all-order',[OrderController::class, 'index']);