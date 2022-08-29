<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Basket extends Model
{
    use HasFactory;
    protected $primaryKey = 'id';
    protected $keyType = 'string';
    protected $table = 'baskets';
    protected $filllable = ['id','donate_id','product_id','quantity','status','admin']; 

    public function product()
    {
        return $this->belongsTo(Product::class,'product_id','product_id');
    }

    public function admins()
    {
        return $this->belongsTo(member::class,'admin','member_id');
    }

    public function donates()
    {
        return $this->belongsTo(Donate::class,'donate_id','id');
    }
    

}
