<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddWeightTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::statement("CREATE TABLE IF NOT EXISTS `weights` (
            `id` INT(11) NOT NULL AUTO_INCREMENT ,
            `user_id` INT(11) NULL DEFAULT NULL ,
            `weight` DOUBLE NULL DEFAULT NULL ,
            `inserted_datetime` TIMESTAMP NOT NULL DEFAULT current_timestamp ,
            PRIMARY KEY (`id`) )
          ENGINE = InnoDB;
        ");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
