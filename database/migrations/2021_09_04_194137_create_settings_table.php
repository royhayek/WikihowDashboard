<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
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
            $table->string('appName')->default('Wiki');
            $table->string('shortDescription')->default('an extensive database of how-to guides')->nullable();
            $table->string('appVersion')->default('1.0.0')->nullable();
            $table->string('appLogo')->default('appLogo.png');
            $table->text('fcmKey')->nullable();
        });
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
