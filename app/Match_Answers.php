<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Match_Answers extends Model
{
    //

    protected $table='match_answers';
    protected $fillable = [
      'id' , 'id_student' ,'id_exam','match_component_id'
        
    ];
    public $timestamps = false;
    public function match()
	{
		return $this->belongsTo(Match::class, 'match_component_id');
    }
    public function match_student_answer()
	{
		return $this->hasMany(match_student_answer::class, 'match_answers_id');
    }
}
