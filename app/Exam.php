<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Make;
use App\Exams_degree;
use App\Course;
use App\Match;
use App\Question;
class Exam extends Model
{
	protected $primaryKey = 'idexam';
	protected $table ='exam';
	protected $fillable = [
		'idexam', 'duration' , 'ex_start' ,'ex_end','name','course_code','degree',
		'num_of_mcq_e','num_of_mcq_n','num_of_mcq_h', 'num_of_match_e', 'num_of_match_n', 'num_of_match_h'
		 , 'num_of_complete_e', 'num_of_complete_n', 'num_of_complete_h'
    ];
    public $timestamps = false;
    public function course()
	{
		return $this->belongsTo(Course::class, 'course_code');
	}

	public function exams_degree()
	{
		return $this->hasMany(Exams_degree::class, 'id_exam');
	}

	public function make()
	{
		return $this->hasMany(Make::class, 'exam_idexam');
	}

	public function match()
	{
		return $this->hasMany(Match::class, 'exam_idexam');
	}

	public function question()
	{
		return $this->hasMany(Question::class, 'id_exam');
    }
    
}
