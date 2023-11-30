<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    //
    public function switchToPremium()
    {
        $user = auth()->user();
        $user->update(['is_premium' => true]);
        return redirect()->back()->with('status', 'Switched to Premium');
    }

    public function switchToRegular()
    {
        $user = auth()->user();
        $user->update(['is_premium' => false]);
        return redirect()->back()->with('status', 'Switched to Regular');
    }
}
