<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

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

}
