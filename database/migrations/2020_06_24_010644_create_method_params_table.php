<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMethodParamsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('method_params', function (Blueprint $table) {
            $table->id();
            $table->integer("method_id");
            $table->string("name");
            $table->string("type");
            $table->string("description");
            $table->timestamps();

            $table->foreignId('method_id')->constrained('methods');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('method_params');
    }
}
