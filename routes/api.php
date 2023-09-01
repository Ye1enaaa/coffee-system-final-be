<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\SorterController;
use App\Http\Controllers\BeanCounterController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\DetailsController;
use App\Http\Controllers\StatusController;
Route::post('/login' , [LoginController::class,'login']);
Route::post('/register/users', [RegisterController::class, 'register']);

Route::group(['middleware' => ['auth:sanctum']], function(){
    Route::get('/user', [UserController::class, 'user']);

    Route::get('/customers/{user_id}', [CustomerController::class, 'fetchCustomers']);
    Route::get('/sorters/{user_id}', [SorterController::class, 'fetchSorters']);

    //Route::post('/add/customer', [CustomerController::class, 'addCustomer']);
    Route::post('/add/sorter', [SorterController::class, 'addSorter']);

    Route::patch('/edit-customer/{id}', [CustomerController::class, 'editCustomer']);

    Route::delete('/delete-customer/{id}', [CustomerController::class, 'deleteCustomer']);

    Route::post('/add-info', [DetailsController::class, 'postDetails']);
    Route::patch('/edit-info/{id}', [DetailsController::class, 'editDetails']);

    Route::post('/add-status', [StatusController::class, 'postStatus']);
    Route::get('/fetch-status/{user_id}' , [StatusController::class, 'fetchStatus']);

    Route::post('/add-customer/{user_id}' , [CustomerController::class, 'getCustomerPostHistory']);
});

Route::get('/companies', [UserController::class, 'getCompaniesInfo']);
Route::get('/count', [BeanCounterController::class, 'fetchBeanCount']);