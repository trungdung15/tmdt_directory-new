<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Customer extends Model
{
    use HasFactory, SoftDeletes;
    protected $fillable = [
        'name',
        'email',
        'password',
        'avatar', 'phone_number', 'address', 'gender', 'birthday', 'reset_pasword',
    ];

    public function order(){
       return $this->hasMany(Order::class)->orderBy('id', 'DESC');
    }
}
