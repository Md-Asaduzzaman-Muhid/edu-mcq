<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    protected $fillable = ['question','sub_cat_id','option_id','answer_id'];
    public function option()
    {
        return $this->hasOne(Option::class);
    }
    public function answer()
    {
        return $this->hasOne(Answer::class);
    }
    public function subcategory()
    {
        return $this->morphToMany(SubCategory::class, 'categorie');
    }
    public function category()
    {
        return $this->morphToMany(Category::class, 'sub_categorie');
    }
}
