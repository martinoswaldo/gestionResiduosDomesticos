<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCollectionsTable  extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('collection', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->enum('type', [ 'organicos', 'inorganico', 'peligroso']);
            $table->enum('status', ['pendiente', 'confirmada', 'realizada'])->default('pendiente');
            $table->date('scheduled_date');
            $table->float('weight')->nullable();
            $table->integer('points_earned')->default(0);
            $table->string('location')->default('');
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
        Schema::dropIfExists('users');
    }
}
