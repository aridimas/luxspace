<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class SiteSetting extends Model
{
    use HasFactory, SoftDeletes;

    public $table = "site_settings";

    protected $fillable = [
        'site_name','site_description', 'logo_url', 'thumbnail_url', 'icon_url', 'facebook', 'instagram', 'twitter', 'whatsapp', 'email',
    ];
    
    // protected $table = 'form_multiple_upload';
}
