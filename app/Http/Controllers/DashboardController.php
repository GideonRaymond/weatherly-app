<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Stevebauman\Location\Facades\Location;

class DashboardController extends Controller
{
    public function index()
    {
        return Inertia::render('Dashboard', [
            'users' => User::all()->map(function ($user) {
                return [
                    'id' => $user->id,
                    'name' => $user->name,
                    'email' => $user->email,

                ];
            }),
        ]);
    }

    public function store(Request $request)
    {
        $locationData = Location::get();

        return $locationData .
            dd($locationData);
    }
}
