<?php

namespace App\Http\Controllers;

use App\{Booking, Category, Customer, Room, User};

class HomeController extends Controller
{
    private function greeting()
    {
        $time = date('H');
        $name = auth()->user()->name;
        if ($time >= 18) {
            $greeting = "Good Night " . $name;
        } elseif ($time >= 12) {
            $greeting = "Good Afternoon " . $name;
        } elseif ($time < 12) {
            $greeting = "Good Morning " . $name;
        }
        return $greeting;
    }

    public function index()
    {
        return view('home', [
            'users' => User::count(),
            'rooms' => Room::count(),
            'check_room' => Room::orderBy('room_code', 'ASC')->get(),
            'bookings' => Booking::count(),
            'customers' => Customer::count(),
            'categories' => Category::orderBy('name', 'ASC')->get(),
            'finances' => Booking::where('status', 1)->latest()->take(3)->get(),
            'greeting' => $this->greeting(),
            'booking_user' => auth()->user()->booking
        ]);
    }


}
