<?php
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\userController;
use App\Http\Resources\UserResource;
use App\Http\Controllers\indicatorsController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/
Route::get('/usuario/{id}',function ($id){
    return new UserResource(User::findOrFail($id));
});
Route::get('/usuario',function (){
    return  UserResource::collection(User::all());
});

Route::post('/usuario',[userController::class,'store']);
Route::put('/usuario/{id}', [userController::class,'update']);
Route::delete("/usuario/{id}", [userController::class,'destroy']);
Route::get('/indicators',[indicatorsController::class, 'getAllCountsPerUser']);

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});



                               