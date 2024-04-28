<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    use HasFactory;

    //Relationship to lession
    public function lessions(){
        return $this->hasMany(Lession::class, "course_id");
    }
}
