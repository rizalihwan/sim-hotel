<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;

class RoomSurveyController extends Controller
{
    public function index()
    {
        return view('customer.roomsurvey.index');
    }

}
