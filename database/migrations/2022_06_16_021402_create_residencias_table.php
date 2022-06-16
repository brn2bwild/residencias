<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('residencias', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_alumno')
                  ->constrained('alumnos')
                  ->cascadeOnUpdate()
                  ->cascadeOnDelete();
            $table->string('lugar_residencia');
            $table->string('direccion_lugar');
            $table->foreignId('id_sector')
                  ->constrained('sectors')
                  ->cascadeOnUpdate()
                  ->cascadeOnDelete();
            $table->foreignId('id_giro')
                  ->constrained('giros')
                  ->cascadeOnUpdate()
                  ->cascadeOnDelete();
            $table->foreignId('id_tipo')
                  ->constrained('tipos')
                  ->cascadeOnUpdate()
                  ->cascadeOnDelete();
            $table->string('asesor_externo');
            $table->string('cargo_asesor_externo');
            $table->string('nombre_proyecto');
            $table->foreignId('id_opcion')
                  ->constrained('opcions')
                  ->cascadeOnUpdate()
                  ->cascadeOnDelete();
            $table->date('fecha_inicio');
            $table->date('fecha_termino');
            $table->foreignId('id_modalidad')
                  ->constrained('modalidads')
                  ->cascadeOnUpdate()
                  ->cascadeOnDelete();
            $table->string('observaciones');
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
        Schema::dropIfExists('residencias');
    }
};
