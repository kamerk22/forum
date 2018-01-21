<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use App\Utils\AppConstant;

class CreateLikeTypeTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('like_type', function (Blueprint $table) {
            $table->increments('id');
            $table->string('like_type');
            $table->string('icon')->nullable();
            $table->tinyInteger('status')->default(AppConstant::STATUS_ACTIVE);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('like_type');
    }
}
