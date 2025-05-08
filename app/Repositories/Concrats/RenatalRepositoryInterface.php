<?php
namespace App\Repositories\Concrats;
use App\Models\Rental;
use App\Models\User;

interface  RenatalRepositoryInterface
{
    public function create( array $data, int  $productId, User $user);
    public function updadte($data, int $id , User $user);
    public function delete($id);
    public function findById($id);
    public function allRentalWays();
}
