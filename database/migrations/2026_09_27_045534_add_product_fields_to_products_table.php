<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('products', function (Blueprint $table) {
            $table->string('sku')->unique()->after('category_id');
            $table->string('name')->after('sku');
            $table->decimal('purchase_price', 15, 2)->default(0)->after('name');
            $table->decimal('selling_price', 15, 2)->default(0)->after('purchase_price');
            $table->integer('stock')->default(0)->after('selling_price');
            $table->integer('minimum_stock')->default(5)->after('stock');
            $table->string('unit')->default('pcs')->after('minimum_stock');
            $table->string('image')->nullable()->after('unit');
        });
    }

    public function down(): void
    {
        Schema::table('products', function (Blueprint $table) {
            $table->dropUnique(['sku']);
            $table->dropColumn([
                'sku',
                'name',
                'purchase_price',
                'selling_price',
                'stock',
                'minimum_stock',
                'unit',
                'image',
            ]);
        });
    }
};