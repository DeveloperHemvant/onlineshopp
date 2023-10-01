<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class sub_category extends Model
{
    use HasFactory;
    protected $fillable = [
        'cat_id',
        'sub_cat_name',
        'sub_cat_photo',
    ];
    public function category()
    {
        return $this->belongsTo('App\Category', 'cat_id', 'id');
    }
}
