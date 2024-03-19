<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLikesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('likes', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')
            ->constrained()
            ->cascadeOnDelete()  // ON DELETE で CASCADE
            ->cascadeOnUpdate(); // ON UPDATE で CASCADE

            $table->foreignId('shop_id')
            ->constrained()
            ->cascadeOnDelete()  // ON DELETE で CASCADE
            ->cascadeOnUpdate(); // ON UPDATE で CASCADE


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
        Schema::dropIfExists('likes');
    }
}
