<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GoingEvents extends Model
{
    protected $primaryKey = 'going_event_id';

    protected $fillable = [
        "selected_going_event_user_id",
        "selected_going_event_id"
    ];
    
    use HasFactory;
}
