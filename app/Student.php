<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    //
	protected $table ='student';
	protected $primaryKey = 'id';
	protected $fillable = [
        
    ];
    public $timestamps = false;
    public function program()
	{
		return $this->belongsTo(Program::class, 'program_idprogram');
	}

	public function exams_degrees()
	{
		return $this->hasMany(Exams_degree::class, 'id_student');
	}

	public function study()
	{
		return $this->hasMany(Study::class, 'id_student');
	}
}
