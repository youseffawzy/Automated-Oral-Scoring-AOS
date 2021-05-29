<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Program extends Model
{
    //
    protected $table='program';
    protected $fillable = [
        
    ];
    public $timestamps = false;
    public function department()
      {
          return $this->belongsTo(Department::class , 'id_department');
      }
      public function student()
	{
		return $this->hasMany(Student::class, 'program_idprogram');
	}
}
