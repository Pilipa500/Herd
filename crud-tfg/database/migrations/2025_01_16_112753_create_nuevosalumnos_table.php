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
        Schema::create('nuevosalumnos', function (Blueprint $table) {
            $table->id();
            $table->string('nombre', 30);
            $table->string('email', 50)->unique();
            $table->string('password', 255);
            $table->string('colegio', 100);
            $table->string('curso', 30);
            $table->year('anio_graduacion');
            $table->timestamp('fecha_registro')->default(DB::raw('CURRENT_TIMESTAMP'))->onUpdate(DB::raw('CURRENT_TIMESTAMP'));
            $table->integer('rol_id')->default(1);//por defecto el rol es 1, 2:admin.
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('nuevosalumnos');
    }
};
