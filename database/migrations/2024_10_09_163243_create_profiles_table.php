<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProfilesTable extends Migration
{
    public function up()
    {
        Schema::create('profiles', function (Blueprint $table) {
            $table->id(); // ID профілю
            $table->foreignId('user_id')->constrained()->onDelete('cascade'); // Зовнішній ключ для користувача
            $table->string('full_name');
            $table->text('bio')->nullable();
            $table->string('contact_info')->nullable();
            $table->string('social_links')->nullable(); // JSON для зберігання соціальних посилань
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('profiles');
    }
}
