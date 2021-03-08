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
        return $this->belongsTo(Question::class);
    }
    // use HasFactory;
}
