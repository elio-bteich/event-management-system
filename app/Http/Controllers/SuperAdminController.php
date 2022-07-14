<?php

namespace App\Http\Controllers;

use App\Models\Reservation;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class SuperAdminController extends Controller
{
    public function index()
    {
        $admins = User::role('admin')->get();
        return view('admin.index', compact('admins'));
    }

    public function manage_users_view()
    {
        return view('admin.manage-users');
    }

    public function fetch_users($user_fname, $user_lname, $user_email)
    {
        $users = User::all()->filter(function ($user){
            return !$user->hasRole('super-admin');
        });

        if ($user_fname !== 'null') {
            $users = $users->filter(function ($user) use ($user_fname) {
                return Str::contains(Str::lower($user['fname']), $user_fname);
            });
        }
        if ($user_lname !== 'null') {
            $users = $users->filter(function ($user) use ($user_lname) {
                return Str::contains(Str::lower($user['lname']), $user_lname);
            });
        }
        if ($user_email !== 'null') {
            $users = $users->filter(function ($user) use ($user_email) {
                return Str::contains(Str::lower($user['email']), $user_email);
            });
        }
        return view('admin.users-fetch', compact('users'))->render();
    }

    public function promote_user(User $user) {
        $user->assignRole('admin');
        return true;
    }

    public function demote_user(User $user) {
        $user->removeRole('admin');
        return true;
    }
}
