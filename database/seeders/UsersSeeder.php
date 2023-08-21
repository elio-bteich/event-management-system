<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = new User;
        $user->fname = 'Normal';
        $user->lname = 'Admin';
        $user->email = 'admin@gmail.com';
        $user->email_verified_at = date('y/m/d H:i:s', time());
        $user->password = Hash::make('newpassword');
        $user->remember_token = null;
        $user->save();
        $user->assignRole('admin');

        $user = new User;
        $user->fname = 'Super';
        $user->lname = 'Admin';
        $user->email = 'superadmin@gmail.com';
        $user->email_verified_at = date('y/m/d H:i:s', time());
        $user->password = Hash::make('newpassword');
        $user->remember_token = null;
        $user->save();
        $user->assignRole('super-admin');

        $user = new User;
        $user->fname = 'Events';
        $user->lname = 'Reader';
        $user->email = 'eventsreader@gmail.com';
        $user->email_verified_at = date('y/m/d H:i:s', time());
        $user->password = Hash::make('newpassword');
        $user->remember_token = null;
        $user->save();
        $user->givePermissionTo('read events');

        $user = new User;
        $user->fname = 'Events';
        $user->lname = 'Creator';
        $user->email = 'eventscreator@gmail.com';
        $user->email_verified_at = date('y/m/d H:i:s', time());
        $user->password = Hash::make('newpassword');
        $user->remember_token = null;
        $user->save();
        $user->givePermissionTo(['read events', 'create events']);

        $user = new User;
        $user->fname = 'Events';
        $user->lname = 'Editor';
        $user->email = 'eventseditor@gmail.com';
        $user->email_verified_at = date('y/m/d H:i:s', time());
        $user->password = Hash::make('newpassword');
        $user->remember_token = null;
        $user->save();
        $user->givePermissionTo(['read events', 'update events']);

        $user = new User;
        $user->fname = 'Events';
        $user->lname = 'Deleter';
        $user->email = 'eventsdeleter@gmail.com';
        $user->email_verified_at = date('y/m/d H:i:s', time());
        $user->password = Hash::make('newpassword');
        $user->remember_token = null;
        $user->save();
        $user->givePermissionTo(['read events', 'delete events']);

        $user = new User;
        $user->fname = 'Reservations';
        $user->lname = 'Acceptor';
        $user->email = 'reservationsacceptor@gmail.com';
        $user->email_verified_at = date('y/m/d H:i:s', time());
        $user->password = Hash::make('newpassword');
        $user->remember_token = null;
        $user->save();
        $user->givePermissionTo(['read events', 'accept reservations']);

        $user = new User;
        $user->fname = 'Reservations';
        $user->lname = 'Decliner';
        $user->email = 'reservationsdecliner@gmail.com';
        $user->email_verified_at = date('y/m/d H:i:s', time());
        $user->password = Hash::make('newpassword');
        $user->remember_token = null;
        $user->save();
        $user->givePermissionTo(['read events', 'decline reservations']);
    }
}
