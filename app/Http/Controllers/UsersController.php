<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UsersController extends Controller
{
    public function notifications(Request $request)
    {
        return $request->user()->notifications;
    }
}
