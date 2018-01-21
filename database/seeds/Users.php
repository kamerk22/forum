<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Carbon\Carbon;


class Users extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users =  [
            [
                'name' => 'User1',
                'email' => 'user1@gmail.com',
                'password' => '2209'
            ],
            [
                'name' => 'User2',
                'email' => 'user2@gmail.com',
                'password' => '2209'
            ],
            [
                'name' => 'User3',
                'email' => 'user3@gmail.com',
                'password' => '2209'
            ],
        ];

        for ($i = 0; $i < count($users); $i++) {
            DB::table('users')->insert(array(
                "name" => $users[$i]['name'],
                "email" => $users[$i]['email'],
                "password" => Hash::make($users[$i]['password']),
                "status" => \App\Utils\AppConstant::STATUS_ACTIVE,
                "created_at" => Carbon::now()->toDateTimeString(),
                "updated_at" => Carbon::now()->toDateTimeString()
            ));
        }

    }
}
