<?php
namespace App\Repositories\Eloquent;
use App\Models\Product;
use App\Models\Rental;
use App\Models\User;
use App\Repositories\Concrats\RentalRepositoryInterface;
use Illuminate\Support\Facades\Auth;

class RentalRepository implements RentalRepositoryInterface
{
    public $rentalModel ;
    public function __construct(Rental $rental)
    {
        $this->rentalModel = $rental ;
    }


    public function create($data  , $id)
    {
        $user = Auth::user();
        $this->rentalModel->quantity = $data['quantity'];
        $this->rentalModel->start_date = $data['startdate'] ;
        $this->rentalModel->end_date =  $data['finaledate'] ;
         $this->rentalModel->product()->associate($this->findProductById($id));
        $this->rentalModel->renter()->associate($user);
        $this->rentalModel->status = "en cours" ;
        $this->rentalModel->save();
        return $this->rentalModel ;
    }
    public function changeTheStatus($id , $status)
    {
        $rental = $this->findById($id);
        $rental->status = $status ;
        $rental->save();
        return $rental ; 
    }
    public function allRentalsProducts($productid)
    {
        $rentals = Rental::where('product_id', $productid)->orderBy('start_date','asc')->get();
        return $rentals ;
    }
    public function findProductById($id)
    {
        $product = Product::find($id);
        return $product ;
    }
    public function  update($data)
    {
        // $this->rentalModel->total_price = $data->total_price ;
        // $this->rentalModel->start_date = $data->start_date ;
        // $this->rentalModel->end_date = $data->final_date ;
        // $this->rentalModel->product->associate($this->findProductById());
        // $this->rentalModel->user->associate();
    }
    public function delete($id)
    {
        $rental = $this->findById($id);
        return $rental ;
    }
    public function findById($id)
    {
        $rental = Rental::find($id);
        return $rental ;
    }
    public function alluserrentals(User $user)
    {
        $rentals = $user->rental();
        return $rentals ;
    }
    public function allRentals($number)
    {
        $rentals = Rental::paginate($number);
        return $rentals ;
    }

}
