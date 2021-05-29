<?php

use Illuminate\Http\Request;

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
Route::apiResource('/exams' , 'ExamController');
Route::get('/course' ,'CourseController@show');
Route::post('/student' ,'StudentController@show');
Route::get('/getquestion' ,'GetQuestions@getquestion');
Route::post('/users' ,'DoctorController@show');
Route::get('/degree_student' ,'DegreeExamController@index');
Route::post('/degree_student' ,'DegreeExamController@store');
Route::get('/getcomplete' ,'CompleteController@indexx');
Route::get('/getmatchController' ,'getmatchController@index');

Route::post('/studentdoctor','StudentDoctorController@index');
Route::post('questiondoctor/delete/{question}' ,'QuestionDoctorController@destroyy');
Route::get('/questiondoctor' ,'QuestionDoctorController@index');
Route::get('/matchdoctor' ,'MatchDoctorController@index');
Route::post('matchdoctor/delete/{match}' ,'MatchDoctorController@destroy');  
Route::post('completedoctor/delete/{question}' ,'CompleteDoctorController@destroyy');
Route::get('/completedoctor' ,'CompleteDoctorController@index');


Route::middleware('auth:api')->get('/user', function (Request $request) {
  return $request->user();
});
Route::post('/users' ,'DoctorController@show');
Route::post('/refresh' ,'DoctorController@refresh');
Route::middleware(['auth:api'])->group(function() {
  Route::post('/logout' ,'DoctorController@logout');
});


  Route::middleware(['auth', 'admin'])->group(function() {
     // Route::get('/dashboard', 'DashboardController@index')->name('dashboard');
      Route::get('/users', 'DoctorController@index')->name('users.index');
      Route::post('/users/{user}/make-admin', 'DoctorController@makeAdmin')->name('users.make-admin');
    });
    
    Route::middleware(['auth'])->group(function() {
      Route::get('/users/{user}/profile', 'DoctorController@edit')->name('users.edit');
      Route::post('/users/{user}/profile', 'DoctorController@update')->name('users.update');
    });
  
  
