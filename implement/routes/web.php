<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DeparmentController;
use App\Http\Controllers\TeamController;
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
// Department
Route::get('/', [DeparmentController::class, "DepartmentList"])->name('getDepartment'); // home
Route::post('', [DeparmentController::class, "DeleteDepartment"])->name("deleteDepartment"); // get interface and data id for dele

Route::get('/createDePartment', [DeparmentController::class, "DepartmentCreate"])->name('createDepartment'); // get interface
Route::post('createDePartment', [DeparmentController::class, "PostDepartment"])->name("postDepartment"); // post requirement

Route::get('editDepartment', [DeparmentController::class, "EditDepartment"])->name("editDepartment"); // get interface and data id
Route::post('editDepartment', [DeparmentController::class, "UpdateDepartment"])->name("updateDepartment"); // get interface and data id

// teams
Route::get('/team', [TeamController::class, "TeamList"])->name("TeamList");
Route::get('/teamCreate', [TeamController::class, "TeamCreate"])->name("CreateTeam");
Route::post('/teamCreate', [TeamController::class, "TeamPost"])->name("PostTeam");
Route::get('/teamEdit', [TeamController::class, "TeamEdit"])->name("editTeam");
Route::post('/teamEdit', [TeamController::class, "TeamUpdate"])->name("editTeam");
Route::post('/team', [TeamController::class, "TeamDelete"])->name("deleTeam");
