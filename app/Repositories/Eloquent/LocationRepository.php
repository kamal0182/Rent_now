<?php
namespace App\Repositories\Eloquent ;

use App\Models\location;
use App\Repositories\Concrats\LocationRepositoryInterface;

class LocationRepository implements LocationRepositoryInterface
{
    public $location ;
    public function __construct(location $location)
    {
        $this->location = $location ;
    }
    public function create($x, $y)
    {
        $this->location->longitude  = $x ;
        $this->location->latitude = $y ;
        $this->location->save();
        return $this->location ;
    }
    public function update($x , $y)
    {

    }
    public function delete($id)
    {

    }
}
