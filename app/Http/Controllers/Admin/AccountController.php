<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\RegisterRequest;
use App\User;
use RealRashid\SweetAlert\Facades\Alert;

class AccountController extends Controller
{
    public function admin_index_account()
    {
        return view('admin.account.admin.index');
    }

    public function costumer_index_account()
    {
        return view('admin.account.customer.index');
    }
    
    public function boss_index_account()
    {
        return view('admin.account.boss.index');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $account = User::where('id', '!=', auth()->user()->id)->latest()->paginate(5);
        return view('admin.account.index', [
            'accounts' => $account
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
    public function store(RegisterRequest $request)
    {
        $attr = $request->all();
        $attr['password'] = bcrypt($request->password);
        $thumb = request()->file('avatar') ? request()->file('avatar')->store("images/avatar") : null;
        $attr['avatar'] = $thumb;
        $user = User::create($attr);
        $user->assignRole(request('role'));
        Alert::success('Information Message', 'Data Saved');
        return back();
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
       $user = User::findOrFail($id);
       return view('admin.account.edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateRequest $request, $id)
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
        $user = User::findOrFail($id);
        if($user->avatar)
        {
            \Storage::delete($user->avatar);
        }
        $user->delete();
        Alert::success('Information Message', 'Data Deleted');
        return back();
    }
}
