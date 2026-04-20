<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBookingsTable extends Migration
{
    public function up()
    {
        Schema::create('bookings', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('package_id');
            $table->unsignedBigInteger('service_id');
            $table->string('name');                  // User's name
            $table->string('email');                 // User's email
            $table->string('phone');                 // User's phone
            $table->string('skin_type');             // User's skin type (e.g., oily, dry)
            $table->date('booking_date');            // Date for the appointment
            $table->time('booking_time');            // Time for the appointment

            $table->text('comments')->nullable();  // Optional comments
            $table->timestamps();

            // Foreign key constraint
            $table->foreign('package_id')->references('id')->on('packages')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('bookings');
    }
}
