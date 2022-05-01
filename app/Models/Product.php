<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    public $timestamp = true;

    // table associate with the model
    protected $table = 'products';

    // primary key 

    protected $primaryKey = 'product_id';

    // fillable 

    protected $fillable = [
        'product_name',
        'product_img',
        'product_des',
    ];
}
