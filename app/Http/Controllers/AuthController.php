<?php
namespace App\Http\Controllers;

use App\Http\Requests\RoleRequest;
use App\Http\Requests\UserRequest;
use App\Models\Role;
use Illuminate\Http\Request;
use App\Models\User;
use App\Repositories\Concrats\UserRepositoryInterface;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Auth as FacadesAuth;

use Illuminate\Support\Facades\Validator as FacadesValidator;

class AuthController extends Controller
{
    public $userRepository ;
    public function __construct(UserRepositoryInterface $user)
    {
        $this->userRepository = $user ;
    }

    // Show the registration form
    public function showRegisterForm()
    {
        return view('auth.register');
    }
    // Handle the registration form submission
    public function register(Request $request)
    {
        
            $validator = $request->validate( [
                'firstname'=>'required|string',
                'lastname' =>'required|string',
                'email'  => 'required|email|unique:users,email',
                'password'  => 'required|string|min:8,confirmed',
                'phone' => 'required|unique:users,phone',
                'confirmed' => 'required|min:8'
            ]);
            $user =   $this->userRepository->create($validator);
            return redirect()->route('login');
    }

    // Show the login form
    public function showLoginForm()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        // Validate the request data
        $request->validate([
            'email' => 'required|string|email',
             'password' => 'required|string'
        ]);

        if (Auth::attempt($request->only('email', 'password'))) {
            return redirect()->route('home');
        }
        return back()->withErrors(['email' => 'The provided credentials do not match our records.']);
    }
    // Handle the logout
    public function logout()
    {
        FacadesAuth::logout();
        return redirect()->route('login');
    }
}


