<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = ['name'];

    public function subcategory()
    {
        return $this->hasMany('App\Models\SubCategory', 'id');
    }
    public function question()
    {
        return $this->belongsToMany(Question::class);
    }
    public function concept()
    {
        return $this->hasOne(Concept::class);
    }
    // use HasFactory;
}
