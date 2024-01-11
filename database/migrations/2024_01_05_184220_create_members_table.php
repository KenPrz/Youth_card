<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.Name	Gender	Age	Birthday	Email	Contact Number	Purok	Youth Classification

     */
    public function up(): void
    {
        Schema::create('members', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('gender');
            $table->integer('age');
            $table->date('birthday');
            $table->string('email');
            $table->string('contact_number', 13);
            $table->integer('purok');
            $table->string('youth_classification');
            $table->bigInteger('card_id')->unsigned()->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('members');
    }
};
// Name	Gender	Age	Birthday	Email	Contact Number	Purok	Youth Classification
