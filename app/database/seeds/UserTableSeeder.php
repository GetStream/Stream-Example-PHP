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

        DB::table('users')->insert([
            'username'   => 'thierry',
            'email'      => 'thierry@rebels.com',
            'password'   => Hash::make('thierry'),
            'first_name' => 'thierry',
            'last_name'  => 'schellenbach',
            'created_at' => new DateTime(),
            'updated_at' => new DateTime()
        ]);

        DB::table('users')->insert([
            'username'   => 'tommaso',
            'email'      => 'tommaso@empire.com',
            'password'   => Hash::make('tommaso'),
            'first_name' => 'tommaso',
            'last_name'  => 'barbugli',
            'created_at' => new DateTime(),
            'updated_at' => new DateTime()
        ]);

    }

}
