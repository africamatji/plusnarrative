<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class Tracking extends Model
{
    protected $table = 'tracking';
    public $timestamps = false;
    
    protected $fillable = [
        'user_id',
        'ip',
        'ip_location',
        'browser'
    ];
}
