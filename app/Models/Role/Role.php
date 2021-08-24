<?php

namespace App\Models\Role;

use App\Models\Permission\Permission;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Role extends Model
{
    use HasFactory, SoftDeletes;

    public function permissions()
    {
        return $this->belongsToMany(Permission::class);
    }
}
