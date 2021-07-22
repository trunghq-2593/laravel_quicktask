<?php

use Illuminate\Support\Facades\Route;
use App\Models\Task;
use Illuminate\Http\Request;
use \Illuminate\Support\Facades\Validator;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\TaskController;
use Illuminate\Support\Facades\Auth;

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

Route::group(['middleware' => ['localization', 'checkUser']], function () {
    Route::post('login', [LoginController::class, 'handleLogin'])->name('auth.login')->withoutMiddleware('checkUser');

    Route::get('logOut', [LoginController::class, 'logOut'])->name('auth.logout');

    Route::get('login', [LoginController::class, 'loginForm'])->name('auth.loginForm');

    Route::resource('tasks', TaskController::class)->only([
        'index', 'store', 'destroy'
    ]);
}
);
Route::get('change-language/{language}', [\App\Http\Controllers\LanguageController::class, 'changeLanguage'])->name('change-language');

