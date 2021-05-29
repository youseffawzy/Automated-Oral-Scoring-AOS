<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Make extends Model
{
    //
    protected $table='make';
    protected $fillable = [
        'exam_idexam','users_id'
    ];
    public $timestamps = false;
    public function user()
	{
		return $this->belongsTo(User::class, 'users_id');
    }
    public function exam()
	{
		return $this->belongsTo(Exam::class, 'exam_idexam');
	}
}
