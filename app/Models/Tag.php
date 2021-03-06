<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Hobby;

class Tag extends Model
{
    protected $guarded =[];
    use HasFactory;

    public function hobbies(){
        return $this->belongsToMany('App\Models\Hobby');
    }

    public function filteredHobbies(){
        return $this->belongsToMany('App\Models\Hobby')
        ->wherePivot('tag_id', $this->id)
        ->orderBy('updated_at', 'DESC');
    }
}
