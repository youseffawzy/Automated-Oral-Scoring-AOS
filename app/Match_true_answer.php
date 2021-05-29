<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Match_true_answer extends Model
{
	protected $table='match_true_answer';
	protected $primaryKey = 'id_match';
	protected $fillable = [
        'question' ,'answer' ,'id_match' ,'match_id_component',
    ];
    public $timestamps = false;
    public function match()
	{
		return $this->belongsTo(Match::class, 'match_id_component');
    }
    public function match_student_answer()
	{
		return $this->hasMany(Match_Student_answer::class, 'match_true_answer_id_match');
	}

}
