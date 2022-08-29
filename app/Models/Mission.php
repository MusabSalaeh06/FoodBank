<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mission extends Model
{
    use HasFactory;
    protected $primaryKey = 'id';
    protected $keyType = 'string';
    protected $table = 'missions';
    protected $filllable = ['id','donate_id','status','sender','image']; 

    public function senders()
    {
        return $this->belongsTo(member::class,'sender','member_id');
    }
    public function donates()
    {
        return $this->belongsTo(Donate::class,'donate_id','donate_id');
    }
}
