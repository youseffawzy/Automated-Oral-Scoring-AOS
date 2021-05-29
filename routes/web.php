<?php

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

use App\Http\Middleware\CheckExam;

Route::get('/', function () {
    return view('welcome');
});

Route::get('admin', function () {
  return view('admin.dashboard');
});

Auth::routes();

Route::get('/home','AdminController@courses');
Route::get('/home', 'HomeController@index')->name('home');
Route::get('/getquestion' ,'GetQuestions@getquestion');
Route::get('/getcomplete','CompleteController@index');
Route::get('/studentdoctor','StudentDoctorController@index');
Route::get('/questiondoctor' ,'QuestionDoctorController@index');
Route::get('/matchdoctor' ,'MatchDoctorController@index');
Route::DELETE('/questiondoctor/{question}' ,'QuestionDoctorController@destroy');
Route::DELETE('/matchdoctor/{match}' ,'MatchDoctorController@destroy');
Route::middleware(['auth'])->group(function(){ 
//Route::resource('/exams' , 'ExamController');
Route::get('/course/{course}/exams' , 'ExamController@index');
Route::get('/course/{course}/exams/create' , 'ExamController@create');
Route::POST('/course/{course}/exams' , 'ExamController@store');    
Route::DELETE('/course/{course}/exams/{exam}' , 'ExamController@destroy');
Route::put('/course/{course}/exams/{exam}' , 'ExamController@update');
Route::get('/course/{course}/exams/{exam}/edit' , 'ExamController@edit');




// completes
Route::get('/course/{course}/exams/{exam}/examquestion/completes' , 'CompleteController@index');
Route::get('/course/{course}/exams/{exam}/examquestion/completes/create' , 'CompleteController@create');
Route::POST('/course/{course}/exams/{exam}/examquestion/completes' , 'CompleteController@store');    
Route::DELETE('/course/{course}/exams/{exam}/examquestion/completes/{question}' , 'CompleteController@destroy');
Route::PUT('/course/{course}/exams/{exam}/examquestion/completes/{question}' , 'CompleteController@update');
// Route::get('/course/{course}/exams/{exam}/examquestion/completes/{question}' , 'CompleteController@show');
Route::get('/course/{course}/exams/{exam}/examquestion/completes/{question}/edit' , 'CompleteController@edit');

//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
// TF OR MCQ QUESTION
//Route::resource('/exams/{exam}/examquestion/questions' , 'QuestionController');
Route::get('/course/{course}/exams/{exam}/examquestion/questions' , 'QuestionController@index');
Route::get('/course/{course}/exams/{exam}/examquestion' , 'ExamquestionController@show');
Route::get('/course/{course}/exams/{exam}/examquestion/questions/create' , 'QuestionController@create');
Route::POST('/course/{course}/exams/{exam}/examquestion/questions' , 'QuestionController@store');    
Route::DELETE('/course/{course}/exams/{exam}/examquestion/questions/{question}' , 'QuestionController@destroy');
Route::PUT('/course/{course}/exams/{exam}/examquestion/questions/{question}' , 'QuestionController@update');
// Route::get('/course/{course}/exams/{exam}/examquestion/questions/{question}' , 'QuestionController@show');
Route::get('/course/{course}/exams/{exam}/examquestion/questions/{question}/edit' , 'QuestionController@edit');
Route::DELETE('/course/{course}/exams/{exam}/examquestion/questions/deleteRow/{question}' , 'QuestionController@deleteRow');
//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////


//Route::resource('/matches' , 'MatchController');

Route::get('/course/{course}/exams/{exam}/examquestion/matches' , 'MatchController@index');
Route::get('/course/{course}/exams/{exam}/examquestion/matches/create' , 'MatchController@create');
Route::POST('/course/{course}/exams/{exam}/examquestion/matches' , 'MatchController@store');    
Route::DELETE('/course/{course}/exams/{exam}/examquestion/matches/{match}' , 'MatchController@destroy');
Route::PUT('/course/{course}/exams/{exam}/examquestion/matches/{match}' , 'MatchController@update');
// Route::get('/course/{course}/exams/{exam}/examquestion/matches/{match}' , 'MatchController@show');
Route::get('/course/{course}/exams/{exam}/examquestion/matches/{match}/edit' , 'MatchController@edit');

//Route::resource('/examquestion' , 'ExamquestionController');

//Route::get('/courses' , 'CourseController@index');

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
