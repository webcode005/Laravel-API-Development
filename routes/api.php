<?php
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\ApiController;



Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
// API routes
Route::get("list-students", [ApiController::class, "listStudents"]);
Route::get("single-student/{id}", [ApiController::class, "getSingleStudent"]);
Route::post("add-student", [ApiController::class, "CreateStudent"]);
Route::put("update-student/{id}", [ApiController::class, "updateStudent"]);
Route::delete("delete-student/{id}", [ApiController::class, "deleteStudent"]);




Route::post("register", [StudentController::class, "register"]);
Route::post("login", [StudentController::class, "login"]);
Route::group(["middleware" => ["auth:sanctum"]], function(){
Route::get("profile", [StudentController::class, "profile"]);
    Route::get("logout", [StudentController::class, "logout"]);
Route::post("create-project", [ProjectController::class, "createProject"]);
    Route::get("list-project", [ProjectController::class, "listProject"]);
    Route::get("single-project/{id}", [ProjectController::class, "singleProject"]);
    Route::delete("delete-project/{id}", [ProjectController::class, "deleteProject"]);
});