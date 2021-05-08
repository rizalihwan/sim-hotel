<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use App\Room;

class RoomSurveyController extends Controller
{
    public function index()
    {
        return view('customer.roomsurvey.index', [
            'rooms' => Room::orderBy('name', 'ASC')->where('status', 1)->paginate(4)
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
            ->orWhereHas('category', function ($q) use ($query) {
                $q->where("facility", "like", "%$query%");
            })
            ->where('status', 0)->orderBy('room_code', 'ASC')->paginate(4);
        return view('customer.roomsurvey.index', [
            'rooms' => $room
        ]);
    }
}
