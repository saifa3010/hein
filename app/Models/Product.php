<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable =[

        'title','description','image','category_nameB','category_nameS','size','price','discount_price'
    ];



}
