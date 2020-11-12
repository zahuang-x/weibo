<?php

use Illuminate\Database\Seeder;
use App\Models\User;

class UsersTableSeeder extends Seeder
{
    public function run()
    {
        factory(App\Models\User::class)->times(50)->create();

        $user = User::find(1);
        $user->name = 'Summer';
        $user->email = 'summer@me.cn';
        $user->save();
    }
}