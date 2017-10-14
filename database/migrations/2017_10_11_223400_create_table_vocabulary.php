<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableVocabulary extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vocabulary', function (Blueprint $table) {
            $table->increments('id')->unsigned();
            $table->string('translation');
            $table->tinyInteger('language_id')
                ->unsigned()
                ->index()
                ->foreign('language_id')
                ->references('id')
                ->on('languages');
            $table->integer('term_id')
                ->unsigned()
                ->index()
                ->foreign('term_id')
                ->references('id')
                ->on('terms');
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
        Schema::dropIfExists('vocabulary');
    }
}
