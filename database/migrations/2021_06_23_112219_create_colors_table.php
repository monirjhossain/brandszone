<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateColorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('colors', function (Blueprint $table) {
            $table->id();
            $table->longText('primary_color')->nullable();
            $table->longText('secondary_color')->nullable();
            $table->longText('topbar_color')->nullable();
            $table->longText('topbar_text_color')->nullable();
            $table->longText('hover_color')->nullable();
            $table->longText('footer_color')->nullable();
            $table->longText('footer_text_color')->nullable();
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
        Schema::dropIfExists('colors');
    }
}
