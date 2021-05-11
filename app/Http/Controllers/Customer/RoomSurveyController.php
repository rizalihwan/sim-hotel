<?php

namespace App\Http\Controllers\Customer;

use App\{Booking, Room};
use App\Http\Controllers\Controller;
use Carbon\Carbon;

class RoomSurveyController extends Controller
{
    private $kode;
    private $now;

    public function __construct()
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
        $this->kode = $kode;
        $this->now = Carbon::now();
    }

    protected function get($room)
    {
        return [
            'room' => $room, 
            'kode' => $this->kode, 
            'now' => $this->now
        ];
    }

    public function index()
    {
        return view('customer.roomsurvey.index', [
            'rooms' => Room::orderBy('name', 'ASC')->where('status', 1)->paginate(4)
        ]);
    }

    public function booking(Room $room)
    {
        return view('customer.booking', $this->get($room));
    }

    public function refresh(Room $room)
    {
        $this->validate(request(), [
            'nik' => 'required',
            'first_name' => 'required',
            'last_name' => 'required',
            'phone' => 'required',
            'address' => 'required',
            'check_in' => 'required',
            'check_out' => 'required'
        ]);
        return view('customer.booking', $this->get($room));
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
