<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;


class Category extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categoty = array(
            [
                'name' => 'General',
                'priority' => '1',
                'slug' => 'general'
            ],
            [
                'name' => 'FAQs',
                'priority' => '2',
                'slug' => 'faq'
            ],
            [
                'name' => 'Support',
                'priority' => '3',
                'slug' => 'support'
            ],
            [
                'name' => 'Trading for Money',
                'priority' => '4',
                'slug' => 'trading_for_money'
            ]
        );

        for($i = 0; $i < count($categoty); $i++){
            DB::table('category')->insert(array(
                "name" => $categoty[$i]['name'],
                "priority" => $categoty[$i]['priority'],
                "slug" => $categoty[$i]['slug'],
                "status" => \App\Utils\AppConstant::STATUS_ACTIVE,
                "created_at" => Carbon::now()->toDateTimeString(),
                "updated_at" => Carbon::now()->toDateTimeString()
            ));
        }
    }
}
