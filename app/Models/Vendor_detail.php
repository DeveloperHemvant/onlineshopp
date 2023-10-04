<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vendor_detail extends Model
{
    use HasFactory;
    protected $fillable = [
        'vendor_id',
        'phone' ,
        'city',
        'district',
        'state',
        'pincode',
        'country',
        'shop',
    ];
}
