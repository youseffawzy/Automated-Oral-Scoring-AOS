<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Study;
use App\Exam;
use App\Teach;

class Course extends Model
{
    //
	protected $table ='course';
	protected $primaryKey = 'code';
	protected $fillable = [
		'code' , 'name','num_of_hour' ,'degree','semester','level'
        
    ];
    public $timestamps = false;
    public function exam()
	{
		return $this->hasOne(Exam::class);
	}

	public function study()
	{
		return $this->hasMany(Study::class, 'course_code');
	}

	public function teach()
	{
		return $this->hasMany(Teach::class, 'course_code');
	}
}
