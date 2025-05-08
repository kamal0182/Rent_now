<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Notifications\RentalAnswer;
use App\Notifications\RentalCreated;
use App\Repositories\Concrats\ProductRepositoryInterface;
use App\Repositories\Concrats\RentalRepositoryInterface;
use Illuminate\Validation\Rule;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use PhpParser\Node\Expr\FuncCall;

class RentalController extends Controller
{
    public $rentalrepository;
    public $productRepository;
    public function __construct(RentalRepositoryInterface $rental, ProductRepositoryInterface $product)
    {
        $this->productRepository = $product;
        $this->rentalrepository = $rental;
    }
    public function showRentals()
    {
        $rentals = $this->rentalrepository->allRentals(6);
        return   view("admin.rentals", compact('rentals'));
    }
    public function showpaneer(Request $request)
    {

        $products = $request->session()->get('cart');

        foreach($products as $key => $value )
        {
            $prdt  =    $this->findproduct($value['id']);
            $products[$key]['title'] = $prdt->title ;
            $products[$key]['price'] = $prdt->price ;
        }

        $totalprice =  $this->totalprice($products);
        return view('paneer' , compact('products' , 'totalprice'));
    }
    public function totalprice($products)
    {
        $totalPrice = 0 ;
        foreach($products as $product)
        {
            $totalPrice += $product['price'] * $product['quantity']  ;
        }
        return $totalPrice ;
    }
    public function showRenatals()
    {
        $rentals  = $this->rentalrepository->allRentals(6);
    }
    public function showSelectedRental($id)
    {
        $rental = $this->rentalrepository->findById($id);
        $product = $rental->product ;
        return view('rentals',compact('rental' , 'product'));
    }
    public function findproduct($id)
    {
        return $this->productRepository->findById($id);
    }
    public function changeThestatus ( Request $request)
    {
        $rental = $this->rentalrepository->changeTheStatus($request->id ,$request->status );
        $rental1 =  $this->rentalrepository->findById($request->id) ;
        $user = $rental1->renter;
        if($user)
        {
            $user->notify(new RentalAnswer($rental));
        }
        return back();
    }
    public function create(Request $request, $productid)
    {
        $validated = $request->validate([
            'startdate' => 'required|date|after_or_equal:today',
            'finaledate' => 'required|date|after_or_equal:start_date',
            'quantity' => 'required|int'
        ]);
        $productQuantity  = $this->getQuantity($productid);
        $rentals  = $this->rentalrepository->allRentalsProducts($productid);
        $value =  $this->checkPlase( $validated , $productQuantity , $rentals , $productid );
        if($value){ $rental =  $this->rentalrepository->create($validated , $productid);
            $user = $this->productRepository->findById($productid)->renter ;
            if($user)
            $user->notify(new RentalCreated($rental));
            }
        return view('client.wait');
    }
    public function getQuantity($productid)
    {
      return    $this->productRepository->findById($productid)->quantity;
    }
    public function checkPlase($validated , $productQuantity , $rentals , $productid)
    {
        $date_in = str_replace('T', ' ', $validated['startdate']) . ' 00:00:00';
        $date_out = str_replace('T', ' ', $validated['finaledate']) . ' 00:00:00';
        $counter = 0 ;
        $quantitycounter = 0 ;
        if (count($rentals) > 0) {
            foreach ($rentals as $key => $rental) {
                $diff = $this->formatDate($date_in , $rental->starte_date) ;
                $diff1 = $this->formatDate($date_in,  $rental->end_date);
                $diff2 = $this->formatDate($rental->end_date,  $date_out);
                if ($diff == "+") {
                    $diff = $this->formatDate($date_out , $rental->starte_date ) ;
                    if ($diff == "+") {
                        $counter++;
                    }
                } elseif ($diff == "-") {
                    $diff = $this->formatDate($date_in , $rental->end_date);
                    if ($date_in == $rental->end_date || $diff == "-") {
                        $counter++;
                    }
                }
                if ($diff1 == '+'  && $diff2 == "+") {
                    $quantitycounter  += $rental->quantity;
                }
            }
            $leftquantity   =  $productQuantity - $quantitycounter ;
            if ($productQuantity > $quantitycounter &&  $validated['quantity'] <= $leftquantity ) {
                return true  ;
            }
            if ($counter == count($rentals) && $productQuantity >= $validated->quantity) {
                return true ;
            }
            } else {
            return true ;
            }
        return false ;
    }
    public function formatDate($date1  , $date2)
    {
        $date1 = date_create($date1);
        $date2 = date_create($date2);
        $diff = date_diff($date1 , $date2);
        return  $diff->format('%R');
    }
    public function addtocart(Request $request)
    {
        $validated = $request->validate([
            'startdate' => 'required|date|after_or_equal:today',
            'finaledate' => 'required|date|after_or_equal:start_date',
            'quantity' => 'required|int'
        ]);
        $productQuantity  = $this->getQuantity($request->product_id);
        $rentals  = $this->rentalrepository->allRentalsProducts($request->product_id);
        if($this->checkifProductExiste($request->product_id)){
            $cart = session()->get('cart');
            $leftquantity = $this->getQuantity($request->product_id) -  ($this->databaseReservationQuantity( $request->startdate, $request->finaledate , $request->product_id)
            + $this->checkIfTheSameDateAndReturnQuantiyCart($cart  , $request->startdate, $request->finaledate));
            if($leftquantity >= $validated['quantity'])

            {
               $this->saveToSession($validated , $request->product_id);
            redirect('paneer');

            }
        }
        else{
            $this->saveToSession($validated , $request->product_id);
            redirect('paneer');
        }

        // dd($validated['quantity']);

        return back()->with('error','chose another date');
    }
    public function checkifProductExiste($product_id)
    {

        $exists = collect(session()->get('cart'))->contains('id', $product_id);
        return $exists ;
    }
    public function saveToSession($validated, $product_id)
    {
        $cart[] = [
            'id' => $product_id,
            'quantity' => $validated['quantity'],
            'startedate'=>$validated['startdate'],
            'finaledate' => $validated['finaledate']
        ];
        session()->put('cart', $cart);
        session()->save();
    }
    public function databaseReservationQuantity($startdate , $endDate , $product_id)
    {
        $productReservations  = $this->rentalrepository->allRentalsProducts($product_id);
        $quantity  = 0 ;
        foreach($productReservations as $rental)
        {
            $diff1 = $this->formatDate($startdate ,  $rental->end_date);
            $diff2 = $this->formatDate($rental->startdate,  $endDate);
            if ($diff1 == '+'  && $diff2 == "+") {
                $quantity  += $rental->quantity;
            }
        }
        return $quantity ;
    }


    public function checkIfTheSameDateAndReturnQuantiyCart($cart , $startedate, $enddate)
    {
        $cartequantity  = 0 ;
        foreach($cart as $object)
        {

            $diff1 = $this->formatDate($startedate,  $object['finaledate']);
            $diff2 = $this->formatDate($object['startedate'],  $enddate);

            if($diff1 == "+" && $diff2 == "+")
            {
                $cartequantity += $object['quantity'] ;

            }
        }

        return $cartequantity ;
    }
    public function deleteFromCarte(Request $request)
    {
        $cartProducts  = ($request->session()->get('cart'));

        $products =  [] ;
        foreach($cartProducts as $key=>$value){
            if($value['id'] != $request->product_id ){
                $products[]  = $cartProducts[$key];
            }
        }

        $request->session()->put('cart',$products);
        return redirect('paneer');

    }
    public function updateCartSession(Request $request)
    {

        $cart = $request->session()->get('cart');
        foreach($cart as $key => $value)
        {
            if($cart[$key]['id'] == $request->id){
                $cart[$key]['quantity'] = $request->quantity;
            }
        }
        $request->session()->put('cart', $cart);
        return redirect('paneer') ;
    }
    public function showdetail()
    {
        return  view("detailrent");
    }
}
