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
            'about' => "Lorem Ipsum is simply dummy text and is simply  a placeholder for my poor friend and self suffices to see that.",
            'footer' => "Lorem Ipsum is simply dummy text and is simply to see that.",
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
