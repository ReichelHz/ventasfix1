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
        Schema::table('productos', function (Blueprint $table) {
            if (!Schema::hasColumn('productos', 'descripcion_corta')) {
                $table->string('descripcion_corta', 255)->after('nombre');
            }
            if (!Schema::hasColumn('productos', 'descripcion_larga')) {
                $table->text('descripcion_larga')->nullable()->after('descripcion_corta');
            }
            if (!Schema::hasColumn('productos', 'imagen_url')) {
                $table->string('imagen_url')->nullable()->after('descripcion_larga');
            }
            if (!Schema::hasColumn('productos', 'precio_neto')) {
                $table->decimal('precio_neto', 10, 2)->default(0)->after('imagen_url');
            }
            if (!Schema::hasColumn('productos', 'precio_venta')) {
                $table->decimal('precio_venta', 10, 2)->default(0)->after('precio_neto');
            }
            if (!Schema::hasColumn('productos', 'stock_actual')) {
                $table->integer('stock_actual')->default(0)->after('precio_venta');
            }
            if (!Schema::hasColumn('productos', 'stock_minimo')) {
                $table->integer('stock_minimo')->default(0)->after('stock_actual');
            }
            if (!Schema::hasColumn('productos', 'stock_bajo')) {
                $table->integer('stock_bajo')->default(0)->after('stock_minimo');
            }
            if (!Schema::hasColumn('productos', 'stock_alto')) {
                $table->integer('stock_alto')->default(0)->after('stock_bajo');
            }
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('productos', function (Blueprint $table) {
            $columns = [
                'descripcion_corta', 'descripcion_larga', 'imagen_url',
                'precio_neto', 'precio_venta', 'stock_actual', 'stock_minimo',
                'stock_bajo', 'stock_alto'
            ];
            foreach ($columns as $column) {
                if (Schema::hasColumn('productos', $column)) {
                    $table->dropColumn($column);
                }
            }
        });
    }
};
