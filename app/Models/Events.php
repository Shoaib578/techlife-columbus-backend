<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Events extends Model
{
    protected $primaryKey = 'event_id';
    protected $fillable = [
        "event_title",
        "event_description",
        "event_image",
        "event_date",
        "event_time"
    ];
    use HasFactory;
}
