<?php

use App\Http\Controllers\asmController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\messageController;
use App\Http\Controllers\userController;
use App\Http\Controllers\ChallengeController;
use App\Models\Asm;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('index');
});

Auth::routes();
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/std-homepage', [App\Http\Controllers\StudentController::class, 'index'])->name('/std-homepage')->middleware('auth');
Route::get('logout', [LoginController::class,'logout']);

Route::resource('user', userController::class);
Route::get('user/{user}', [userController::class, 'update'])->name('user.update');
Route::get('user/delete/{user}', [userController::class, 'destroy'])->name('user.destroy')->middleware('admin');
Route::get('user/show/{id}', [userController::class, 'show'])->name('user.show');
Route::get('user/{user}', [userController::class, 'update'])->name('user.update')->middleware('admin');
Route::post('message', [messageController::class, 'handleSendMessage'])->name('message.send');

///

Route::get('asm', [asmController::class, 'index'])->name('asm.index');
Route::get('asm/delete/{asm}', [asmController::class, 'destroy'])->name('asm.destroy')->middleware('admin');
Route::get('asm/edit/{asm}', [asmController::class, 'edit'])->name('asm.edit')->middleware('admin');
Route::post('asm/update/{asm}', [asmController::class, 'update'])->name('asm.update')->middleware('admin');
Route::get('asm/show/{id}', [asmController::class, 'show'])->name('asm.show');
Route::get('asm/create', [asmController::class, 'create'])->name('asm.create')->middleware('admin');
Route::post('asm/store', [asmController::class, 'store'])->name('asm.store')->middleware('admin');
Route::post('asm/doneAsm/{asm_id}', [asmController::class, 'doneAsm'])->name('asm.doneAsm');
Route::get('asm/download/{asm_id}', [asmController::class, 'downloadFile'])->name('asm.downloadFile');
Route::get('asm/userDone/{asm_id}', [asmController::class, 'userDone'])->name('asm.userDone')->middleware('admin');
Route::post('asm/mark', [asmController::class, 'handleMark'])->name('asm.handleMark')->middleware('admin');

////

Route::get('challenge', [ChallengeController::class, 'index'])->name('challenge.index');
Route::get('challenge/delete/{challenge}', [ChallengeController::class, 'destroy'])->name('challenge.destroy')->middleware('admin');
Route::get('challenge/edit/{challenge}', [ChallengeController::class, 'edit'])->name('challenge.edit')->middleware('admin');
Route::post('challenge/update/{challenge}', [ChallengeController::class, 'update'])->name('challenge.update')->middleware('admin');
Route::get('challenge/show/{id}', [ChallengeController::class, 'show'])->name('challenge.show');
Route::get('challenge/create', [ChallengeController::class, 'create'])->name('challenge.create')->middleware('admin');
Route::post('challenge/store', [ChallengeController::class, 'store'])->name('challenge.store')->middleware('admin');
Route::post('challenge/donechallenge/{challenge_id}', [ChallengeController::class, 'donechallenge'])->name('challenge.donechallenge');
Route::get('challenge/userDone/{challenge_id}', [ChallengeController::class, 'userDone'])->name('challenge.userDone')->middleware('admin');
Route::get('challenge/createChallenge', [ChallengeController::class, 'createChallenge'])->name('challenge.createChallenge')->middleware('admin');




