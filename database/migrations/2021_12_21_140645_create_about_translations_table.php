<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAboutTranslationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('about_translations', function (Blueprint $table) {
            $table->id();
            $table->text('desc');
            $table->string('locale')->index();
            $table->foreignId('about_id');
            $table->softDeletes();
            $table->foreign('about_id')->references('id')->on('abouts')->onDelete('cascade');
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
        Schema::dropIfExists('about_translations');
    }
}
