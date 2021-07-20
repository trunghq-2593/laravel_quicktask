<?php

use Illuminate\Support\Facades\Route;
use App\Models\Task;
use Illuminate\Http\Request;
use \Illuminate\Support\Facades\Validator;
use App\Http\Controllers\Auth\LoginController;
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

Route::post('login', [LoginController::class, 'handleLogin'])->name('auth.login')->middleware('checkUser');

Route::get('logOut', [LoginController::class, 'logOut'])->name('auth.logout');

Route::group(
    [
        'middleware' => 'localization'
    ], function () {
    Route::get('login', [LoginController::class, 'loginForm'])->name('auth.loginForm')->middleware(['checkUser']);

    Route::get('/', [\App\Http\Controllers\TaskController::class, 'getTask'])->name('tasks')->middleware('checkUser');

    Route::post('/task', function (Request $request) {
        $validator = Validator::make($request->all(), [
            'name' => 'required|max:255',
        ]);

        if ($validator->fails()) {
            return redirect('/')
                ->withInput()
                ->withErrors($validator);
        }

        // Create The Task...
        $task = new Task;
        $task->name = $request->name;
        $task->user_id = \Illuminate\Support\Facades\Auth::user()->id;
        $task->save();

        return redirect('/');
    });

    Route::delete('/task/{task}', function (Task $task) {
        $task->delete();
        return redirect('/');
    });

    Route::get('change-language/{language}', [\App\Http\Controllers\LanguageController::class, 'changeLanguage'])->name('change-language');
}
);




