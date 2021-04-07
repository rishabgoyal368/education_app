<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Chapter extends Model
{
    protected $fillable = [
        'chapter_name',
        'paper_id',
        'subject_id',
        'class_id',
    ];

    public function paper(){
        return $this->hasOne(Category::class, 'id', 'paper_id');
    }

    public function subject(){
        return $this->hasOne(Category::class, 'id', 'subject_id');
    }

    public function class(){
        return $this->hasOne(Category::class, 'id', 'class_id');
    }


    public function questions_list(){
        return $this->hasMany(Question::class, 'chapter_id', 'id');
    }

}
