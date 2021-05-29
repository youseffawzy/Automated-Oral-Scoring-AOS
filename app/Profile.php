<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    protected $table = 'profiles';
    protected $fillable = [
        'about' , 'picture','users_id'
        
    ];
    public $timestamps = false;
    public function user()
      {
          return $this->belongsTo(User::class , 'users_id');
      }
      
}
