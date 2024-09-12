<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('members', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email')->unique();
            $table->boolean('active')->default(false);
            $table->string('rut')->nullable();
            $table->string('address')->nullable();
            $table->string('telephone')->nullable();
            $table->timestamp('email_verified_at')->nullable();
            $table->foreignId('region_id')->constrained();
            $table->foreignId('commune_id')->constrained();
            $table->foreignId('country_id')->constrained();
            $table->integer('avaragefat')->nullable();
            $table->string('sex')->nullable();
            $table->string('experience')->nullable()->comment('basico-medio-avanzado');
            $table->string('size')->nullable()->comment('Altura del alumno');
            $table->string('activitylevel')->nullable()->comment('sedentario-baja-activo-muy activo');
            $table->double('weight')->nullable();
            $table->date('birthday')->nullable();
            $table->string('target')->nullable()->comment('Meta, definición-perder peso');
            $table->double('imc')->nullable()->comment('Indice de masa corporal');
            $table->string('profesion')->nullable();
            /*  $table->double('folds')->nullable()->comment('medida de piel');
             $table->double('waist')->nullable()->comment('medida de cintura');
             $table->string('pathologies')->nullable()->comment('patologias'); */
            $table->string('password');
            $table->rememberToken();
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
