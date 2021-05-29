<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Actual_answer extends Model
{
    protected $table='actual_answer';
    protected $primaryKey = 'id';
    protected $fillable = [
        
    ];
    public $timestamps = false;
    public function Answers()
	{
		return $this->belongsTo(Answer::class, 'Answers_id');
    }
}
