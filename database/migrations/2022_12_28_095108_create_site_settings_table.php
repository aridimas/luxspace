<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

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
            $table->longText('site_description')->nullable();
            $table->string('logo_url')->nullable();
            $table->string('icon_url')->nullable();
            $table->string('thumbnail_url')->nullable();
            $table->string('facebook')->nullable();
            $table->string('instagram')->nullable();            
            $table->string('twitter')->nullable();            
            $table->string('whatsapp')->nullable();            
            $table->string('email')->nullable();
            $table->softDeletes();
            $table->timestamps();
        });

        DB::table('site_settings')->insert([
            'id' => 1,
            'site_name' => 'Luxspace',
            'site_description' => 'Merupakan tempat jual beli perabotan',
            'logo_url' =>'storage/logo/logo.jpg',
            'icon_url' =>'storage/icon/icon.jpg',
            'thumbnail_url' => 'storage/thumbnail/thumbnail.jpg',
            'facebook' => 'www.facebook.com',
            'instagram' => 'www.instagram.com',
            'twitter' => 'www.twitter.com',
            'whatsapp' => 'wa.me/081248888888',
            'email' => 'admin@localbro',
            'deleted_at' => date('Y-m-d H:i:s'),
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')

        ]);
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
