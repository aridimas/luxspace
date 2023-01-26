<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSiteSettingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('site_settings', function (Blueprint $table) {
            $table->id();

            $table->string('site_name');

            $table->longText('site_description');

            $table->string('logo_url');

            $table->string('icon_url');

            $table->string('thumbnail_url');

            $table->string('facebook');

            $table->string('instagram');
            
            $table->string('twitter');
            
            $table->string('whatsapp');
            
            $table->string('email');

            $table->softDeletes();

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
        Schema::dropIfExists('site_settings');
    }
}
