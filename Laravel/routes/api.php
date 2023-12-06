<?php

use App\Http\Controllers\api\AuthController;
use App\Http\Controllers\api\EditalController;
use App\Http\Controllers\api\ManualController;
use App\Http\Controllers\api\SobreController;
use App\Http\Controllers\api\VideoController;
use App\Http\Controllers\api\ChatController;
use App\Http\Controllers\api\CsrfCookieController;
use App\Http\Controllers\api\KeywordsController;
use App\Http\Controllers\api\PerguntaController;
use App\Http\Controllers\api\UserController;
use Illuminate\Support\Facades\Route;


//Autenticação
Route::post('login',[AuthController::class,'login']);

//Cadastrar usuário
Route::post('user',[UserController::class, 'store']);
//Remover usuário
Route::delete('user',[UserController::class, 'remove']);

Route::get('/csrf-cookie', [CsrfCookieController::class, 'getCsrfToken']);

//Vão precisar de auth
Route::group(['middleware'=>['apiJWT']],function()
{
    //Route::post('user',[UserController::class, 'store']);
    Route::post('logout',[AuthController::class,'logout']);
    Route::delete('user',[UserController::class, 'remove']);

});
