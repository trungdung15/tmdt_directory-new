<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Permission_role extends Model
{
    use HasFactory;

    public function role(){
        return $this->belongsTo(Role::class, 'role_id');
    }
}
