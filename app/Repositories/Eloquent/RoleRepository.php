<?php
namespace  App\Repositories\Eloquent ;

use App\Models\Role;
use App\Repositories\Concrats\RoleRepositoryInterface;

class RoleRepository implements RoleRepositoryInterface {
    public Role $roleModel ;
    public function __construct(Role $role)
    {
        $this->roleModel = $role  ;
    }
    public function findByName(string $name)
    {
        $role = Role::where('name',$name)->first();
        return $role ;
    }
}
