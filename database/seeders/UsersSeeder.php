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
        $user->fname = 'Elio';
        $user->lname = 'Bteich';
        $user->email = 'eliobteich115@gmail.com';
        $user->email_verified_at = true;
        $user->password = Hash::make('lalipos12');
        $user->remember_token = null;
        $user->save();
        $user->assignRole('admin');

        $user = new User;
        $user->fname = 'Joe';
        $user->lname = 'Mawad';
        $user->email = 'joemawad@gmail.com';
        $user->email_verified_at = true;
        $user->password = Hash::make('newpassword');
        $user->remember_token = null;
        $user->save();
        $user->assignRole('super-admin');

        $user = new User;
        $user->fname = 'Events';
        $user->lname = 'Reader';
        $user->email = 'eventsreader@gmail.com';
        $user->email_verified_at = null;
        $user->password = Hash::make('newpassword');
        $user->remember_token = null;
        $user->save();
        $user->givePermissionTo('read events');

        $user = new User;
        $user->fname = 'Events';
        $user->lname = 'Creator';
        $user->email = 'eventscreator@gmail.com';
        $user->email_verified_at = null;
        $user->password = Hash::make('newpassword');
        $user->remember_token = null;
        $user->save();
        $user->givePermissionTo(['read events', 'create events']);

        $user = new User;
        $user->fname = 'Events';
        $user->lname = 'Editor';
        $user->email = 'eventseditor@gmail.com';
        $user->email_verified_at = null;
        $user->password = Hash::make('newpassword');
        $user->remember_token = null;
        $user->save();
        $user->givePermissionTo(['read events', 'update events']);

        $user = new User;
        $user->fname = 'Events';
        $user->lname = 'Deleter';
        $user->email = 'eventsdeleter@gmail.com';
        $user->email_verified_at = null;
        $user->password = Hash::make('newpassword');
        $user->remember_token = null;
        $user->save();
        $user->givePermissionTo(['read events', 'delete events']);

        $user = new User;
        $user->fname = 'Reservations';
        $user->lname = 'Acceptor';
        $user->email = 'reservationsacceptor@gmail.com';
        $user->email_verified_at = null;
        $user->password = Hash::make('newpassword');
        $user->remember_token = null;
        $user->save();
        $user->givePermissionTo(['read events', 'accept reservations']);

        $user = new User;
        $user->fname = 'Reservations';
        $user->lname = 'Decliner';
        $user->email = 'reservationsdecliner@gmail.com';
        $user->email_verified_at = null;
        $user->password = Hash::make('newpassword');
        $user->remember_token = null;
        $user->save();
        $user->givePermissionTo(['read events', 'decline reservations']);
    }
}
