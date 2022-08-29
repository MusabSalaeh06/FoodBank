<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product_type extends Model
{
    use HasFactory;
    protected $primaryKey = 'product_type_id';
    protected $keyType = 'string';
    protected $table = 'product_types';
    protected $filllable = ['product_type_id','name','image','description']; 
}
