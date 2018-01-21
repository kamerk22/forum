<?php



use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class LikeType extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $likeType = array(
            [
                'like_type' => 'Like'
            ],
            [
                'like_type' => 'Love'
            ],
            [
                'like_type' => 'Haha'
            ],
            [
                'like_type' => 'Wow'
            ],
            [
                'like_type' => 'Sad'
            ],
            [
                'like_type' => 'Angry'
            ]
        );

        for($i = 0; $i < count($likeType); $i++){
            DB::table('like_type')->insert(array(
                "like_type" => $likeType[$i]['like_type'],
                "status" => \App\Utils\AppConstant::STATUS_ACTIVE,
                "created_at" => Carbon::now()->toDateTimeString(),
                "updated_at" => Carbon::now()->toDateTimeString()
            ));
        }
    }
}
