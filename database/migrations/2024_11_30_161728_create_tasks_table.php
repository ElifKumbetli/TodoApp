<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{

    public function up()
    {
    Schema::create('tasks', function (Blueprint $table) {
        $table->id();
        $table->string('title',50);
        $table->text('description')->nullable();
        $table->foreignId('category_id')->constrained('categories')->onDelete('cascade');
        $table->timestamps();
    });
}

    public function down()
    {
        Schema::dropIfExists('tasks');
    }
};
