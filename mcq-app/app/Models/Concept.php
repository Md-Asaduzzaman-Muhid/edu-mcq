<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Concept extends Model
{
    use HasFactory;
    public function category()
    {
        return $this->belongsTo('App\Models\Category', 'cat_id');
    }
    public function subcategory()
    {
        return $this->belongsTo('App\Models\SubCategory', 'sub_cat_id');
    }
}
