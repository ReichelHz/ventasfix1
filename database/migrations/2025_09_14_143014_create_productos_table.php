<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::table('productos', function (Blueprint $table) {
            if (Schema::hasColumn('productos', 'precio')) {
                $table->dropColumn('precio');
            }
            $table->string('sku', 50)->unique()->after('id');
            $table->string('descripcion_corta', 255)->after('nombre');
            $table->text('descripcion_larga')->nullable()->after('descripcion_corta');
            $table->string('imagen_url')->nullable()->after('descripcion_larga');
            $table->decimal('precio_neto', 10, 2)->default(0)->after('imagen_url');
            $table->decimal('precio_venta', 10, 2)->default(0)->after('precio_neto');
            $table->integer('stock_actual')->default(0)->after('precio_venta');
            $table->integer('stock_minimo')->default(0)->after('stock_actual');
            $table->integer('stock_bajo')->default(0)->after('stock_minimo');
            $table->integer('stock_alto')->default(0)->after('stock_bajo');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('productos', function (Blueprint $table) {
            foreach ([
                'sku', 'descripcion_corta', 'descripcion_larga', 'imagen_url',
                'precio_neto', 'precio_venta', 'stock_actual', 'stock_minimo',
                'stock_bajo', 'stock_alto'
            ] as $column) {
                if (Schema::hasColumn('productos', $column)) {
                    $table->dropColumn($column);
                }
            }
        });
    }
};
