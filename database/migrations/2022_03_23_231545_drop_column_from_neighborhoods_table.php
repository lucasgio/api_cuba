<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (DB::getDriverName() === 'sqlite') {
            Schema::table('neighborhoods', function (Blueprint $table) {
                $table->foreignId('provincie_id')->nullable()->change()->constrained('provincies')->cascadeOnUpdate();
            });
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('neighborhoods', function (Blueprint $table) {
            if (DB::getDriverName() !== 'sqlite') {
                Schema::table('neighborhoods', function (Blueprint $table) {
                    $table->dropForeign(['provincie_id']);
                    $table->dropColumn(['provincie_id']);
                });
            }
        });
    }
};
