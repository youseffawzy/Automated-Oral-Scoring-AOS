<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Study extends Model
{
    //
    protected $table='study';
    protected $fillable = [
        
    ];
    public $timestamps = false;
    public function student()
	{
		return $this->belongsTo(Student::class, 'id_student');
    }
    public function course()
	{
		return $this->belongsTo(Student::class, 'course_code');
	}
}
