<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddArrayAndRequiredColumnsToMethodParamsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('method_params', function (Blueprint $table) {
            $table->boolean("is_required")->default(false)->after('return_type_id');
            $table->boolean("is_array")->default(false)->after('is_required');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('method_params', function (Blueprint $table) {
            $table->dropColumn('is_required');
            $table->dropColumn('is_array');
        });
    }
}
