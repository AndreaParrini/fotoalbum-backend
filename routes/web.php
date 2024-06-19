<?php

use App\Http\Controllers\Admin\FotoContoller;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Guest\FotoController as GuestFotoController;
use App\Http\Controllers\LeadController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Models\Foto;

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

Route::get('/', function () {
    $fotos = Foto::where('published', 1)->orderByDesc('in_evidenza')->orderByDesc('id')->where('in_evidenza', 1)->limit(4)->get();
    return view('welcome', compact('fotos'));
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::resource('/fotos', GuestFotoController::class)->only(['index', 'show'])->parameters(['fotos' => 'foto:slug']);

Route::get('/contacts', [LeadController::class, 'create'])->name('contacts');
Route::post('/contacts', [LeadController::class, 'store'])->name('contacts.store');


Route::middleware(['auth', 'verified'])
    ->name('admin.')
    ->prefix('admin')
    ->group(function () {

        //Foto route here
        Route::resource('/fotos', FotoContoller::class)->parameters(['fotos' => 'foto:slug']);
        //Category route here
        Route::resource('/categories', CategoryController::class);
    });

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
