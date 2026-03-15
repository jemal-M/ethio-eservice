<?php

use App\Http\Controllers\Api\DocumentController;
use App\Http\Controllers\Api\KebelieController;
use App\Http\Controllers\Api\NotificationController;
use App\Http\Controllers\Api\RegionController;
use App\Http\Controllers\Api\RoleController;
use App\Http\Controllers\Api\ServiceController;
use App\Http\Controllers\Api\UserController as ApiUserController;
use App\Http\Controllers\Api\WoredaController;
use App\Http\Controllers\Api\ZoneController;
use App\Http\Controllers\AppointmentController;
use App\Http\Controllers\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
    Route::get('/users',[UserController::class,'index']);
    Route::post('/users', [UserController::class, 'store']);
     Route::get('/users/{id}', [UserController::class, 'show']);
     Route::put('/users/{id}', [UserController::class, 'update']);
     Route::delete('/users/id',[UserController::class,'destroy']);
     
     Route::get('/regions',[RegionController::class,'index']);
     Route::post('/regions',[RegionController::class,'store']);
     Route::get('/regions/{id}', [RegionController::class, 'show']);
     Route::put('/regions/{id}', [RegionController::class, 'update']);
     Route::delete('/regions/{id}', [RegionController::class, 'destroy']);

     Route::get('/zones',[ZoneController::class,'index']);
     Route::post('/zones',[ZoneController::class,'store']);
     Route::get('/zones/{id}', [ZoneController::class, 'show']);
     Route::put('/zones/{id}',[RegionController::class,'update']);
     Route::delete('/zones/{id}', [RegionController::class, 'destroy']);
      
     Route::get('/woredas',[WoredaController::class,'index']);
     Route::post("/woredas",[WoredaController::class,'store']);
     Route::get('/woredas/{id}', [WoredaController::class, 'show']);
     Route::put('/woredas/{id}',WoredaController::class, 'update');
     Route::delete('/woredas/{id}', [WoredaController::class, 'destroy']);

     Route::get('/kebelies',[KebelieController::class, 'index']);
     Route::post('/kebelies', [KebelieController::class, 'store']);
     Route::get('/kebelies/{id}', [KebelieController::class, 'show']);
     Route::get('/kebelies/{id}', [KebelieController::class, 'update']);
     Route::delete('/kebelies/{id}', [KebelieController::class, 'destroy']);
     
     Route::get('/services',[ServiceController::class, 'index']);
     Route::post('/services', [ServiceController::class, 'store']);
     Route::get('/services/{id}', [ServiceController::class, 'show']);
     Route::put('/services/{id}', [ServiceController::class, 'update']);
     Route::delete('/services/{id}', [ServiceController::class, 'destroy']);

     Route::get('/roles',[RoleController::class,'index']);
     Route::post('/roles',[RoleController::class,'store']);
     Route::get('/roles/{id}',[RoleController::class,'show']);
     Route::put('/roles/{id}',[RoleController::class,'update']);
     Route::delete('/roles/{id}',[RoleController::class, 'destroy']);

     Route::get('/notifications',[NotificationController::class, 'index']);
     Route::post('/notifications', [NotificationController::class, 'store']);
     Route::get('/notifications/{id}', [NotificationController::class, 'show']);
     Route::put('/notifications/{id}', [NotificationController::class, 'update']);
     Route::delete('/notifications/{id}', [NotificationController::class, 'destroy']);

     Route::get('/appointments',[AppointmentController::class,'index']);
     Route::post('/appointments', [AppointmentController::class, 'store']);
     Route::get('/appointments/{id}', [AppointmentController::class, 'show']);
     Route::put('/appointments/{id}', [AppointmentController::class, 'update']);
     Route::delete('/appointments/{id}', [AppointmentController::class, 'destroy']);

     Route::get('/service_requests',[ApiUserController::class, 'service_request']);
     Route::post('/service_requests', [ApiUserController::class, 'make_service_request']);
     Route::get('/service_requests/{id}', [ApiUserController::class, 'show_service_request']);
     Route::put('/service_requests/{id}', [ApiUserController::class, 'update_service_request']);
     Route::delete('/service_requests/{id}', [ApiUserController::class, 'cancel_service_request']);
     
     Route::get('/documents',[DocumentController::class, 'index']);
     Route::post('/documents', [DocumentController::class, 'store']);
     Route::get('/documents/{id}', [DocumentController::class, 'show']);
     Route::put('/documents/{id}', [DocumentController::class, 'update']);
     Route::delete('/documents/{id}', [DocumentController::class, 'destroy']);
     


})->middleware('auth:sanctum');
