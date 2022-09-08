<?php

namespace App\Models;

//use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class member extends Authenticatable
{
    //use HasFactory;
    use Notifiable;
    protected $guard = 'member';
    protected $primaryKey = 'member_id';
    protected $keyType = 'string';
    protected $table = 'members';
    protected $filllable = 
        [
            'email',
            'password',
            'member_id',
            'profile',
            'name',
            'surname',
            'card_id',
            'tel',
            'type',
            'county',
            'road',
            'alley',
            'house_number',
            'group_no',
            'sub_district',
            'district',
            'province',
            'ZIP_code',
            'status'
        ];
    protected $hidden = ['password']; 
    
    public function getFullNameAttribute()
    {
        return "คุณ{$this->name} {$this->surname}";
    }
    public function getTelHiddenAttribute()
    {
        return Str::mask($this->tel,'*',3,5);
    }
    //get Attribute อย่าใช้ชื่อที่ซ้ำกับ column ที่มีอยู่เเล้ว
    //models ตั้งชื่อเป็นตัวใหญ่
}
