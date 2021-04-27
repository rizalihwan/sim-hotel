<?php

namespace App\Http\Controllers;

use App\{Booking, Category, Customer, Room, User};

class HomeController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home', [
            'users' => User::count(),
            'rooms' => Room::count(),
            'check_room' => Room::orderBy('room_code', 'ASC')->get(),
            'bookings' => Booking::count(),
            'customers' => Customer::count(),
            'categories' => Category::orderBy('name', 'ASC')->get(),
            'finances' => Booking::where('status', 1)->latest()->take(3)->get()
        ]);
    }
}
