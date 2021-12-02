<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Str;

class CreateServicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('services', function (Blueprint $table) {
            $table->id();
            $table->string('code')->default(Str::random(20));
            $table->string('title');
            $table->text('description')->nullable();
            $table->string('original_filename');
            $table->string('upload_file');
            $table->string('path');
            $table->boolean('is_active')->default(false);
            $table->unsignedBigInteger('user_author_id')->nullable();
            $table->foreign('user_author_id')->references('id')->on('users')->cascadeOnDelete();
            $table->unsignedBigInteger('user_edit_id')->nullable();
            $table->foreign('user_edit_id')->references('id')->on('users')->cascadeOnDelete();
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
        Schema::dropIfExists('services');
    }
}
