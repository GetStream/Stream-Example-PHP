<?php

class UserTableSeeder extends Seeder
{

    public function run()
    {
        DB::table('users')->delete();
        DB::table('users')->insert([
            'username'   => 'admin',
            'email'      => 'lightwalker@rebels.com',
            'password'   => Hash::make('admin'),
            'first_name' => 'admin',
            'last_name'  => 'admin',
            'created_at' => new DateTime(),
            'updated_at' => new DateTime()
        ]);
    }

}
