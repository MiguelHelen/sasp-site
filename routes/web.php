<?php

use App\Http\Controllers\ProfileController;
use App\Models\Feature;
use App\Models\PrototypeScreen;
use App\Models\Technology;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome', [
        'features' => Feature::orderBy('id')->get(),
        'technologies' => Technology::orderBy('category')->orderBy('name')->get()->groupBy('category'),
    ]);
})->name('home');

Route::get('/dashboard', function () {
    return view('dashboard', [
        'screens' => PrototypeScreen::with('features')->orderBy('display_order')->get(),
        'features' => Feature::orderBy('title')->get(),
        'technologies' => Technology::orderBy('category')->orderBy('name')->get()->groupBy('category'),
        'counts' => [
            'technologies' => Technology::count(),
            'features' => Feature::count(),
            'screens' => PrototypeScreen::count(),
            'links' => DB::table('feature_prototype_screen')->count(),
        ],
    ]);
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';