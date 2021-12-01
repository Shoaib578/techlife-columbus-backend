<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSavedEventsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('saved_events', function (Blueprint $table) {
            $table->id('saved_event_id');
            $table->foreignId('selected_saved_event_user_id')->references('user_id')->on('users')->onDelete('cascade');
            $table->foreignId('selected_saved_event_id')->references('event_id')->on('events')->onDelete('cascade');

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
        Schema::dropIfExists('saved_events');
    }
}
