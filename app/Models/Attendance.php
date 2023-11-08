<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Attendance extends Model
{
    use HasFactory;

    public function scopeFilter($query, array $filters) {

        if($filters['search'] ?? false) {
            $query->where('firstName', 'like', '%' . request('search') . '%')
            ->orWhere('lastName', 'like', '%' . request('search') . '%')
            ->orWhere('otherName', 'like', '%' . request('search') . '%')
            ->orWhere('regNumber', 'like', '%' . request('search') . '%')
            ->orWhere('level', 'like', '%' . request('search') . '%');
        }

        if($filters['date'] ?? false) {
            $query->where('date', 'like', '%' . request('date') . '%');
        }
    }

    //Relationship to lession
    public function lessions(){
        return $this->hasMany(Lession::class, "attendance_id");
    }
}
