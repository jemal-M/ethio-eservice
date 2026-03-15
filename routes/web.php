<?php

use App\Http\Controllers\Api\UserController;
use App\Http\Controllers\AppointmentController;
use App\Http\Controllers\DepartmentController;
use App\Http\Controllers\DocumentController;
use App\Http\Controllers\KebelieController;
use App\Http\Controllers\NotificationController;
use App\Http\Controllers\OfficeController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\PermissionController;
use App\Http\Controllers\RegionController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\ServiceRequestController;
use App\Http\Controllers\UploadDocumentController;
use App\Http\Controllers\WoredaController;
use App\Http\Controllers\ZoneController;
use Illuminate\Support\Facades\Route;
use Laravel\Fortify\Features;

Route::inertia('/', 'welcome', [
    'canRegister' => Features::enabled(Features::registration()),
])->name('home');

Route::middleware(['auth', 'verified'])->group(function () {
    Route::inertia('dashboard', 'dashboard')->name('dashboard');
    Route::get('/regions', [RegionController::class, 'index']);
    Route::get('/regions/{region}', [RegionController::class, 'show']);
    Route::get('/regions/{region}/edit', [RegionController::class, 'edit']);
    Route::put('/regions/{region}', [RegionController::class, 'update']);
    Route::delete('/regions/{region}', [RegionController::class, 'destroy']);
    Route::post('/regions', [RegionController::class, 'store']);
    Route::get('/regions/create', [RegionController::class, 'create']);

    Route::get('/zones', [ZoneController::class, 'index']);
    Route::get('/zones/{zone}', [ZoneController::class, 'show']);
    Route::get('/zones/{zone}/edit', [ZoneController::class, 'edit']);
    Route::put('/zones/{zone}', [ZoneController::class, 'update']);
    Route::delete('/zones/{zone}', [ZoneController::class, 'destroy']);
    Route::post('/zones', [ZoneController::class, 'store']);
    Route::get('/zones/create', [ZoneController::class, 'create']);

    Route::get('/woredas', [WoredaController::class, 'index']);
    Route::get('/woredas/{woreda}', [WoredaController::class, 'show']);
    Route::get('/woredas/{woreda}/edit', [WoredaController::class, 'edit']);
    Route::put('/woredas/{woreda}', [WoredaController::class, 'update']);
    Route::delete('/woredas/{woreda}', [WoredaController::class, 'destroy']);
    Route::post('/woredas', [WoredaController::class, 'store']);
    Route::get('/woredas/create', [WoredaController::class, 'create']);

    Route::get('/kebelies', [KebelieController::class, 'index']);
    Route::get('/kebelies/{kebelie}', [KebelieController::class, 'show']);
    Route::get('/kebelies/{kebelie}/edit', [KebelieController::class, 'edit']);
    Route::put('/kebelies/{kebelie}', [KebelieController::class, 'update']);
    Route::delete('/kebelies/{kebelie}', [KebelieController::class, 'destroy']);
    Route::post('/kebelies', [KebelieController::class, 'store']);
    Route::get('/kebelies/create', [KebelieController::class, 'create']);

    Route::get('/services', [ServiceController::class, 'index']);
    Route::get('/services/{service}', [ServiceController::class, 'show']);
    Route::get('/services/create', [ServiceController::class, 'create']);
    Route::post('/services', [ServiceController::class, 'store']);
    Route::get('/services/{service}/edit', [ServiceController::class, 'edit']);
    Route::put('/services/{service}', [ServiceController::class, 'update']);
    Route::delete('/services/{service}', [ServiceController::class, 'destroy']);
    Route::get('/services/{service}/show', [ServiceController::class, 'show']);
    Route::get('/services/{service}/map', [ServiceController::class, 'map'])->name('service.map');
    Route::get('/services/{service}/report', [ServiceController::class, 'report'])->name('service.report');

    Route::get('service_requests', [ServiceRequestController::class, 'index']);
    Route::get('service_requests/create', [ServiceRequestController::class, 'create']);
    Route::post('service_requests', [ServiceRequestController::class, 'store']);
    Route::get('service_requests/{service_request}/edit', [ServiceRequestController::class, 'edit']);
    Route::put('service_requests/{service_request}', [ServiceRequestController::class, 'update']);
    Route::delete('service_requests/{service_request}', [ServiceRequestController::class, 'destroy']);
    Route::get('service_requests/{service_request}', [ServiceRequestController::class, 'show']);

    Route::get('/appointments', [AppointmentController::class, 'index']);
    Route::get('/appointments/create', [AppointmentController::class, 'create']);
    Route::post('/appointments', [AppointmentController::class, 'store']);
    Route::get('/appointments/{appointment}/edit', [AppointmentController::class, 'edit']);
    Route::put('/appointments/{appointment}', [AppointmentController::class, 'update']);
    Route::delete('/appointments/{appointment}', [AppointmentController::class, 'destroy']);
    Route::get('/appointments/{appointment}', [AppointmentController::class, 'show']);
    Route::get('/appointments/{appointment}/report', [AppointmentController::class, 'report'])->name('appointment.report');
    Route::get('/appointments/{appointment}/map', [AppointmentController::class, 'map'])->name('appointment.map');

    Route::get('/documents', [DocumentController::class, 'index']);
    Route::get('/documents/create', [DocumentController::class, 'create']);
    Route::post('/documents', [DocumentController::class, 'store']);
    Route::get('/documents/{document}/edit', [DocumentController::class, 'edit']);
    Route::put('/documents/{document}', [DocumentController::class, 'update']);
    Route::delete('/documents/{document}', [DocumentController::class, 'destroy']);
    Route::get('/documents/{document}', [DocumentController::class, 'show']);
    Route::get('/documents/{document}/download', [DocumentController::class, 'download'])->name('document.download');
    Route::get('/documents/{document}/report', [DocumentController::class, 'report'])->name('document.report');

    Route::get('/notifications', [NotificationController::class, 'index']);
    Route::post('/notifications/read', [NotificationController::class, 'markAsRead']);
    Route::post('/notifications/read/all', [NotificationController::class, 'markAllAsRead']);
    Route::post('/notifications', [NotificationController::class, 'store']);
    Route::get('/notifications/{notification}', [NotificationController::class, 'show']);
    Route::delete('/notifications/{notification}', [NotificationController::class, 'destroy']);
    Route::get('/notifications/{notification}/read', [NotificationController::class, 'markAsRead']);
    Route::get('/notifications/{notification}/report', [NotificationController::class, 'report'])->name('notification.report');
    Route::get('/notifications/{notification}/download', [NotificationController::class, 'download'])->name('notification.download');

    Route::get('/offices', [OfficeController::class, 'index']);
    Route::get('/offices/{office}/edit', [OfficeController::class, 'edit']);
    Route::put('/offices/{office}', [OfficeController::class, 'update']);
    Route::get('/offices/{office}', [OfficeController::class, 'show']);
    Route::get('/offices/create', [OfficeController::class, 'create']);
    Route::post('/offices', [OfficeController::class, 'store']);
    Route::delete('/offices/{office}', [OfficeController::class, 'destroy']);
    Route::get('/offices/{office}/report', [OfficeController::class, 'report'])->name('office.report');
    Route::get('/offices/{office}/map', [OfficeController::class, 'map'])->name('office.map');
    Route::get('/offices/{office}/service_requests', [OfficeController::class, 'serviceRequests'])->name('office.service_requests');
    Route::get('/offices/{office}/appointments', [OfficeController::class, 'appointments'])->name('office.appointments');
    Route::get('/offices/{office}/documents', [OfficeController::class, 'documents'])->name('office.documents');
    Route::get('/offices/{office}/notifications', [OfficeController::class, 'notifications'])->name('office.notifications');
    Route::get('/offices/{office}/services', [OfficeController::class, 'services'])->name('office.services');

    Route::get('/departments', [DepartmentController::class, 'index']);
    Route::get('/departments/{department}/edit', [DepartmentController::class, 'edit']);
    Route::put('/departments/{department}', [DepartmentController::class, 'update']);
    Route::get('/departments/{department}', [DepartmentController::class, 'show']);
    Route::get('/departments/create', [DepartmentController::class, 'create']);
    Route::post('/departments', [DepartmentController::class, 'store']);
    Route::delete('/departments/{department}', [DepartmentController::class, 'destroy']);
    Route::get('/departments/{department}/report', [DepartmentController::class, 'report'])->name('department.report');

    Route::get('/users', [UserController::class, 'index']);
    Route::get('/users/{user}/edit', [UserController::class, 'edit']);
    Route::put('/users/{user}', [UserController::class, 'update']);
    Route::get('/users/{user}', [UserController::class, 'show']);
    Route::get('/users/create', [UserController::class, 'create']);
    Route::post('/users', [UserController::class, 'store']);
    Route::delete('/users/{user}', [UserController::class, 'destroy']);
    Route::get('/users/{user}/report', [UserController::class, 'report'])->name('user.report');
    Route::get('/users/{user}/profile', [UserController::class, 'profile'])->name('user.profile');
    Route::put('/users/{user}/profile', [UserController::class, 'updateProfile'])->name('user.updateProfile');
    Route::get('/users/{user}/change_password', [UserController::class, 'changePassword'])->name('user.changePassword');
    Route::put('/users/{user}/change_password', [UserController::class, 'updatePassword'])->name('user.updatePassword');

    Route::get("/roles", [RoleController::class, 'index']);
    Route::post('/roles', [RoleController::class, 'store']);
    Route::get('/roles/create', [RoleController::class, 'create']);
    Route::get('/roles/{role}/edit', [RoleController::class, 'edit']);
    Route::put('/roles/{role}', [RoleController::class, 'update']);
    Route::delete('/roles/{role}', [RoleController::class, 'destroy']);
    Route::get('/roles/{role}', [RoleController::class, 'show']);
    Route::get('/roles/{role}/permissions', [RoleController::class, 'permissions'])->name('roles.permissions');
    Route::put('/roles/{role}/permissions', [RoleController::class, 'updatePermissions'])->name('roles.updatePermissions');

    Route::get('/permissions', [PermissionController::class, 'index']);
    Route::get('/permissions/{permission}/edit', [PermissionController::class, 'edit']);
    Route::put('/permissions/{permission}', [PermissionController::class, 'update']);
    Route::delete('/permissions/{permission}', [PermissionController::class, 'destroy']);
    Route::get('/permissions/{permission}', [PermissionController::class, 'show']);
    Route::get('/permissions/create', [PermissionController::class, 'create']);
    Route::post('/permissions', [PermissionController::class, 'store']);
    Route::get('/permissions/{permission}/report', [PermissionController::class, 'report'])->name('permission.report');

    Route::get('/upload_documents', [UploadDocumentController::class, 'index']);
    Route::post('/upload_documents', [UploadDocumentController::class, 'store']);
    Route::get('/upload_documents/create', [UploadDocumentController::class, 'create']);
    Route::get('/upload_documents/{upload_document}/edit', [UploadDocumentController::class, 'edit']);
    Route::put('/upload_documents/{upload_document}', [UploadDocumentController::class, 'update']);
    Route::delete('/upload_documents/{upload_document}', [UploadDocumentController::class, 'destroy']);
    Route::get('/upload_documents/{upload_document}', [UploadDocumentController::class, 'show']);

    Route::get("/payments", [PaymentController::class, 'index']);
    Route::get("/payments/create", [PaymentController::class, 'create']);
    Route::post("/payments", [PaymentController::class, 'store']);
    Route::get("/payments/{payment}/edit", [PaymentController::class, 'edit']);
    Route::put("/payments/{payment}", [PaymentController::class, 'update']);
    Route::delete("/payments/{payment}", [PaymentController::class, 'destroy']);
    Route::get("/payments/{payment}", [PaymentController::class, 'show']);
    Route::get("/payments/{payment}/report", [PaymentController::class, 'report'])->name("payment.report");
    Route::get("/payments/{payment}/receipt", [PaymentController::class, 'receipt'])->name("payment.receipt");
    Route::get("/payments/{payment}/download", [PaymentController::class, 'download'])->name("payment.download");
    Route::post("/payments/{payment}/verify", [PaymentController::class, 'verify'])->name("payment.verify");
    Route::post("/payments/verify", [PaymentController::class, 'verifyCallback'])->name("payment.verify.callback");
    Route::get('/payments/callback', [PaymentController::class, 'callback'])->name('payment.callback');
    Route::get('/payments/response', [PaymentController::class, 'response'])->name('payment.response');
    Route::get('/payments/initiate', [PaymentController::class, 'initiate'])->name('payment.initiate');
    Route::get('/payments/make_payment', [PaymentController::class, 'makePayment'])->name('payment.make_payment');
     Route::post('/payments/process', [PaymentController::class, 'process'])->name('payment.process');
      Route::post('/payments/charge', [PaymentController::class, 'charge'])->name('payment.charge');

    Route::get('/dashboard', function () {
        return view('dashboard');
    })->middleware(['auth'])->name('dashboard');
});

require __DIR__ . '/settings.php';
