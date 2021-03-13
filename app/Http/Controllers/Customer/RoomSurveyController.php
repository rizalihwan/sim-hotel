<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use App\Room;

class RoomSurveyController extends Controller
{
    public function index()
    {
        return view('customer.roomsurvey.index', [
            'rooms' => Room::paginate(4)
        ]);
    }

}
