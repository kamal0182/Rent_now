<?php
namespace App\Repositories;
namespace App\Repositories\Eloquent ;
use App\Models\RentWay;
use App\Repositories\Concrats\RentalWayRepositoryInterface;

class RentWayRepository implements RentalWayRepositoryInterface
{
    public function create($data)
    {
        return RentWay::create([
            'name' => $data['name']
        ]);
    }

    public function update($data)
    {
        $rentWay = RentWay::findOrFail($data['id']);
        $rentWay->name = $data['name'];
        $rentWay->save();
        return $rentWay;
    }

    public function delete($id)
    {
        $rentWay = RentWay::findOrFail($id);
        return $rentWay->delete();
    }

    public function allRentways()
    {
        return RentWay::all();
    }

    public function findByName($title): RentWay
    {
        return RentWay::where('title', $title)->firstOrFail();
    }
}
