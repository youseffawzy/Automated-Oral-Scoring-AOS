<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Answer extends Model
{
    protected $table='Answers';
    protected $primaryKey = 'id_answer';
    protected $fillable = [
        'question_id' , 'id_student' , 'id_exam'
    ];
    public $timestamps = false;
    public function question()
	{
		return $this->belongsTo(Question::class, 'question_id');
    }
    public function actual_answer()
	{
		return $this->hasMany(Actual_answer::class, 'Answers_id');
    }
}
