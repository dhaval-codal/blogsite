<?php

use Illuminate\Database\Seeder;
use App\User;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UserSeeder::class);
        $user = new User;
        $user->name = 'dpithwa';
        $user->email = 'dpithwa@codal.com';
        $user->password = Hash::make('codal123');
        $user->type = 1;
        $user->save();
    }
}
