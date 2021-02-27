<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use RealRashid\SweetAlert\Facades\Alert;

class UserController extends Controller
{
    protected function messages()
    {
        return [
            'password.confirmed' => 'password konfirmasi tidak sama!'
        ];
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function changePassword()
    {
        return view('profile.changepassword');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function updatePassword()
    {
        
        $this->validate(request(), [
            'old_password' => 'required',
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ], $this->messages());
        $currentPassword = auth()->user()->password;
        $old_password = request('old_password');

        if (Hash::check($old_password, $currentPassword)) {
            auth()->user()->update([
                'password' => bcrypt(request('password'))
            ]);
            Alert::success('Message Information', 'Password Updated');
            return redirect()->route('home');
        } else {
            Alert::error('Message Information', 'Password fail to Updated!');
            return back();
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
    public function edit()
    {
        return view('profile.setting');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update()
    {
        $this->validate(request(), [
            'name' => 'required|min:3|max:50|string',
            'avatar' => 'mimes:png,jpg,jpeg,ico,svg|max:2048',
            'email' => 'required|string',
            'username' => 'required|string'
        ]);

        $user = auth()->user();
        if ($user->avatar == null) {
            if (request()->file('avatar')) {
                $thumbnail = request()->file('avatar')->store("images/avatar");
            } else {
                $thumbnail = null;
            }
        } else {
            if (request()->file('avatar')) {
                \Storage::delete($user->avatar);
                $thumbnail = request()->file('avatar')->store("images/avatar");
            } else {
                $thumbnail = $user->avatar;
            }
        }

        $user->update([
            'name' => request('name'),
            'avatar' => $thumbnail,
            'email' => request('email'),
            'username' => request('username')
        ]);
        Alert::success('Message Information', 'Profile Updated');
        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
