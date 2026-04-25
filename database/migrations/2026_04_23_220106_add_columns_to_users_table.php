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
        Schema::table('users', function (Blueprint $table) {
            $table->string('role')->default('stagiaire');
            $table->unsignedBigInteger('formateur_id')->nullable();
            $table->unsignedBigInteger('groupe_id')->nullable();
            
            $table->foreign('formateur_id')->references('id')->on('formateurs')->nullOnDelete();
            $table->foreign('groupe_id')->references('id')->on('groupes')->nullOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropForeign(['formateur_id']);
            $table->dropForeign(['groupe_id']);
            $table->dropColumn(['role', 'formateur_id', 'groupe_id']);
        });
    }
};
