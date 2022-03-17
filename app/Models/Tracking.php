<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class Tracking extends Model
{
    protected $table = 'tracking';
    protected $fillable = [
        'user_id',
        'location',
        'ip',
        'ip_location',
        'browser',
        'login_at'
    ];
}
