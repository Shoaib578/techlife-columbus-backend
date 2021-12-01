<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserInterests extends Model
{
    protected $primaryKey = 'user_interest_id';

    protected $fillable = [
        "selected_interest_user_id",
         "selected_interest_id"
    ];
    use HasFactory;
}
