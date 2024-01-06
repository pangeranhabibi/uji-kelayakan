<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\UserController;
use App\Http\Controllers\LatesController;
use App\Http\Controllers\RombelController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\RayonController;
use App\Http\Controllers\PSController;
use App\Models\Lates;

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



Route::get('/', function (){
    return view('login');
})->name('login');
Route::post('/login-auth', [UserController::class , 'loginAuth'])->name('login.auth');

Route::get('/logout', [UserController::class , 'logout'])->name('logout');

Route::middleware('IsLogin')->group(function (){
    Route::get('/index', [UserController::class, 'home'])->name('home');

    Route::middleware("IsAdmin")->group(function(){
         // User module
        Route::prefix('user/')->name('user.')->group(function(){
            Route::get('/', [UserController::class, 'index'])->name('index');
            Route::get('create', [UserController::class, 'create'])->name('create');
            Route::post('store', [UserController::class, 'store'])->name('store');
            Route::get('{id}/edit', [UserController::class,'edit'])->name('edit');
            Route::patch('update/{id}', [UserController::class,'update'])->name('update');
        });
        // Late module
        Route::prefix('lates')->name('admin.lates.')->group(function(){
            Route::get('/', [LatesController::class, 'index'])->name('index');
            Route::get('/create', [LatesController::class, 'create'])->name('create');
            Route::post('/store', [LatesController::class, 'store'])->name('store');
            Route::get('/edit/{id}', [LatesController::class, 'edit'])->name('edit');
            Route::put('/update/{id}', [LatesController::class, 'update'])->name('update');
            Route::delete('/destroy/{id}    ', [LatesController::class, 'destroy'])->name('destroy');
            Route::get('/rekap',[LatesController::class, 'rekap'])->name('rekap');
            Route::get('/adm-downloadExcel',[LatesController::class, 'downloadExcel'])->name('downloadExcel');
            Route::get('/adm-downloadPDF/{id}', [LatesController::class, 'downloadPDF'])->name('downloadPDF');
            Route::get('/show/{id}', [LatesController::class, 'show'])->name('show');
        });
        // Rombel module
        Route::prefix('rombel/')->name('rombel.')->group(function(){
            Route::get('/', [RombelController::class, 'index'])->name('index');
            Route::get('/search', [RombelController::class, 'search'])->name('search');
            Route::get('create', [RombelController::class, 'create'])->name('create');
            Route::post('store', [RombelController::class, 'store'])->name('store');
            Route::get('{id}/edit', [RombelController::class,'edit'])->name('edit');
            Route::patch('update/{id}', [RombelController::class,'update'])->name('update');
            Route::delete('delete/{id}',[RombelController::class,'destroy'])->name('delete');

        });
        // Student module
        Route::prefix('student/')->name('student.')->group(function () {
            Route::get('/', [StudentController::class, 'index'])->name('index');
            Route::get('/search', [StudentController::class, 'search'])->name('search');
            Route::get('create', [StudentController::class, 'create'])->name('create');
            Route::post('store', [StudentController::class, 'store'])->name('store');
        });
        // Rayon module
        Route::prefix('rayon')->name('rayon.')->group(function(){
            Route::get('/', [RayonController::class, 'index'])->name('index');
            Route::get('/search', [RayonController::class, 'search'])->name('search');
            Route::get('/create', [RayonController::class, 'create'])->name('create');
            Route::post('/store', [RayonController::class, 'store'])->name('store');
        });
    });

    Route::middleware("IsPS")->group(function(){
        Route::prefix('ps')->name('ps.')->group(function(){
            Route::get('/', [PSController::class, 'index'])->name('index');
            Route::get('/show/{id}', [LatesController::class, 'show'])->name('showPs');
        });
    });

    Route::prefix('student/')->name('ps.student.')->group(function () {
        Route::get('student', [StudentController::class, 'student'])->name('student');
    });

    Route::prefix('lates')->name('ps.lates.')->group(function(){
        Route::get('/rekap', [LatesController::class, 'rekap'])->name('rekap');
        Route::get('/home', [LatesController::class, 'home'])->name('home');
        Route::get('/adm-downloadExcel1',[LatesController::class, 'downloadExcel1'])->name('downloadExcel1');
        Route::get('/downloadPDF1/{id}', [LatesController::class, 'downloadPDF1'])->name('downloadPDF1');    
    });
});