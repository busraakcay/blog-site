<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

class CreateCategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('categories', function (Blueprint $table) {
            $table->id();
            //$table->string('name_en')->nullable();
            //$table->string('name_tr')->nullable();
            $table->boolean('status')->default(true);
            $table->timestamps();
        });

        // $data = [
        //     ['name_en' => 'Health', 'name_tr' => 'Sağlık', 'status' => 1],
        //     ['name_en' => 'Education', 'name_tr' => 'Eğitim', 'status' => 1],
        //     ['name_en' => 'Sport', 'name_tr' => 'Spor', 'status' => 1],
        //     ['name_en' => 'Art', 'name_tr' => 'Sanat', 'status' => 1],
        //     ['name_en' => 'Technology', 'name_tr' => 'Teknoloji', 'status' => 1],
        //     ['name_en' => 'Science', 'name_tr' => 'Bilim', 'status' => 1],
        // ];

        // DB::table('categories')->insert($data);

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('categories');
    }
}
