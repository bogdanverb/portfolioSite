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
        Schema::table('portfolios', function (Blueprint $table) {
            $table->string('video_path')->nullable(); // Додаємо стовпець video_path
        });
    }    

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::table('portfolios', function (Blueprint $table) {
            $table->dropColumn('video_path'); // Видаляємо стовпець video_path
        });
    }    
};
