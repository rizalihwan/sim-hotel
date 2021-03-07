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
        $rp = $request->price;
        $attr['price'] = preg_replace('/[Rp. ]/','',$rp);
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
        return view('admin.room.edit', [
            'room' => Room::findOrFail($id),
            'categories' => Category::orderBy('name', 'ASC')->get()
        ]);
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
        $room = Room::findOrFail($id);
        $messages = [
            'floor.max' => 'Floor Maximum 3 characters!'
        ];
        $attr = $this->validate(request(), [
            'room_code' => 'required|min:3|unique:rooms,room_code,'.$id,
            'name' => 'required|max:50',
            'thumbnail' => 'mimes:png,jpg,jpeg,svg|max:2048',
            'floor' => 'required|max:3',
            'category_id' => 'required',
            'price' => 'required|integer',
            'rating' => 'max:1'
        ], $messages);
        if (request()->file('thumbnail')) {
            \Storage::delete($room->thumbnail);
            $thumbnail = request()->file('thumbnail')->store("images/rooms");
        } else {
            $thumbnail = $room->thumbnail;
        }
        $attr['thumbnail'] = $thumbnail;
        $room->update($attr);
        Alert::success('Message Information', 'Data Updated');
        return redirect()->route('admin.room.index');
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
