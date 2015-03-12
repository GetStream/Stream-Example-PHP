<?php

use Illuminate\Database\Seeder;

class ItemTableSeeder extends Seeder
{

    public function run()
    {
        DB::table('items')->delete();
        $items = json_decode(file_get_contents(__DIR__."/items.json"), true);
        $user = User::where('username', '=', 'admin')->firstOrFail();
        foreach ($items as $i => $item) {
            $items[$i]['user_id'] = $user->id;
            $items[$i]['created_at'] = new DateTime();
            $items[$i]['updated_at'] = new DateTime();
        }
        DB::table('items')->insert($items);
    }

}
