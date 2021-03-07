<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Option extends Model
{
    protected $fillable = ['option_1','option_2','option_3','option_4'];
    public function question()
    {
        return $this->belongsTo(Question::class);
    }
}
