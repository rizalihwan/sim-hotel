<?php

namespace App\Http\Controllers\Admin;

use App\Category;
use App\Http\Controllers\Controller;
use App\Http\Requests\RoomRequest;
use App\Room;
use RealRashid\SweetAlert\Facades\Alert;

class RoomController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $number = Room::count();
        if($number > 0)
        {
            $number = Room::max('room_code');
            $strnum = substr($number, 3, 4);
            $strnum = $strnum + 1;
            if(strlen($strnum) == 4)
            {
                $kode = 'KMR' . $strnum;
            }else if (strlen($strnum) == 3) {
                $kode = 'KMR' . "0" . $strnum;
            } else if (strlen($strnum) == 2) {
                $kode = 'KMR' . "00" . $strnum;
            } else if (strlen($strnum) == 1) {
                $kode = 'KMR' . "000" . $strnum;
            }
        } else {
            $kode = 'KMR' . "0001";
        }
        return view('admin.room.index', [
            'kode' => $kode,
            'rooms' => Room::orderBy('room_code', 'ASC')->paginate(5),
            'categories' => Category::orderBy('name', 'ASC')->get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(RoomRequest $request)
    {
        $attr = $request->all();
        $attr['status'] = 1;
        $attr['thumbnail'] = request()->file('thumbnail')->store("images/rooms");
        Room::create($attr);
        Alert::success('Information Message', 'Data Saved');
        return redirect()->route('admin.room.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update($id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $room = Room::findOrFail($id);
        if($room->thumbnail)
        {
            \Storage::delete($room->thumbnail);
        }
        $room->delete();
        Alert::success('Information Message', 'Data Deleted');
        return back();
    }
}
