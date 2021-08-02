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
            $table->string('name_en');
            $table->string('name_tr');
            $table->timestamps();
        });

        $data = [
            ['name_en' => 'Health', 'name_tr' => 'Sağlık'],
            ['name_en' => 'Education', 'name_tr' => 'Eğitim'],
            ['name_en' => 'Sport', 'name_tr' => 'Spor'],
            ['name_en' => 'Art', 'name_tr' => 'Sanat'],
            ['name_en' => 'Technology', 'name_tr' => 'Teknoloji'],
            ['name_en' => 'Science', 'name_tr' => 'Bilim'],
        ];

        DB::table('categories')->insert($data);

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
