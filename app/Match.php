<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Match extends Model
{
	protected $table='match';
	protected $primaryKey = 'id_component';
	protected $fillable = [
        'id_component' , 'priority' ,'exam_idexam','name'
    ];
    public $timestamps = false;
    public function exam()
	{
		return $this->belongsTo(Exam::class, 'exam_idexam');
	}

	public function match_true_answer()
	{
		return $this->hasMany(Match_true_answer::class, 'match_id_component');
	}
	public function match_answers()
	{
		return $this->hasMany(Match_Answers::class, 'match_component_id');
    }
}
