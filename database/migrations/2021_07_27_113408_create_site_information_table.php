<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

class CreateSiteInformationTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('site_information', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->text('about');
            $table->string('footer');
            $table->timestamps();
        });

        DB::table('site_information')->insert([
            'name' => 'My Blog',
            'about' => "Lorem ipsum dolor sit amet consectetur adipisicing elit. Corrupti minus voluptatibus quos ullam unde sequi magni, magnam praesentium, sunt odio ea? Rerum, quia corporis? Ipsa atque animi corrupti quibusdam ullam?",
            'footer' => "Lorem ipsum dolor sit amet consectetur adipisicing elit",
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('site_information');
    }
}
