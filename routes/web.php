<?php

use App\Livewire\Data;
use App\Livewire\Notifications;
use Illuminate\Support\Facades\Route;
use Spatie\Health\Http\Controllers\HealthCheckResultsController;

Route::get('/', \App\Livewire\Tuinhuisje::class)->name('tuinhuisje');

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
    Route::middleware(['role:super admin'])->group(function () {
        Route::get('/health', HealthCheckResultsController::class)->name('health');
        Route::prefix('data')->name('data.')->group(function () {
            Route::get('', Data\Index::class)->name('index');
            Route::get('/import', Data\Import::class)->name('import');
            Route::get('/import/{id}', Data\Import\Update::class)->name('import.update');
            Route::get('/create', Data\Create::class)->name('create');
            Route::get('/edit/{id}', Data\Edit::class)->name('edit');
        });
        Route::prefix('notifications')->name('notifications.')->group(function () {
            Route::get('', Notifications\Index::class)->name('index');
        });
    });
});
