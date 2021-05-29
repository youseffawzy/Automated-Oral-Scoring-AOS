<?php

namespace App;
use Laravel\Passport\HasApiTokens;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
  use HasApiTokens, Notifiable;
    protected $table ='users';
    protected $primaryKey = 'id';
    public $timestamps = false;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'fname','mname','lname', 'email', 'password','id_department' ,'id'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    public function isAdmin() {
        return $this->role === 'admin';
      }
    
      public function getGravatar() {
        $hash = md5(strtolower(trim($this->attributes['email'])));
        return "http://gravatar.com/avatar/$hash";
      }
    
      /*public function hasPicture() {
        if (preg_match('/profilesPicture/',$this->profile->picture,$match)) {
          return true;
        } else {
          return false;
        }
      }*/
    
      public function getPicture() {
        return $this->profile->picture;
      }
      public function profile() {
        return $this->hasOne(Profile::class , 'users_id');
      }
      public function teach()
      {
          return $this->hasMany(Teach::class , 'users_id');
      }
      public function make()
      {
          return $this->hasMany(Make::class , 'users_id');
      }
      public function department()
      {
          return $this->belongsTo(Department::class , 'id_department');
      }
      
      
}
