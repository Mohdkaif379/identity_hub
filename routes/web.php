<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CenterDetails\CenterDetailController;
use App\Http\Controllers\Admin\LoginController;
use App\Http\Controllers\Dashboard\DashboardController;
use App\Http\Controllers\GeneretLink\GenerateLinkController;
use App\Http\Controllers\ManageAdmin\ManageAdminController;
use App\Http\Controllers\Permission\PermissionController;

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('center_details', [CenterDetailController::class, 'index'])->name('center_details.index');
Route::get('center_details/create', [CenterDetailController::class, 'create'])->name('center_details.create');
Route::post('center_details', [CenterDetailController::class, 'store'])->name('center_details.store');
Route::get('center_details/{id}/edit', [CenterDetailController::class, 'edit'])->name('center_details.edit');
Route::put('center_details/{id}', [CenterDetailController::class, 'update'])->name('center_details.update');
Route::delete('center_details/{id}', [CenterDetailController::class, 'destroy'])->name('center_details.destroy');
Route::get('center_details/export', [CenterDetailController::class, 'export'])->name('center_details.export');
Route::get('center_details/thank-you', function () {
    return view('center_details.thankyou');
})->name('center_details.thankyou');
Route::get('center_details/export', [CenterDetailController::class, 'export'])->name('center_details.export');

Route::get('/', [LoginController::class, 'showLogin'])->name('admin.login');
Route::post('admin/login', [LoginController::class, 'login'])->name('admin.login.submit');
Route::post('admin/logout', [LoginController::class, 'logout'])->name('admin.logout');
Route::get('/dashboard', [DashboardController::class, 'dashboard'])->name('dashboard');

Route::get('generate-link', [GenerateLinkController::class, 'generate'])->name('generate.link');
Route::get('generate-link/{token}', [GenerateLinkController::class, 'open'])->name('generate.link.open');
Route::post('generate-link/{id}/status', [GenerateLinkController::class, 'updateStatus'])->name('generate.link.status');
Route::get('generate-link-list', [GenerateLinkController::class, 'index'])->name('generate.link.index');
Route::delete('generate-link/{id}', [GenerateLinkController::class, 'destroy'])->name('generate.link.destroy');




Route::resource('manage-admin', ManageAdminController::class);

Route::get('/permission', [PermissionController::class, 'check'])
    ->name('permission.check');