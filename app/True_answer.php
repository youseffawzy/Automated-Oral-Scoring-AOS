<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class True_answer extends Model
{
    
    protected $table='true_answer';
    protected $primaryKey = 'answer_id';
    protected $fillable = [
      'answer_id' , 'answer_text' , 'question_⁯id'  
    ];
    public $timestamps = false;

    public function question()
	{
		return $this->belongsTo(Question::class, 'question_id');
	}

	
}
