<?php

use App\User;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = new User();

        $user->name = 'admin';
        $user->email = 'andersonmadeiracs@gmail.com';
        $user->password = bcrypt('admin');
        $user->born_at = '18/05/1989';
        $user->image = 'http://placekitten.com/150/150';

        $user->save();
    }
}
