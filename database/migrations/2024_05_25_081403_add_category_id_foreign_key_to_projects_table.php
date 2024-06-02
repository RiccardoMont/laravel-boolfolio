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
        Schema::table('projects', function (Blueprint $table) {
            
            //creo colonna dove inserisco la foreign key
            $table->unsignedBigInteger('category_id')->nullable()->after('id');

            //assegno la foreign key alla colonna
            $table->foreign('category_id')
            ->references('id')
            ->on('categories')
            ->nullOnDelete();
            //->onDelete('set null'); 


        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('projects', function (Blueprint $table) {
            
            //droppo la foreign key
            $table->dropForeign('projects_category_id_foreign');
            //droppo la colonna
            $table->dropColumn('category_id');

        });
    }
};
