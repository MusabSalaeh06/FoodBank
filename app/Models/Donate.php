<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Donate extends Model
{
    use HasFactory;
    protected $primaryKey = 'id';
    protected $keyType = 'string';
    protected $table = 'donates';
    protected $filllable = ['id','product_id','quantity','sender','reciever','admin','status','image']; 

    public function recievers()
    {
        return $this->belongsTo(member::class,'reciever','member_id');
    }
    public function senders()
    {
        return $this->belongsTo(member::class,'sender','member_id');
    }
    public function admins()
    {
        return $this->belongsTo(member::class,'admin','member_id');
    }
    public function products()
    {
        return $this->belongsTo(product::class,'product_id','product_id');
    }

}
