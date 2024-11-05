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
        Schema::create('roles', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('description')->nullable();
            // $table->foreignId('created_user_id')->constrained(
            //     table: 'users',
            //     indexName: 'roles_user_id'
            // );
            // $table->foreignId('update_user_id')->constrained(
            //     table: 'users',
            //     indexName: 'role_user_id'
            // )->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('roles');
    }
};
