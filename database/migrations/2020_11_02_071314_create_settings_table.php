<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class CreateSettingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('settings', function (Blueprint $table) {
            $table->id();
            $table->string('title')->default('E-Voting')->nullable(false);
            $table->string('judul')->default('E-Voting')->nullable(false);
            $table->boolean('enable_register')->default(false)->nullable(false);
            $table->boolean('enable_verification')->default(false)->nullable(false);
            $table->timestamp('created_at')->useCurrent();
            $table->timestamp('updated_at')->default(DB::raw('CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP'));
        });

        DB::table('settings')->insert(
            array(
                'title' => 'E-Voting',
                'judul' => 'Pemilihan Presiden Mars Periode 2020 - 2021 ',
                'enable_register' => false,
                'enable_verification' => false,
            )
        );
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('settings');
    }
}
