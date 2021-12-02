<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateContactsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contacts', function (Blueprint $table) {
            $table->id();
            $table->string('person_type')->default('Personne physique');// Personne physique, Entreprise, Anonyme
            $table->string('last_name')->nullable();
            $table->string('first_name')->nullable();
            $table->string('social_reason')->nullable();
            $table->string('email');
            $table->string('phone_number');
            $table->text('object');
            $table->text('message');
            $table->boolean('is_read')->default(0);
            $table->boolean('is_delete')->default(0);
            $table->unsignedBigInteger('user_sender_id')->nullable();
            $table->foreign('user_sender_id')->references('id')->on('users')->cascadeOnDelete();            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('contacts');
    }
}
