<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
    protected $fillable=[
        'cat_name','cat_image'
    ];
    public function subCategories()
    {
        return $this->hasMany('App\sub_Category', 'cat_id');
    }
}
