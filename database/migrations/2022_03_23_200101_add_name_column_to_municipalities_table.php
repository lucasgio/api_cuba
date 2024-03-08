<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (Illuminate\Support\Facades\DB::getDriverName() !== 'sqlite') {
            Schema::table('municipalities', function (Blueprint $table) {
                $table->string('name');
            });
        } else {
            Schema::table('municipalities', function (Blueprint $table) {
                $table->string('name')->default('');
            });
        }
    }
};
