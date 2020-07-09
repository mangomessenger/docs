<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRefTypeIdToMethodParamsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        $driver = Schema::connection($this->getConnection())->getConnection()->getDriverName();

        Schema::table('method_params', function (Blueprint $table) use ($driver) {
            if ('sqlite' === $driver) {
                $table->foreignId('ref_type_id')->nullable()->constrained('types');
            } else {
                $table->foreignId('ref_type_id')->after('method_id')->constrained('types');
            }
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
            $table->dropColumn('ref_type_id');
        });
    }
}
