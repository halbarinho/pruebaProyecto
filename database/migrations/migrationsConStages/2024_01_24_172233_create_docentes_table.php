<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('docentes', function (Blueprint $table) {
            //la sustituyo por el metodo foreignId
            // $table->unsignedBigInteger('user_id');
            //pruebo a eliminarla
            // $table->string('dni_FK', 9)->unique();
            $table->string('speciality', 50);
            $table->timestamps();
            //lo sustituyo por el metodo foreignId
            // $table->primary('user_id');
            // $table->foreign('user_id')->references('id')->on('users')
            //     ->onDelete('cascade');
            $table->foreignId('user_id')->references('id')->on('users')
                ->onDelete('cascade')
                ->onUpdate('cascade');
            $table->primary('user_id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('docentes');
    }
};