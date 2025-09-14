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
            if (!Schema::hasColumn('users', 'rut')) {
                $table->string('rut', 12)->unique()->after('id');
            }
            if (!Schema::hasColumn('users', 'nombre')) {
                $table->string('nombre', 50)->after('rut');
            }
            if (!Schema::hasColumn('users', 'apellido')) {
                $table->string('apellido', 50)->after('nombre');
            }
            if (Schema::hasColumn('users', 'name')) {
                $table->dropColumn('name');
            }
                if (!Schema::hasColumn('users', 'role')) {
                    $table->string('role', 20)->default('user')->after('password');
                }
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            if (Schema::hasColumn('users', 'rut')) {
                $table->dropColumn('rut');
            }
            if (Schema::hasColumn('users', 'nombre')) {
                $table->dropColumn('nombre');
            }
            if (Schema::hasColumn('users', 'apellido')) {
                $table->dropColumn('apellido');
            }
                if (Schema::hasColumn('users', 'role')) {
                    $table->dropColumn('role');
                }
            if (!Schema::hasColumn('users', 'name')) {
                $table->string('name', 255)->after('id');
            }
        });
    }
};
