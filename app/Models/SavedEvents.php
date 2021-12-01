<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SavedEvents extends Model
{
    protected $primaryKey = 'saved_event_id';
    
    protected $fillable = [
        "selected_saved_event_user_id",
        "selected_saved_event_id"
    ];
    use HasFactory;
}
