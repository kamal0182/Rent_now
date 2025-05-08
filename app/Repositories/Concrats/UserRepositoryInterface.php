<?php

namespace App\Repositories\Concrats;

use App\Models\Role;
use App\Models\User;

interface  UserRepositoryInterface
{
    public function create($data);
    public function getAllProducts(User $user): array;
    public function  getAllRentalsItems(User $user): array;
    public function getUserRole(User $user): Role;
    public function UpdateInfo($data);
    public function getAllUsers();
}
