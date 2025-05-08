<?php
namespace App\Repositories\Eloquent ;

use App\Models\Rental;
use App\Models\Role;
use App\Models\User;
use App\Repositories\Concrats\RoleRepositoryInterface;
use App\Repositories\Concrats\UserRepositoryInterface as ConcratsUserRepositoryInterface;
use App\Repositories\UserRepositoryInterface;
use Illuminate\Container\Attributes\Auth;
use Illuminate\Support\Facades\Auth as FacadesAuth;
use Illuminate\Support\Facades\Hash;

class UserRepository implements ConcratsUserRepositoryInterface {
    public User $userModel  ;
    public $roleRepository  ;
    public function __construct(User $user , RoleRepositoryInterface $role)
    {
        $this->userModel = $user ;
        $this->roleRepository = $role ;
    }
    public function create ($data){

        $this->userModel->firstname  =  $data['firstname'] ;
        $this->userModel->lastname  =  $data['lastname'] ;
        $this->userModel->email  = $data['email'] ;
        $this->userModel->phone = $data['phone'];
        $this->userModel->password = Hash::make($data['password']);
        $this->userModel->save();
        $role = $this->findUserRole('Admin');
        $this->userModel->roles()->attach($role);

    }
    public function getAllProducts(User $user): array
    {
        $products = $user->products ;
        return $products ;
    }
    public function UpdateInfo($data)
    {
        $user = FacadesAuth::user();
        $user->firstname  = $data['firstname'];
        $user->lastname = $data['lastname'];
        $user->email = $data['email'];
        $user->phone = $data['phone'];
        $user->save();
    }
    public function getAllRentalsItems(User $user): array
     {
        $rentals = $user->rentals();
        return  $rentals ;
    }
    public function findUserRole($name)
    {
        $role = Role::where('name',$name)->first();
        return $role ;
    }
    public function getUserRole(User $user) : Role
    {
        $role = $user->role;
        return  $role ;
    }
    public function getAllUsers()
    {
        $users = User::all();
        return $users ;
    }
}

