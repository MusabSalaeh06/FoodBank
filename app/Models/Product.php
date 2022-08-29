<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use Notifiable;
    use HasFactory;
    protected $guarded = [];
    protected $primaryKey = 'product_id';
    protected $keyType = 'string';
    protected $table = 'products';
    protected $filllable = ['product_id','giver','admin','name','type','amount','quantity','unit','date','product_image','status','description']; 

    public function givers()
    {
        return $this->belongsTo(member::class,'giver','member_id');
    }
    public function admins()
    {
        return $this->belongsTo(member::class,'admin','member_id');
    }
    public function types()
    {
        return $this->belongsTo(Product_type::class,'type','product_type_id');
    }
}
