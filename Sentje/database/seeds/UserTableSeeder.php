<?php

use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = User::where('name', '=', 'Marijn')->first();

        if (!empty($user)) {
            print("Skipping UserTableSeeder, because table is already seeded\n");
            return;
        }

        $user = new User([
            'name' => "marijn",
            'email' => "oomensmarijn@gmail.com",
            'password' => Hash::make('wadi12345')
        ]);
        $user->save();
    }
}