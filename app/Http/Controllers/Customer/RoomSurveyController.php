<?php

namespace App\Http\Controllers\Customer;

use App\{Booking, Customer, Room};
use App\Http\Controllers\Controller;
use Carbon\Carbon;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

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

    public function booking_pay(Request $request)
    {
        $customer = new Customer;
        $customer->nik = $request->nik;
        $customer->first_name = $request->first_name;
        $customer->last_name = $request->last_name;
        $customer->phone = $request->phone;
        $customer->address = $request->address;
        $customer->save();

        $time = date("H:i:s");
        $thumb = request()->file('thumbnail')->store("images/uploadproof");
        auth()->user()->booking()->create([
            'booking_code' => $request->booking_code,
            'check_in' => $request->check_in . $time,
            'check_out' => $request->check_out . $time,
            'room_id' => $request->room_id,
            'customer_id' => $customer->id,
            'payment_type' => $request->payment_type,
            'status' => $request->status,
            'thumbnail' => $thumb,
            // 'user_id' => $request->email,
            'payment_date' => Carbon::now()
        ]);
        Alert::success('Information Message', 'Your order is successfull, wait up to 2 hours for a notification to your email!');
        return redirect()->route('customer.survey');
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
