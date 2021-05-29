<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Teach extends Model
{
	protected $table ='teach';
	protected $fillable = [
        
    ];
    public $timestamps = false;
    public function course()
	{
		return $this->belongsTo(Course::class, 'course_code');
    }
    public function user()
	{
		return $this->belongsTo(User::class, 'users_id');
	}
}
