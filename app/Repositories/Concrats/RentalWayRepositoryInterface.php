<?php
namespace App\Repositories\Concrats ;

use App\Models\RentWay;

interface RentalWayRepositoryInterface
{
    public function create($data);
    public function update($data);
    public function delete($id);
    public function allRentways();
    public function findByName($name): RentWay ;
}
