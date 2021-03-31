<?php

namespace App\Http\Controllers;

use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function store()
    {
        User::Create([
            'name' => 'Miajee',
            'email' => 'this is email',
            'password' => 'Flight 10',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);
        return "Done";
    }
}
