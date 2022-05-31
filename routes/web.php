<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\MyResourceController;
use App\Models\Customer;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\SessionController;
use Illuminate\Support\Facades\App;
use App\Http\Controllers\IndexController;

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

//Below two routes are protected by middleware using session
Route::get('/members',[IndexController::class,'getMembers'])->middleware('guard');
Route::get('/groups',[IndexController::class,'getGroups'])->middleware('guard');
Route::get('/groupmodelbinder/{id}',[IndexController::class,'getGroupByModelBinder']);
Route::get('/login',function(){
    session()->put('user_id',9);
    echo 'Logged in now';
});
Route::get('/signout',function(){
    session()->forget('user_id');
    echo 'sign out now';
});

Route::get('/sessions',[SessionController::class,'getAll']);
Route::get('/create',[SessionController::class,'put']);
Route::get('/destroy',[SessionController::class,'delete']);



//We can pass middleware as second parameter in group function
Route::group(['prefix' => '/customer'],function(){
    Route::get('/',[CustomerController::class,'index']);
    Route::get('/trash',[CustomerController::class,'trash']);
    Route::get('/create', [CustomerController::class,'create'])->name('add');
    Route::post('/', [CustomerController::class,'store']);
    Route::get('/delete/{id}',[CustomerController::class,'delete']);
    Route::get('/forcedelete/{id}',[CustomerController::class,'forceDelete']);
    Route::get('/restore/{id}',[CustomerController::class,'restore']);
    Route::get('/edit/{id}',[CustomerController::class,'edit']);
    Route::post('/update/{id}',[CustomerController::class,'update']);
    Route::post('/fileupload',[CustomerController::class,'fileupload']);
});

//localization
Route::get('/{lang?}',function($lang = null){
    App::setLocale($lang);
    return redirect('/customer');
});

Route::resource('/my',MyResourceController::class);


Route::get('/', function () {
    return redirect('welcome');
});

Route::get('/home',[HomeController::class,'index']);
Route::get('/about',[HomeController::class,'about']);


Route::get('/home/{name?}',function($name = null){
    $demo = '<h2 style="color:red">Hello Guest</h2>';
    $data = compact('name','demo');

    return view('home')->with($data);
});

//below parameter name is mandatory and id is optional
Route::get('/demo/{name}/{id?}', function($name, $id = null) {
    $data = compact('name','id');
    //print_r($data);
    return view('demo')->with($data);
});


Route::post('/myput', function(){
    return 'hi post';
});

Route::any('/myany', function(){
    echo 'hi any';
});

Route::put('/myput', function(){
    return 'hi put';
});

Route::delete('/mydelete', function(){
    echo 'hi delete';
});