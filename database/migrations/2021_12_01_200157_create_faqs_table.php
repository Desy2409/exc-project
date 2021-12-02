<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFaqsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('faqs', function (Blueprint $table) {
            $table->id();
            $table->string('last_name')->nullable();
            $table->string('first_name')->nullable();
            $table->string('social_reason')->nullable();
            $table->string('email');
            $table->string('phone_number')->nullable();
            $table->string('question');
            $table->text('response')->nullable();
            $table->string('person_type')->default('Personne physique');// Personne physique, Entreprise ou Anonyme
            $table->unsignedBigInteger('user_author_id')->nullable();
            $table->foreign('user_author_id')->references('id')->on('users')->cascadeOnDelete();
            $table->unsignedBigInteger('user_edit_id')->nullable();
            $table->foreign('user_edit_id')->references('id')->on('users')->cascadeOnDelete();
            $table->boolean('is_active')->default(false);
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
        Schema::dropIfExists('faqs');
    }
}
