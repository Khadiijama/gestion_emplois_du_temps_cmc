<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ScheduleController;
use App\Http\Controllers\Admin\DashboardController as AdminDashboard;
use App\Http\Controllers\Formateur\DashboardController as FormateurDashboard;
use App\Http\Controllers\Admin\SeanceController as AdminSeanceController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

Route::get('/', function () {
    return view('welcome');
})->name('home');

Route::get('/schedule', [ScheduleController::class, 'index'])->name('schedule.index');
Route::get('/schedule/pdf', [ScheduleController::class, 'downloadPdf'])->name('schedule.pdf');
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Admin Routes
Route::middleware(['auth', 'role:admin'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/dashboard', [AdminDashboard::class, 'index'])->name('dashboard');
    Route::resource('seances', AdminSeanceController::class)->except(['show', 'edit', 'update']);
});

// Formateur Routes
Route::middleware(['auth', 'role:formateur'])->prefix('formateur')->name('formateur.')->group(function () {
    Route::get('/dashboard', [FormateurDashboard::class, 'index'])->name('dashboard');
});

// General dashboard redirect based on role
Route::get('/dashboard', function () {
    $user = Auth::user();
    $role = strtolower(trim($user->role));
    
    if ($role === 'admin') {
        return redirect()->route('admin.dashboard');
    } elseif ($role === 'formateur') {
        return redirect()->route('formateur.dashboard');
    }
    
    return redirect()->route('schedule.index'); // Default for stagiaire or others
})->middleware(['auth', 'verified'])->name('dashboard');

require __DIR__.'/auth.php';
