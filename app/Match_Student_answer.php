<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Match_Student_answer extends Model
{
    protected $table='match_student_answer';
    protected $fillable = [
        'id' , 'student_answer','match_answers_id','match_true_answer_id_match'
    ];
    public $timestamps = false;
    public function match_true_answer()
	{
		return $this->belongsTo(Match_true_answer::class, 'match_true_answer_id_match');
    }
    public function match_answers()
	{
		return $this->belongsTo(Match_Answers::class, 'match_answers_id');
    }
}
