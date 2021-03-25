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

    public function search()
    {
        $query = request('query');
        $room = Room::with(['category'])
                    ->where("name", "like", "%$query%")
                    ->orWhere("room_code", "like", "%$query%")
                    ->orWhere("price", "like", "%$query%")
                    ->orWhereHas('category', function ($q) use ($query) {
                        $q->where("name", "like", "%$query%");
                    })
                    ->orderBy('room_code', 'ASC')->paginate(4);
        return view('customer.roomsurvey.index', [
            'rooms' => $room
        ]);
    }

}
