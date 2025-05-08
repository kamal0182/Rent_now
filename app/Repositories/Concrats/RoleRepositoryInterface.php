<?php
namespace App\Repositories\Concrats;
interface RoleRepositoryInterface {
    public function findByName(string $name);
}
