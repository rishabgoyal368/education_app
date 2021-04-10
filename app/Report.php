<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Report extends Model
{
	protected $table = 'reports';

    protected $fillable = [
        'user_id',
        'total_question',
        'total_correct_quesiton',
        'percentage'
    ];

    public function user_name(){
        return $this->hasOne(User::class, 'id', 'user_id')->select('id','first_name','last_name');
    }
}
