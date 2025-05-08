<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redis;

class notificationProductController extends Controller
{
    public function makeAsRead(Request $request)
    {

        $user = User::find($request->query('id'));
          $user->unreadNotifications->markAsRead();
        $count = $user->unreadNotifications->count();
        return response()->json([
            'unreadNotifications' => $count
        ]);
    }
}
