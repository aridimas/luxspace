<?php

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

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

        DB::table('sitesetting')->insert([
            'id' => 1,
            'site_name' => 'Luxspace',
            'site_description' => 'Merupakan tempat jual beli perabotan',
            'logo_url' =>'storage/logo/logo.jpg',
            'iconurl' =>'storage/icon/icon.jpg',
            'thumbnail' => 'storage/thumbnail/thumbnail.jpg',
            'facebook' => 'www.facebook.com',
            'twitter' => 'www.twitter.com',
            'whatsapp' => 'wa.me/081248888888',
            'email' => 'admin@localbro',
            'deleted_at' => null,
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
