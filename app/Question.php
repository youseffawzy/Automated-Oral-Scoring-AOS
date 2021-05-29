<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Exam;
use App\True_answer;
use App\Choices;
use App\Answers;
class Question extends Model
{
	protected $table ='question';
	protected $primaryKey = 'id';
	protected $fillable = [
        'id', 'q_text' ,'id_exam' ,'pority'  , 'type'
	];
	
 
    public $timestamps = false;
    public function exam()
	{
		return $this->belongsTo(Exam::class, 'id_exam');
	}

	public function choice()
	{
		return $this->hasMany(Choices::class, 'question_id');
    }
    public function true_answer()
	{
		return $this->hasMany(True_answer::class, 'question_⁯id');
	}
	public function answers()
	{
		return $this->hasMany(Answer::class, 'question_⁯id');
	}

}
