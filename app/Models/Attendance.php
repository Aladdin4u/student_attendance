<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Attendance extends Model
{
    use HasFactory;

    //Relationship to lession
    public function lessions(){
        return $this->hasMany(Lession::class, "attendance_id");
    }
}
