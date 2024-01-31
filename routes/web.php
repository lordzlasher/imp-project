<?php

use App\Http\Controllers\KategoriEventController;
use App\Http\Controllers\ReportExcelController;
use App\Http\Controllers\UserManagementController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\KaryawanController;
use App\Http\Controllers\InventoryController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\StatusCrewController;
use App\Http\Controllers\KeteranganCrewController;
use App\Http\Controllers\InventoryLogController;



/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Default welcome page
Route::get('/', function () {
    return view('welcome');
});

// Authentication Routes
Route::middleware('auth')->group(function () {
    // Profile Routes
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // Karyawan Routes
    Route::resource('karyawan', KaryawanController::class);
    Route::get('/karyawan/{id}/delete', [KaryawanController::class, 'destroy']);
    Route::get('/karyawan/list-job/{id}', [KaryawanController::class, 'listJob'])->name('karyawan.listJob');

    // Inventory Routes
    Route::resource('inventory', InventoryController::class);
    Route::get('/inventory/{id}/delete', [InventoryController::class, 'destroy']);

    // Event Routes
    Route::resource('event', EventController::class);
    Route::get('/event/{id}/delete', [EventController::class, 'destroy']);
    Route::get('/event/{id}/delete-crew', [EventController::class, 'deleteCrew']);
    Route::put('/event/update-crew/{crewId}', [EventController::class, 'updateCrew'])->name('event.updateCrew');
    Route::post('/event/store-crew/{eventId}', [EventController::class, 'storeCrew'])->name('event.storeCrew');
    Route::put('/event/update-event/{eventId}', [EventController::class, 'updateEvent'])->name('event.updateEvent');

    // Report PDF Routes
    Route::get('/report/event', [ReportController::class, 'reportEvent'])->name('report.event');
    Route::get('/report/event/{id}', [ReportController::class, 'reportEventKategori'])->name('report.eventKategori');
    Route::get('/report/download-event', [ReportController::class, 'downloadreportEvent'])->name('report.eventDownload');
    Route::get('/report/download-event/{id}', [ReportController::class, 'downloadreportEventCategory'])->name('report.eventCategoryDownload');
    Route::get('/report/crew/{id}', [ReportController::class, 'reportCrew'])->name('report.crew');
    Route::get('/report/download-crew/{id}', [ReportController::class, 'downloadreportCrew'])->name('report.crewDownload');

    // Report Excel Routes
    Route::get('/report/excel/download-event/{id}', [ReportExcelController::class, 'downloadReportEventKategori'])->name('report.excel.eventDownload');

    // Dashboard Routes
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard.index');
    Route::post('/filter', [DashboardController::class, 'filter'])->name('filter');

    // Status Crew Routes
    Route::resource('status-crew', StatusCrewController::class);
    Route::get('/status-crew/{id}/delete', [StatusCrewController::class, 'destroy']);

    // Keterangan Crew Routes
    Route::resource('keterangan-crew', KeteranganCrewController::class);
    Route::get('/keterangan-crew/{id}/delete', [KeteranganCrewController::class, 'destroy']);

    // Inventory Log Routes
    Route::resource('inventory-log', InventoryLogController::class);
    Route::get('/inventory-log/{id}/delete', [InventoryLogController::class, 'destroy']);

    // Kategori Event route
    Route::group(['prefix' => 'kategori-event', 'as' => 'kategori-event.'], function () {
        Route::get('/', [KategoriEventController::class, 'index'])->name('index');
        Route::post('/store', [KategoriEventController::class, 'store'])->name('store');
        Route::put('/update/{id}', [KategoriEventController::class, 'update'])->name('update');
        Route::get('/{id}/delete', [KategoriEventController::class, 'destroy'])->name('destroy');
    });

    // User Management route
    Route::group(['prefix' => 'user-management', 'as' => 'user-management.'], function () {
        Route::get('/', [UserManagementController::class, 'index'])->name('index');
        Route::post('/store', [UserManagementController::class, 'store'])->name('store');
        Route::get('/{id}/delete', [UserManagementController::class, 'destroy'])->name('destroy');
    });
});

// Include Laravel authentication routes
require __DIR__ . '/auth.php';
