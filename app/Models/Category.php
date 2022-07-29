<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $table = 'categories';

    protected $fillable = ['title','created_at', 'updated_at'];

    public function courses(){
        return $this->hasMany(Course::class)->with('user')->with('category');

    }
}
