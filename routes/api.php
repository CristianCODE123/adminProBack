<?php
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\userController;
use App\Http\Controllers\rolesController;
use App\Http\Resources\UserResource;
use App\Http\Controllers\indicatorsController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\notificationController;

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

//crud usuarios
Route::get('/usuario/{id}',function ($id){
    return new UserResource(User::findOrFail($id));
});
// Route::get('/usuario',function (){
//     return $usuario =  UserResource::collection(User::all());
   
// });

Route::get('/usuario', [userController::class, 'find']);

Route::post('/usuario',[userController::class,'store']);
Route::put('/usuario/{id}', [userController::class,'update']);
Route::delete("/usuario/{id}", [userController::class,'destroy']);
Route::get('/indicators',[indicatorsController::class, 'getAllCountsPerUser']);

//crud roles

Route::post('/roles',[rolesController::class,'store']);
Route::get('/roles', [rolesController::class, 'findAll']);
Route::delete("/roles/{id}", [rolesController::class,'destroy']);

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


//auth
Route::group([
    'prefix' => 'auth'
], function ($router) {
    Route::post('register', [AuthController::class, "register"] );
    Route::post('login', [AuthController::class, "login"] );
    Route::post('logout', [AuthController::class, "logout"]);


});

                               
//notify
Route::group([
    'prefix' => 'notify'
], function ($router) {
    Route::get('get', [notificationController::class, 'get']);
    Route::post('add', [notificationController::class, "add"] );

});