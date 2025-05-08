<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Repositories\Concrats\UserRepositoryInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public $userRepository ;
        public function __construct(UserRepositoryInterface $user)
        {
            $this->userRepository = $user ;
        }
    public function showprofile()
    {

        $user = Auth::user();
        $numberOfProducts = count($user->products);
        $numberOfRentals = count($user->rental);
        $notifications  = $user->unreadNotifications;
        $count = $user->unreadNotifications->count();
        // dd($rentals);
        return view('client.profile' , compact('user','numberOfProducts','numberOfRentals' ,'notifications','count'));
    }
    public function showusers()
    {
        $users = $this->userRepository->getAllUsers();
        $user = Auth::user();
        $notifications  = $user->unreadNotifications;
        $count = $user->unreadNotifications->count();
        return view('admin.dashboarde' ,compact('notifications','count'));
    }
    public function showAllUsers()
    {
        // dd('ascasc');
        $users = $this->userRepository->getAllUsers();
        return view('admin.users',compact('users'));
    }
    public function updateProfile(Request $request)
    {
        $data = $request->validate( [
            'firstname'=>'required|string',
            'lastname' =>'required|string',
            'email'  => 'required|email|unique:users,email',
            'phone' => 'required|unique:users,phone'
        ]);
        $user = $this->userRepository->UpdateInfo($data);
        return back();
    }
    public function showhomepage()
    {
        $user = Auth::user();
        if($user->roles->contains('name', 'admin'))
        {
            return ('admin.dashboarde');
        }
        return view('aaa');
    }
    public function showdata(Request $request)
    {
        $apiKey = '431b251968a44a8773b16d43824dfa69';
        $address = "Maroc, Casablanca, Casa voyageurs" ; // Replace with your actual API key
        $response = Http::get("http://api.positionstack.com/v1/forward", [
            'access_key' => $apiKey,
            'query' => $address,
        ]);
        $data = $response->json();
        $api = 'a5795b2723f04ae48e310f9825047df2';
        $apiKey = env('OPENCAGE_API_KEY');  // Store API key in .env file

        // Get the address input from the request
        $address = $request->input('address');

        // Make the request to OpenCage API
        $response = Http::get('https://api.opencagedata.com/geocode/v1/json', [
            'q' => $address,
            'key' => $apiKey
        ]);

        $data1 = $response->json();

    }


}
