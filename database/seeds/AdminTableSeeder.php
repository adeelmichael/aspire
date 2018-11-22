<?php

use Illuminate\Database\Seeder;
use App\User;
class AdminTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = User::create([
            'name' => 'Test Admin',
            'email' => 'test@gmail.com',
            'password' => Hash::make('admin123'),
        ]);

        $user->roles()->attach('1');
    }
}
