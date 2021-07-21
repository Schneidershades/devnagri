<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Permission;
use App\Models\Role;

class RolePermission extends Model
{
    protected $table = "roles_permissions";

    public function role()
    {
    	return $this->belongsTo(Role::class);
    }

    public function permission()
    {
    	return $this->belongsTo(Permission::class);
    }
}
