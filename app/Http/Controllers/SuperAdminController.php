<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class SuperAdminController extends Controller
{
    public function index()
    {
        $admins = User::role('admin')->get();
        return view('admin.index', compact('admins'));
    }

    public function demote(User $user)
    {
        $user->removeRole('admin');
        // TODO: sending an email to this admin telling him that he has been demoted
        return redirect()->back();
    }

    public function add_admin_view() {
        return view('admin.add-admin');
    }
}
