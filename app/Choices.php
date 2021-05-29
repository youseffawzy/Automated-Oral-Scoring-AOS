<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Choices extends Model
{
	protected $tables='choices';
	protected $primaryKey = 'idchoices';
	
	protected $fillable = [
		'idchoices' , 'choices_text' , 'question_id'
        
    ];
    public $timestamps = false;
    public function question()
	{
		return $this->belongsTo(Question::class, 'question_id');
	}
}
