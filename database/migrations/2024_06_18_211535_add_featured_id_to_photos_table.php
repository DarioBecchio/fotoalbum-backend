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
        Schema::table('photos', function (Blueprint $table) {
            $table->unsignedBigInteger('featured_id')->nullable()->after('category_id');

            $table->foreign('featured_id')
            ->references('id')
            ->on('featureds')
            ->nullOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('photos', function (Blueprint $table) {
            $table->dropForeign('photos_featured_id_foreign');
            $table->dropColumn('featured_id');
        });
    }
};
