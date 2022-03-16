<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class IpLocation extends Model
{
    protected $table = 'ip_location';
    protected $fillable = [
        'user_id',
        'location',
    ];
}
