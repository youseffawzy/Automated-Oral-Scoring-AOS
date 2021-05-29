<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Department extends Model
{
    //
    protected $table ='department';
    protected $fillable = [
        
    ];
    public $timestamps = false;
    public function user()
      {
          return $this->hasMany(User::class , 'id_department');
      }
      public function program()
      {
          return $this->hasMany(Program::class , 'id_department');
      }
      
}
