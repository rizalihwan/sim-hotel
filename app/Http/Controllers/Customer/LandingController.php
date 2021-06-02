<?php

namespace App\Http\Controllers\customer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\{Booking, Customer, Room, Category};

class LandingController extends Controller
{
    public function index(){
        return view('customer.landing.index',[
            'categories' => Category::orderBy('name', 'ASC')->get(),
            'rooms' => Room::orderBy('name', 'ASC')->where('status', 1)->paginate(4)
        ]);
    }

    public function gallery(){
        return view('customer.landing.gallery');
    }

    public function rooms(){
        return view('customer.landing.rooms-tariff',[
            'rooms' => Room::orderBy('name', 'ASC')->where('status', 1)->paginate(8)
        ]);
    }

    public function packages(){
        return view('customer.landing.packages',[
            'categories' => Category::orderBy('name', 'ASC')->get()
        ]);
    }

    public function contact(){
        return view('customer.landing.contact');
    }

    public function roomDetail(){
        return view('customer.landing.room-details');
    }
}
