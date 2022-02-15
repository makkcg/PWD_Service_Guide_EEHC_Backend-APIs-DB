<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Admin\HomeController;
use App\Http\Controllers\Admin\EmployeeController;
use App\Http\Controllers\Admin\DeafController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\FoundationController;
use App\Http\Controllers\Admin\AboutController;
use App\Http\Controllers\Desktop\JsonFileController;
use App\Http\Controllers\Admin\ExcelController;
use App\Http\Controllers\Admin\BranchController;
use App\Http\Controllers\Admin\ServiceController;
use App\Http\Controllers\Admin\DocumentController;
use App\Http\Controllers\Admin\ProcedureController;
use App\Http\Controllers\Admin\RegulationController;
use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\Admin\FaqController;
use Illuminate\Support\Facades\Artisan;

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
Route::get("jsonFile", [JsonFileController::class, "jsonFile"]);
Route::get("dictionaryJsonFile", [JsonFileController::class, "dictionaryJsonFile"]);
Route::get('/downloadZip',[JsonFileController::class, "zipFile"])->name('download');

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__ . '/auth.php';

      Route::get('/', [HomeController::class, 'index'])->name('home');
      Route::post('/login', [AuthenticatedSessionController::class, 'store'])->name('login');
      Route::post('/logout', [AuthenticatedSessionController::class, 'destroy'])->name('logout');


      Route::group(['middleware' => 'admin','prefix' => 'admin'], function () {
      //home
      Route::get('/',[HomeController::class, 'home'])->name('admin');

      //deaf
       Route::get('/deafs',[DeafController::class, 'index'])->name('deafs')->middleware('can:deafs');

      //admins
      Route::resource('admins', AdminController::class ,['as'=> 'admin'])->middleware('can:admins');

      //employee
      Route::resource('employees', EmployeeController::class ,['as'=> 'admin'])->middleware('can:employees');


    //foundations
    Route::get('/foundations',[FoundationController::class,'edit'])->name('admin.foundations.edit')->middleware('can:foundations');
    Route::post('/foundations',[FoundationController::class,'update'])->name('admin.foundations.update')->middleware('can:foundations');
    Route::get('foundations/image/ajax/{id}',[FoundationController::class, 'imageAjax'])->middleware('can:foundations');
    Route::get('foundations/sound/ajax/{id}',[FoundationController::class, 'soundAjax'])->middleware('can:foundations');
    Route::get('foundations/video/ajax/{id}',[FoundationController::class, 'videoAjax'])->middleware('can:foundations');
    //about
    Route::get('/abouts',[AboutController::class,'edit'])->name('admin.abouts.edit')->middleware('can:abouts');
    Route::post('/abouts',[AboutController::class,'update'])->name('admin.abouts.update')->middleware('can:abouts');
    Route::get('abouts/sound/ajax/{id}',[AboutController::class, 'soundAjax'])->middleware('can:abouts');
    Route::get('abouts/video/ajax/{id}',[AboutController::class, 'videoAjax'])->middleware('can:abouts');


    //branches
    Route::resource('branches', BranchController::class ,['as'=> 'admin'])->middleware('can:branches');
    Route::get('branches/sound/ajax/{id}',[BranchController::class, 'soundAjax'])->middleware('can:branches');
    Route::get('branches/video/ajax/{id}',[BranchController::class, 'videoAjax'])->middleware('can:branches');
    Route::get('branches/image/ajax/{id}',[BranchController::class, 'imageAjax'])->middleware('can:branches');
    Route::get('branches/ajax/{id}',[BranchController::class, 'cityAjax'])->middleware('can:branches');

    //services
    Route::resource('services', ServiceController::class ,['as'=> 'admin'])->middleware('can:services');
    Route::get('services/image/ajax/{id}',[ServiceController::class, 'imageAjax'])->middleware('can:services');
    Route::get('services/title_sound/ajax/{id}',[ServiceController::class, 'titleSoundAjax'])->middleware('can:services');
    Route::get('services/title_video/ajax/{id}',[ServiceController::class, 'titleVideoAjax'])->middleware('can:services');
    Route::get('services/desc_sound/ajax/{id}',[ServiceController::class, 'descSoundAjax'])->middleware('can:services');
    Route::get('services/desc_video/ajax/{id}',[ServiceController::class, 'descVideoAjax'])->middleware('can:services');

    //documents
    Route::resource('documents', DocumentController::class ,['as'=> 'admin'])->middleware('can:documents');
    Route::get('documents/image/ajax/{id}',[DocumentController::class, 'imageAjax'])->middleware('can:documents');
    Route::get('documents/title_sound/ajax/{id}',[DocumentController::class, 'titleSoundAjax'])->middleware('can:documents');
    Route::get('documents/title_video/ajax/{id}',[DocumentController::class, 'titleVideoAjax'])->middleware('can:documents');
    Route::get('documents/desc_sound/ajax/{id}',[DocumentController::class, 'descSoundAjax'])->middleware('can:documents');
    Route::get('documents/desc_video/ajax/{id}',[DocumentController::class, 'descVideoAjax'])->middleware('can:documents');

    //faqs
    Route::resource('faqs', FaqController::class ,['as'=> 'admin'])->middleware('can:faqs');
    Route::get('faqs/image/ajax/{id}',[FaqController::class, 'imageAjax'])->middleware('can:faqs');
    Route::get('faqs/q_and_a_sound/ajax/{id}',[FaqController::class, 'qAndASoundAjax'])->middleware('can:faqs');
    Route::get('faqs/q_and_a_video/ajax/{id}',[FaqController::class, 'qAndAVideoAjax'])->middleware('can:faqs');

     //procedures
     Route::resource('procedures', ProcedureController::class ,['as'=> 'admin'])->middleware('can:procedures');
     Route::get('procedures/image/ajax/{id}',[ProcedureController::class, 'imageAjax'])->middleware('can:procedures');
     Route::get('procedures/desc_sound/ajax/{id}',[ProcedureController::class, 'descSoundAjax'])->middleware('can:procedures');
     Route::get('procedures/desc_video/ajax/{id}',[ProcedureController::class, 'descVideoAjax'])->middleware('can:procedures');

     //regulations
     Route::resource('regulations', RegulationController::class ,['as'=> 'admin'])->middleware('can:regulations');
     Route::get('regulations/image/ajax/{id}',[RegulationController::class, 'imageAjax'])->middleware('can:regulations');
     Route::get('regulations/desc_sound/ajax/{id}',[RegulationController::class, 'descSoundAjax'])->middleware('can:regulations');
     Route::get('regulations/desc_video/ajax/{id}',[RegulationController::class, 'descVideoAjax'])->middleware('can:regulations');

     //excels
     Route::get('importExportView', [ExcelController::class, 'importExportView'])->middleware('can:excel');
     Route::post('import', [ExcelController::class, 'import'])->name('import')->middleware('can:excel');

      //roles
      Route::resource('/roles', RoleController::class, ['as' => 'admin'])->middleware('can:roles');

    });


Route::get('clear-cache', function ( ){
    Artisan::call('cache:clear');
    Artisan::call('config:clear');
    return response('cache cleared');
});
