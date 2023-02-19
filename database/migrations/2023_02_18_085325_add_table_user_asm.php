<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_asm', function (Blueprint $table) {
            $table->id();
            $table->string('user_id');
            $table->string('asm_id');
            $table->string('file_name')->default(null);
            $table->string('file_name_hash')->default(null);
            $table->string('mark')->default(null);
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
        //
    }
};
