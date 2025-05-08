<?php
namespace App\Repositories\Concrats ;

use App\Models\Rental;

interface RentalRepositoryInterface
{
    public function create($data , $id);
    public function update($data);
    public function delete($id);
    public function allRentals($number);
    public function allRentalsProducts($prodcutid);
    public function findById($id);
    public function changeTheStatus($id,$status);
    }
