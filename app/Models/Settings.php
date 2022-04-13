<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Settings extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $fillable = [
        'appName',
        'appLogo',
        'appVersion',
        'shortDescription',
        'fcmKey',
        'aboutUs',
    ];

    protected $casts = [
        'appName' => 'string',
        'appLogo' => 'string',
        'appVersion' => 'string',
        'shortDescription' => 'string',
        'fcmKey' => 'string',
        'aboutUs' => 'string',
    ];
}
