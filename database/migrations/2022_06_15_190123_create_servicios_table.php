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
        Schema::create('servicios', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_alumno')
                  ->constrained('alumnos')
                  ->cascadeOnUpdate()
                  ->cascadeOnDelete();
            $table->string('direccion_lugar');
            $table->string('responsable');
            $table->foreignId('id_sector')
                  ->constrained('sectors')
                  ->cascadeOnUpdate()
                  ->cascadeOnDelete();
            $table->foreignId('id_tipo')
                  ->constrained('tipos')
                  ->cascadeOnUpdate()
                  ->cascadeOnDelete();
            $table->foreignId('id_periodo')
                  ->constrained('periodos')
                  ->cascadeOnUpdate()
                  ->cascadeOnDelete();
            $table->string('numero_oficio');
            $table->foreignId('id_modalidad')
                  ->constrained('modalidads')
                  ->cascadeOnUpdate()
                  ->cascadeOnDelete();
            $table->foreignId('id_estancia')
                  ->constrained('estancias')
                  ->cascadeOnUpdate()
                  ->cascadeOnDelete();
            $table->integer('calificacion')->nullable()->default(0);
            $table->string('observaciones')->nullable();
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
        Schema::dropIfExists('servicios');
    }
};
