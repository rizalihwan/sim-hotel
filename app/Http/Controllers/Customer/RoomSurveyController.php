<?php

namespace App\Http\Controllers\Customer;

use App\{Booking, Room};
use App\Http\Controllers\Controller;
use Carbon\Carbon;

class RoomSurveyController extends Controller
{
    public function index()
    {
        return view('customer.roomsurvey.index', [
            'rooms' => Room::orderBy('name', 'ASC')->where('status', 1)->paginate(4)
        ]);
    }

    public function booking(Room $room)
    {
        $number = Booking::count();
        if($number > 0)
        {
            $number = Booking::max('booking_code');
            $strnum = substr($number, 24, 25);
            $strnum = $strnum + 1;
            if(strlen($strnum) == 4)
            {
                $kode = 'BKNG' . $strnum;
            }else if (strlen($strnum) == 3) {
                $kode = 'BKNG' . "0" . $strnum;
            } else if (strlen($strnum) == 2) {
                $kode = 'BKNG' . "00" . $strnum;
            } else if (strlen($strnum) == 1) {
                $kode = 'BKNG' . "000" . $strnum;
            }
        } else {
            $kode = 'BKNG' . "0001";
        }
        $now = Carbon::now();
        return view('customer.booking', compact('room', 'kode', 'now'));
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
