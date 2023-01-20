<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class FixTodosTable extends Migration
{
  /**
   * Run the migrations.
   *
   * @return void
   */
  public function up()
  {
    // tags table.
    Schema::dropIfExists('tags');

    Schema::create('tags', function (Blueprint $table) {
      $table->id();
      $table->char('name', 20);
      $table->timestamps();
    });

    // todos table.
    Schema::dropIfExists('todos');

    Schema::create('todos', function (Blueprint $table) {
      $table->id();
      $table->foreignId('user_id')->constrained('users');
      $table->foreignId('tag_id')->constrained('tags');
      $table->char('content', 20);
      $table->timestamps();
    });
  }

  /**
   * Reverse the migrations.
   *
   * @return void
   */
  public function down()
  {
    //
    Schema::dropIfExists('tags');
    Schema::dropIfExists('todos');
  }
}
