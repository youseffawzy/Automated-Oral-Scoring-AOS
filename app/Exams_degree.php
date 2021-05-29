<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Exams_degree extends Model
{
    //
    protected $table='exams_degree';
    protected $fillable = [
        
    ];
    public $timestamps = false;
    public function student()
	{
		return $this->belongsTo(Student::class, 'id_student');
    }
    public function exam()
	{
		return $this->belongsTo(Exam::class, 'id_exam');
	}
}
