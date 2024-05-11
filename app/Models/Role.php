<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    use HasFactory;

    protected $fillable = [
        'role_name',
        'is_admin'
    ];

    public function access()
    {
        return $this->hasMany(RoleAccess::class, 'role_id', 'id');
    }
}
